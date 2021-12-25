let budget = []

class Budget {
    constructor(title, amount, type) {
        this.title = title
        this.amount = amount
        this.type = type
        this.id = Date.now()
    }
}

const budgetForm = document.querySelector(".budget")
const titleElem = document.getElementById("title")
const amountElem = document.getElementById("amount")
const typeElem = document.getElementById("type")

// list
const incomeList = document.getElementById("income-list")
const expensesList = document.getElementById("expenses-list")

incomeList.addEventListener("click", deleteItem)
expensesList.addEventListener("click", deleteItem)

// submit btn
const submitBtn = document.querySelector('.budget-display__save-btn')
submitBtn.addEventListener("click", saveBudget)

function deleteItem(e) {
    if(e.target.className = "fas fa-trash-alt") {
        const id = parseInt(e.target.dataset.id)
        budget = budget.filter(item => item.id !== id)
        render()
    }
}

budgetForm.addEventListener("submit", e => {
    e.preventDefault()

    const title = titleElem.value
    const amount = amountElem.value
    const type = typeElem.value

    if(title.trim() === "") {
        new Toast({
            message: "Title cannot be empty", 
            type: "warning"
        })
        return false
    }

    if(amount.trim() === "") {
        new Toast({
            message: "Amount cannot be empty", 
            type: "warning"
        })
        return false
    } else if(!(/^\d+$/.test(amount))) {
        new Toast({
            message: "Amount can only contain numbers", 
            type: "warning"
        })
        return false
    }

    if(type.trim() === "") {
        new Toast({
            message: "Type cannot be empty", 
            type: "warning"
        })
        return false
    } else if(type !== "exp" && type !== "inc") {
        new Toast({
            message: "Invalid type selected", 
            type: "warning"
        })
        return false
    }

    const newItem = new Budget(title, amount, type)
    budget.push(newItem)
    render()
    clearForm()
})

function render() {
    expensesList.innerHTML = ""
    incomeList.innerHTML = ""
    budget.forEach(item => {
        const html = `
            <li class="budget-display__item">
                <span class="budget-display__item--desc">${item.title}</span>
                <span class="budget-display__item--cost">${item.amount}</span>
                <i class="fas fa-trash-alt" data-id="${item.id}"></i>
            </li>
        `
        if(item.type === "exp") {
            expensesList.innerHTML += html
        } else if(item.type === "inc") {
            incomeList.innerHTML += html
        }
    })
}

function clearForm() {
    titleElem.value = ""
    amountElem.value = ""
}

function saveBudget() {
    if(budget.length > 0) {

        //load spinner
        const spinner = document.createElement("img")
        spinner.src = "assets/images/spinner.gif"
        spinner.className = "form__spinner"
        const content = submitBtn.innerHTML
        submitBtn.disabled = true
        submitBtn.innerHTML = ""
        submitBtn.appendChild(spinner)

        fetch("server/save-budget", {
            method: "POST",
            body: JSON.stringify({ budget }),
            headers: {
                "Content-type": "application/json"
            }
        })
        .then(res => {
            if(res.status === 200) return res.json()
            return res.text()
        })
        .then(response => {
            console.log(response)
            if(typeof response === "object") {
                const { status, msg } = response
                if(status === true) {
                    new Toast({
                        message: msg, 
                        type: "success."
                    })

                    // clear
                    budget = []
                    expensesList.innerHTML = ""
                    incomeList.innerHTML = ""

                } else {
                    new Toast({
                        message: msg, 
                        type: "danger"
                    })
                }

                submitBtn.innerHTML = content
                submitBtn.disabled = false
            } else {
                throw new Error()
            }
        })
        .catch(error => {
            console.log(error.message)
            new Toast({
                message: "Something went wrong", 
                type: "danger"
            })

            submitBtn.innerHTML = content
            submitBtn.disabled = false
        })
    } else {
        new Toast({
            message: "No budget entered yet", 
            type: "warning"
        })
    }
}