const main = document.getElementById("main")


const e = React.createElement

const DataContext = React.createContext([])

function TableHead() {
    return (
        <thead>
            <tr>
                <th>Date</th>
                <th colSpan="2">Expenses</th>
                <th colSpan="2">Sales</th>
                <th>Net</th>
                <th>action</th>
            </tr>
        </thead>
    )
}

function TableBodyRowData({ data, date, type, field, dataType }) {
    const { updateField } = React.useContext(DataContext)
    const [isEditing, setIsEditing] = React.useState(false)
    const [inputData, setInputData] = React.useState(data)
    const inputRef = React.useRef(null)

    React.useEffect(() => {
        if(inputRef && inputRef.current && isEditing) {
            inputRef.current.focus()
        }

    }, [isEditing, inputRef])

    function handleBlur() {
        setIsEditing(false)
        if(type === "number") {
            updateField(date, dataType, field, Number(inputData))
        } else {
            updateField(date, dataType, field, inputData)
        }
    }


    return (
        <td id={date + "-" + Date.now()} onClick={() => setIsEditing(true)}>
            {
                isEditing ? (
                    <input className="budget-table__data-input" type={type} ref={inputRef} value={inputData} onChange={e => setInputData(e.target.value)} onBlur={handleBlur} />
                ) : (
                    <span>{ data }</span>
                )
            }

        </td>
    )
}

function TableBodyRow({ item }) {
    const { removeField } = React.useContext(DataContext)
    const { date, budget } = item
    const { inc, exp } = budget
    const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']
    const a = new Date(date)
    return (
        <tr>
            <td>{ `${a.getDate()}-${months[a.getMonth()]}-${a.getFullYear()}` }</td>
            <TableBodyRowData data={exp.title} field={"title"} type={"text"} dataType={"exp"} date={date} />
            <TableBodyRowData data={exp.cost} field={"cost"} type={"number"} dataType={"exp"} date={date} />
            <TableBodyRowData data={inc.title} field={"title"} type={"text"} dataType={"inc"} date={date} />
            <TableBodyRowData data={inc.cost} field={"cost"} type={"number"} dataType={"inc"} date={date} />
            <td>{ inc.cost - exp.cost }</td>
            <td>
                <i onClick={() => removeField(date)} className="fas fa-trash-alt"></i>
            </td>
        </tr>
    )
}

function TableBody() {
    const { data } = React.useContext(DataContext)

    console.log(data)

    return (
        <tbody>
            {
                data && data.length && data.map(item => <TableBodyRow key={item.date} item={item} />)
            }
        </tbody>
    )
}

function TableFoot() {
    const { data } = React.useContext(DataContext)
    let totalInc = 0
    let totalExp = 0

    data.map(item => {
        totalExp += item.budget.exp.cost
        totalInc += item.budget.inc.cost
    })
    return (
        <tfoot>
            <tr>
                <td></td>
                <td>Total</td>
                <td>{ totalExp }</td>
                <td></td>
                <td>{ totalInc }</td>
                <td>{ totalInc - totalExp }</td>
                <td></td>
            </tr>
        </tfoot>
    )
}

function Table() {
    return (
        <table className="budget-table">
            <TableHead />
            <TableBody />
            <TableFoot />
        </table>
    )
}

function Dashboard() {
    const initialState = {
        date: Date.now(),
        budget: {
            inc: {
                title: "",
                cost: 0
            },
            exp: {
                title: "",
                cost: 0
            }
        }
    }
    const [data, setData] = React.useState([initialState])

    function updateField(date, type, field, newValue) {
        const temp = [...data]
        const index = temp.findIndex(item => item.date === date)
        if(index > -1) {
            temp[index].budget[type][field] = newValue
            setData(temp)
            console.log("...reached...", data, temp)
        }
    }

    function removeField(date) {
        const filteredData = data.filter(item => item.date !== date)

        if(filteredData.length > 0) {
            setData(filteredData)
        } else {
            setData([initialState])
        }
    }

    function addNewField() {
        const newData = {
            date: Date.now(),
            budget: {
                inc: {
                    title: "",
                    cost: 0
                },
                exp: {
                    title: "",
                    cost: 0
                }
            }
        }

        setData([...data, newData])
    }
    return (
        <React.Fragment>
            <DataContext.Provider value={{ data, updateField, removeField }}>
                <div className="container">
                    <div className="table-responsive">
                        <Table />
                    </div>
                    <div className="align-right">
                        <button onClick={addNewField} className="budget-display__save-btn">Add <i className="fas fa-plus"></i></button>
                        <button className="budget-display__save-btn ml-1">Save <i className="fas fa-save ml-1"></i></button>
                    </div>
                </div>
            </DataContext.Provider>
        </React.Fragment>
    )
}

