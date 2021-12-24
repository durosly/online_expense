    <?php require_once 'partials/auth.php' ?>
    <?php $pageName = "Dashboard" ?> 
    <?php require_once 'partials/header.php' ?>
    <body class="dash">
        <?php require_once 'partials/nav.php' ?>
        <main class="main">
            <div class="container">
                <form class="budget">
                    <input type="text" name="budget" id="budget" class="budget__input" placeholder="Budget...">
                    <select class="budget__choice" name="type" id="type">
                        <option value="exp">Expense</option>
                        <option value="inc">Sales</option>
                    </select>
                    <button class="budget__submit">
                        <span>Add</span>
                        <i class="ml-1 fas fa-plus"></i>
                    </button>
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