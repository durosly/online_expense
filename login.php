<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log in | caurix expense management system</title>
    </head>
    <body class="auth">
        <main class="main">
            <form class="form form__login">
                <div class="form__logo-container">
                    <img src="assets/images//caurix-logo.png" alt="caurix logo" class="form__logo" />
                </div>
                <h2 class="form__title">Log in</h2>
                <hr />
                <div class="form-group">
                    <label for="phone" class="form__label">Phone number</label>
                    <input type="tel" name="phone" id="phone" class="form__input" />
                </div>
                <div class="form-group">
                    <label for="password" class="form__label">password</label>
                    <input type="password" name="password" id="password" class="form__input" />
                </div>
                <button class="form__submit-btn">Log in</button>
                <hr />
                <div class="notice-area">
                    <p class="form__notice">Don't have an account?</p>
                    <a href="/signup" class="form__link">Sign up</a>
                </div>
            </form>
        </main>
    </body>
</html>