ReactDOM.render(e(Dashboard), main)


// let budget = []

// class Budget {
//     constructor(title, amount, type) {
//         this.title = title
//         this.amount = amount
//         this.type = type
//         this.id = Date.now()
//     }
// }

// const budgetForm = document.querySelector(".budget")
// const titleElem = document.getElementById("title")
// const amountElem = document.getElementById("amount")
// const typeElem = document.getElementById("type")

// // list
// const incomeList = document.getElementById("income-list")
// const expensesList = document.getElementById("expenses-list")

// incomeList.addEventListener("click", deleteItem)
// expensesList.addEventListener("click", deleteItem)

// // submit btn
// const submitBtn = document.querySelector('.budget-display__save-btn')
// submitBtn.addEventListener("click", saveBudget)

// function deleteItem(e) {
//     if(e.target.className = "fas fa-trash-alt") {
//         const id = parseInt(e.target.dataset.id)
//         budget = budget.filter(item => item.id !== id)
//         render()
//     }
// }

// budgetForm.addEventListener("submit", e => {
//     e.preventDefault()

//     const title = titleElem.value
//     const amount = amountElem.value
//     const type = typeElem.value

//     if(title.trim() === "") {
//         new Toast({
//             message: "Title cannot be empty", 
//             type: "warning"
//         })
//         return false
//     }

//     if(amount.trim() === "") {
//         new Toast({
//             message: "Amount cannot be empty", 
//             type: "warning"
//         })
//         return false
//     } else if(!(/^\d+$/.test(amount))) {
//         new Toast({
//             message: "Amount can only contain numbers", 
//             type: "warning"
//         })
//         return false
//     }

//     if(type.trim() === "") {
//         new Toast({
//             message: "Type cannot be empty", 
//             type: "warning"
//         })
//         return false
//     } else if(type !== "exp" && type !== "inc") {
//         new Toast({
//             message: "Invalid type selected", 
//             type: "warning"
//         })
//         return false
//     }

//     const newItem = new Budget(title, amount, type)
//     budget.push(newItem)
//     render()
//     clearForm()
// })

// function render() {
//     expensesList.innerHTML = ""
//     incomeList.innerHTML = ""
//     budget.forEach(item => {
//         const html = `
//             <li class="budget-display__item">
//                 <span class="budget-display__item--desc">${item.title}</span>
//                 <span class="budget-display__item--cost">${item.amount}</span>
//                 <i class="fas fa-trash-alt" data-id="${item.id}"></i>
//             </li>
//         `
//         if(item.type === "exp") {
//             expensesList.innerHTML += html
//         } else if(item.type === "inc") {
//             incomeList.innerHTML += html
//         }
//     })
// }

// function clearForm() {
//     titleElem.value = ""
//     amountElem.value = ""
// }

// function saveBudget() {
//     if(budget.length > 0) {

//         //load spinner
//         const spinner = document.createElement("img")
//         spinner.src = "assets/images/spinner.gif"
//         spinner.className = "form__spinner"
//         const content = submitBtn.innerHTML
//         submitBtn.disabled = true
//         submitBtn.innerHTML = ""
//         submitBtn.appendChild(spinner)

//         fetch("server/save-budget", {
//             method: "POST",
//             body: JSON.stringify({ budget }),
//             headers: {
//                 "Content-type": "application/json"
//             }
//         })
//         .then(res => {
//             if(res.status === 200) return res.json()
//             return res.text()
//         })
//         .then(response => {
//             console.log(response)
//             if(typeof response === "object") {
//                 const { status, msg } = response
//                 if(status === true) {
//                     new Toast({
//                         message: msg, 
//                         type: "success."
//                     })

//                     // clear
//                     budget = []
//                     expensesList.innerHTML = ""
//                     incomeList.innerHTML = ""

//                 } else {
//                     new Toast({
//                         message: msg, 
//                         type: "danger"
//                     })
//                 }

//                 submitBtn.innerHTML = content
//                 submitBtn.disabled = false
//             } else {
//                 throw new Error()
//             }
//         })
//         .catch(error => {
//             console.log(error.message)
//             new Toast({
//                 message: "Something went wrong", 
//                 type: "danger"
//             })

//             submitBtn.innerHTML = content
//             submitBtn.disabled = false
//         })
//     } else {
//         new Toast({
//             message: "No budget entered yet", 
//             type: "warning"
//         })
//     }
// }