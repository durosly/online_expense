    <?php $pageName = "Log in"; ?>
    <?php require_once "partials/header.php" ?>
    <body class="auth">
        <main class="main">
            <form method="POST" enctype="multipart/form-data" class="form form__login">
                <div class="form__logo-container">
                    <img src="assets/images//caurix-logo.png" alt="caurix logo" class="form__logo" />
                </div>
                <h2 class="form__title">Log in</h2>
                <hr />
                <div class="form__group">
                    <label for="phone" class="form__label">Phone number</label>
                    <input type="tel" name="phone" id="phone" class="form__input" />
                </div>
                <div class="form__group">
                    <label for="password" class="form__label">password</label>
                    <input type="password" name="password" id="password" class="form__input" />
                </div>
                <button class="form__submit-btn">Log in <!--<img class="form__spinner" src="assets/images/spinner.gif" /> --></button>
                <hr />
                <div class="notice-area">
                    <p class="form__notice">Don't have an account?</p>
                    <a href="signup" class="form__link">Sign up</a>
                </div>
            </form>
        </main>
        <script src="dist/toast/toast.min.js"></script>
        <script src="assets/js/login.js"></script>
    </body>
</html>