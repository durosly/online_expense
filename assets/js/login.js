const loginForm = document.querySelector('.form__login')
const submitBtn = document.querySelector('.form__submit-btn')

const phonenumberElem = document.getElementById("phone")
const passwordElem = document.getElementById("password")

loginForm.addEventListener("submit", e => {
    e.preventDefault()

    const pass = passwordElem.value 
    const phone = phonenumberElem.value 

    if(phone.trim() === "") {
        new Toast({
            message: "Please, enter phonenumber", 
            type: "warning"
        })
        return false
    }
    if(pass.trim() === "") {
        new Toast({
            message: "Please, enter password", 
            type: "warning"
        })
        return false
    }

    const data = new FormData(loginForm)

    const spinner = document.createElement("img")
    spinner.src = "assets/images/spinner.gif"
    spinner.className = "form__spinner"
    const content = submitBtn.innerHTML
    submitBtn.disabled = true
    submitBtn.innerHTML = ""
    submitBtn.appendChild(spinner)

    fetch("server/login", {
        method: "POSt",
        body: data
    })
    .then(res => {
        if(res.status === 200) return res.json()
        return res.text()
    })
    .then(response => {
        if(typeof response === "object") {
            const { status, msg } = response 

            if(status === true) {
                new Toast({
                    message: msg, 
                    type: "success"
                })

                window.location.href = "dashboard"
            } else {
                new Toast({
                    message: msg, 
                    type: "danger"
                })

                submitBtn.disabled = false
                submitBtn.innerHTML = content
            }
        } else {
            throw new Error()
        }
    })
    .catch(error => {
        console.log(error.message)
        new Toast({
            message: 'Something went wrong', 
            type: "danger"
        })

        submitBtn.disabled = false
        submitBtn.innerHTML = content
    })
})