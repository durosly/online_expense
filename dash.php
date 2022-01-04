    <?php //require_once 'partials/auth.php' ?>
    <?php $pageName = "Dashboard" ?> 
    <?php require_once 'partials/header.php' ?>
    <body class="dash">
        <?php require_once 'partials/nav.php' ?>
        <main id="main" class="main">
            <h2>Loading...</h2>
            <!-- <div class="container">
                <form class="budget">
                    <input type="text" name="title" id="title" class="budget__title" placeholder="Title...">
                    <input type="text" name="amount" id="amount" class="budget__amount" placeholder="amount...">
                    <select class="budget__choice" name="type" id="type">
                        <option value="exp">Expense</option>
                        <option value="inc" selected>Sales</option>
                    </select>
                    <button class="budget__submit">
                        <span>Add</span>
                        <i class="ml-1 fas fa-plus"></i>
                    </button>
                </form>
                <span class="budget-display__date">
                    <?php echo date("F d, Y") ?>
                </span>
                <div class="budget-display">
                    <div class="budget-display__expenses">
                        <h2 class="budget-display__title budget-display__title--expenses">Expenses</h2>
                        <ul class="budget-display__list" id="expenses-list">
                        </ul>
                    </div>
                    <div class="budget-display__sales">
                        <h2 class="budget-display__title budget-display__title--income">Sales</h2>
                        <ul class="budget-display__list" id="income-list">
                        </ul>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="budget-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th colspan="2">Expenses</th>
                                <th colspan="2">Sales</th>
                                <th>Net</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>25-dec-2022</td>
                                <td>Nice</td>
                                <td>2000</td>
                                <td>Friend</td>
                                <td>2900</td>
                                <td>900</td>
                                <td><i class="fas fa-trash-alt"></i></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td>Total</td>
                                <td>2000</td>
                                <td></td>
                                <td>2900</td>
                                <td>900</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="align-right">
                    <button class="budget-display__save-btn">Save <i class="fas fa-save ml-1"></i></button>
                </div>
            </div> -->
        </main>
        <script crossorigin src="https://unpkg.com/react@17/umd/react.development.js"></script>
        <script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
        <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
        <script src="dist/toast/toast.min.js"></script>
        <script type="text/babel"  src="assets/js/dash.js"></script>
    </body>
</html>