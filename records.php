    <?php require_once 'partials/auth.php' ?>
    <?php $pageName = "Records" ?> 
    <?php require_once 'partials/header.php' ?>
    <body class="dash">
        <?php require_once 'partials/nav.php' ?>
        <main class="main">
            <div class="container">
                <form class="budget-records">
                    <select class="budget-records__month" name="month" id="month">
                        <option value="1">January</option>
                        <option value="2">Febuary</option>
                    </select>
                    <select class="budget-records__year" name="year" id="year">
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                    </select>
                    <button class="budget-records__submit">Show <i class="ml-1 fas fa-eye"></i></button>
                </form>
                <div class="table-responsive">
                    <table class="budget-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th colspan="2">Expenses</th>
                                <th colspan="2">Sales</th>
                                <th>Net</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>22-dec-21</td>
                                <td>Taxi</td>
                                <td>250</td>
                                <td>dresses</td>
                                <td>1000</td>
                                <td>750</td>
                            </tr>
                            <tr>
                                <td>22-dec-21</td>
                                <td>Taxi</td>
                                <td>250</td>
                                <td>dresses</td>
                                <td>1000</td>
                                <td>750</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td>Total</td>
                                <td>2750</td>
                                <td></td>
                                <td>1000</td>
                                <td>-1750</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </main>
    </body>
</html>