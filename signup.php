<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,400&display=swap" rel="stylesheet">

        <title>Sign up | caurix expense management system</title>
        <link rel="stylesheet" type="text/css" href="assets/stylesheet/main.min.css" />
    </head>
    <body class="auth">
        <main class="main">
            <form class="form form__login">
                <div class="form__logo-container">
                    <img src="assets/images//caurix-logo.png" alt="caurix logo" class="form__logo" />
                </div>
                <h2 class="form__title">Sign up</h2>
                <hr />
                <div class="form__group">
                    <label for="first" class="form__label">First name</label>
                    <input type="text" name="first" id="first" class="form__input" />
                </div>
                <div class="form__group">
                    <label for="last" class="form__label">Last name</label>
                    <input type="text" name="last" id="last" class="form__input" />
                </div>
                <div class="form__group">
                    <label for="phone" class="form__label">Phone number</label>
                    <input type="tel" name="phone" id="phone" class="form__input" />
                </div>
                <div class="form__group">
                    <label for="password" class="form__label">password</label>
                    <input type="password" name="password" id="password" class="form__input" />
                </div>
                <button class="form__submit-btn">Sign up <!--<img class="form__spinner" src="assets/images/spinner.gif" /> --></button>
                <hr />
                <div class="notice-area">
                    <p class="form__notice">Already have an account?</p>
                    <a href="login" class="form__link">Log in</a>
                </div>
            </form>
        </main>
    </body>
</html>