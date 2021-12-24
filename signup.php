    <?php $pageName = "Sign up" ?>
    <?php require_once "partials/header.php" ?>
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
    <script src="dist/toast/toast.min.js"></script>
    <script src="assets/js/signup.js"></script>
</html>