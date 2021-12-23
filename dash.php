<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <title>Dashboard | caurix expense management system</title>
        <link rel="stylesheet" type="text/css" href="assets/stylesheet/main.min.css" />
    </head>
    <body class="dash">
        <header class="header">
            <div class="header__left">
                <img src="assets/images/caurix-logo.png" alt="caurix-logo" class="header__logo" />
                <span class="header__greet">Hello, Mary</span>
            </div>
            <div class="header__right">
                <ul class="header__nav">
                    <li class="header__nav-item">
                        <a href="dashboard" class="header__nav-link">Dashboard</a>
                    </li>
                    <li class="header__nav-item">
                        <a href="records" class="header__nav-link">Records</a>
                    </li>
                    <li class="header__nav-item">
                        <a href="logout" class="header__nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </header>
        <main class="main">
            <div class="container">
                <form class="budget">
                    <input type="text" name="budget" id="budget" class="budget__input" placeholder="Budget...">
                    <select class="budget__choice" name="type" id="type">
                        <option value="exp">Expense</option>
                        <option value="inc">Sales</option>
                    </select>
                    <button class="budget__submit">Add <i class="ml-1 fas fa-plus"></i></button>
                </form>
                <span class="budget-display__date">
                    October 21, 2018
                </span>
                <div class="budget-display">
                    <div class="budget-display__expenses">
                        <h2 class="budget-display__title budget-display__title--expenses">Expenses</h2>
                        <ul class="budget-display__list">
                            <li class="budget-display__item">
                                <span class="budget-display__item--desc">Taxi</span>
                                <span class="budget-display__item--cost">7,000</span>
                                <i class="fas fa-trash-alt"></i>
                            </li>
                            <li class="budget-display__item">
                                <span class="budget-display__item--desc">Taxi</span>
                                <span class="budget-display__item--cost">7,000</span>
                                <i class="fas fa-trash-alt"></i>
                            </li>
                            <li class="budget-display__item">
                                <span class="budget-display__item--desc">Taxi</span>
                                <span class="budget-display__item--cost">7,000</span>
                                <i class="fas fa-trash-alt"></i>
                            </li>
                        </ul>
                    </div>
                    <div class="budget-display__sales">
                        <h2 class="budget-display__title budget-display__title--income">Sales</h2>
                        <ul class="budget-display__list">
                            <li class="budget-display__item">
                                <span class="budget-display__item--desc">Taxi</span>
                                <span class="budget-display__item--cost">7,000</span>
                                <i class="fas fa-trash-alt"></i>
                            </li>
                            <li class="budget-display__item">
                                <span class="budget-display__item--desc">Taxi</span>
                                <span class="budget-display__item--cost">7,000</span>
                                <i class="fas fa-trash-alt"></i>
                            </li>
                            <li class="budget-display__item">
                                <span class="budget-display__item--desc">Taxi</span>
                                <span class="budget-display__item--cost">7,000</span>
                                <i class="fas fa-trash-alt"></i>
                            </li>
                            <li class="budget-display__item">
                                <span class="budget-display__item--desc">Taxi</span>
                                <span class="budget-display__item--cost">7,000</span>
                                <i class="fas fa-trash-alt"></i>
                            </li>
                            <li class="budget-display__item">
                                <span class="budget-display__item--desc">Taxi</span>
                                <span class="budget-display__item--cost">7,000</span>
                                <i class="fas fa-trash-alt"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="align-right">
                    <button class="budget-display__save-btn">Save <i class="fas fa-save ml-1"></i></button>
                </div>
            </div>
        </main>

        <script src="assets/js/dash.js"></script>
    </body>
</html>