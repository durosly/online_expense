

// new Toast({
//     message: 'Welcome to Toast.js!', 
//     type: "success"
// })

////////
const signupForm = document.querySelector('.form__login')
const signupBtn = document.querySelector('.form__submit-btn')

// add submit event
signupForm.addEventListener('submit', e => {
    e.preventDefault()

    console.log("submit...")
})