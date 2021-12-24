

// new Toast({
//     message: 'Welcome to Toast.js!', 
//     type: "success"
// })

////////
const signupForm = document.querySelector('.form__login')
const signupBtn = document.querySelector('.form__submit-btn')

const firstnameElem = document.getElementById("first")
const lastnameElem = document.getElementById("last")
const phonenumberElem = document.getElementById("phone")
const passwordElem = document.getElementById("password")

// add submit event
signupForm.addEventListener('submit', e => {
    e.preventDefault()

    const letterRegEx = /^[a-zA-Z]+$/
    const whitespaceRegEx = /\s/

    const firstname = firstnameElem.value 
    const lastname = lastnameElem.value 
    const phonenumber = phonenumberElem.value 
    const password = passwordElem.value 

    if(firstname.trim() === '') {
        new Toast({
            message: 'Fistname cannot be empty', 
            type: "warning"
        })

        return false
    } else if(!letterRegEx.test(firstname.trim())) {
        new Toast({
            message: 'Fistname must contain only letters', 
            type: "warning"
        })

        return false
    }

    if(lastname.trim() === '') {
        new Toast({
            message: 'Fistname cannot be empty', 
            type: "warning"
        })

        return false
    } else if(!letterRegEx.test(lastname.trim())) {
        new Toast({
            message: 'Fistname must contain only letters', 
            type: "warning"
        })

        return false
    }

    if(phonenumber.trim() === '') {
        new Toast({
            message: 'Phonenumber cannot be empty', 
            type: "warning"
        })

        return false
    } else if(whitespaceRegEx.test(phonenumber)) {
        new Toast({
            message: 'Phonenumber cannot contain whitespace', 
            type: "warning"
        })

        return false
    }

    if(password.trim() === '') {
        new Toast({
            message: 'Password cannot be empty', 
            type: "warning"
        })

        return false
    }

    const data = new FormData(signupForm)

    //load spinner
    const spinner = document.createElement("img")
    spinner.src = "assets/images/spinner.gif"
    spinner.className = "form__spinner"
    const content = signupBtn.innerHTML
    signupBtn.disabled = true
    signupBtn.innerHTML = ""
    signupBtn.appendChild(spinner)

    fetch("server/signup", {
        method: "POST",
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
                // clear fields
                firstnameElem.value = ""
                lastnameElem.value = ""
                phonenumberElem.value = ""
                passwordElem.value = ""

                new Toast({
                    message: msg, 
                    type: "success"
                })

                signupBtn.disabled = false
                signupBtn.innerHTML = content
            } else {
                new Toast({
                    message: msg, 
                    type: "warning"
                })
        
                signupBtn.disabled = false
                signupBtn.innerHTML = content
            }
        } else {
            throw new Error("Something went wrong")
        }
    })
    .catch(error => {
        console.log(error.message)
        new Toast({
            message: 'Something went wrong', 
            type: "danger"
        })

        signupBtn.disabled = false
        signupBtn.innerHTML = content
    })

})