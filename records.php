    <?php require_once 'partials/auth.php' ?>
    <?php $pageName = "Records" ?> 
    <?php require_once 'partials/header.php' ?>
    <body class="dash">
        <?php require_once 'partials/nav.php' ?>
        <?php
            require_once "includes/Budget.php";
            $budget = new Budget($db->get_conn());
            $budget->id = $_SESSION['userId'];
            $month_list = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            $months = $budget->getMonths();
            $years = $budget->getYears();
        ?>
        <main class="main">
            <div class="container">
                <?php if($months === false) { ?>
                    <div class="notice">
                        <p class="notice__msg">No records found.</p>
                    </div>
                <?php } else { ?>
                    <form class="budget-records">
                        <select class="budget-records__month" name="month" id="month">
                            <option selected disabled>Current month</option>
                            <?php while($row = $months->fetch(PDO::FETCH_OBJ)) { ?>
                                <option value="<?php echo $row->month ?>">
                                    <?php echo $month_list[$row->month - 1] ?>
                                </option>
                            <?php } ?>
                        </select>
                        <select class="budget-records__year" name="year" id="year">
                            <option selected disabled>Current year</option>
                            <?php while($row = $years->fetch(PDO::FETCH_OBJ)) { ?>
                                <option value="<?php echo $row->year ?>">
                                    <?php echo $row->year ?>
                                </option>
                            <?php } ?>
                        </select>
                        <button class="budget-records__submit">Show <i class="ml-1 fas fa-eye"></i></button>
                    </form>
                    <?php 
                        $budget->month = (int) ($_GET['month'] ?? date("m"));
                        $budget->year = (int) ($_GET['year'] ?? date("Y"));
                        $records = $budget->getBudgetsByDate();
                    ?>
                    <?php if($records === false) { ?>
                        <div class="notice">
                            <p class="notice__msg">No records found for current month.</p>
                        </div>
                    <?php } else { ?>
                        <?php $records_array = $records->fetchAll(PDO::FETCH_OBJ) ?> 
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
                                    <?php 
                                        $count = count($records_array);
                                        $i = 0;
                                        $totalExp = 0;
                                        $totalInc = 0;
                                    ?>
                                    <?php while($i < $count) { ?>
                                        <?php $data1 = $records_array[$i] ?? 0; ?>
                                        <?php $data2 = $records_array[$i + 1] ?? 0; ?>
                                        <?php if($data2 === 0){ ?>
                                            <?php if($data1->type === "exp") { ?>
                                                <tr>
                                                    <td><?php echo $data1->date . "-" . substr($month_list[$data1->month -1], 0, 3) . "-" . $data1->year; ?></td>
                                                    <td><?php echo $data1->title ?></td>
                                                    <td><?php echo $data1->amount ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?php echo "-" . $data1->amount ?></td>
                                                </tr>
                                                <?php $totalExp += $data1->amount; ?>
                                            <?php } else { ?>
                                                <tr>
                                                    <td><?php echo $data1->date . "-" . substr($month_list[$data1->month -1], 0, 3) . "-" . $data1->year; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?php echo $data1->title ?></td>
                                                    <td><?php echo $data1->amount ?></td>
                                                    <td><?php echo $data1->amount ?></td>
                                                </tr>
                                                <?php $totalInc += $data1->amount; ?>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <?php if($data1->type === $data2->type) { ?>
                                                <?php if($data1->type === 'exp') { ?>
                                                    <tr>
                                                        <td><?php echo $data1->date . "-" . substr($month_list[$data1->month -1], 0, 3) . "-" . $data1->year; ?></td>
                                                        <td><?php echo $data1->title ?></td>
                                                        <td><?php echo $data1->amount ?></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo "-" . $data1->amount ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $data2->date . "-" . substr($month_list[$data1->month -1], 0, 3) . "-" . $data1->year; ?></td>
                                                        <td><?php echo $data2->title ?></td>
                                                        <td><?php echo $data2->amount ?></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo "-" . $data2->amount ?></td>
                                                    </tr>
                                                    <?php
                                                        $totalExp += $data1->amount;
                                                        $totalExp += $data2->amount;
                                                    ?>
                                                <?php } else { ?>
                                                    <tr>
                                                        <td><?php echo $data1->date . "-" . substr($month_list[$data1->month -1], 0, 3) . "-" . $data1->year; ?></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo $data1->title ?></td>
                                                        <td><?php echo $data1->amount ?></td>
                                                        <td><?php echo $data1->amount ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $data2->date . "-" . substr($month_list[$data1->month -1], 0, 3) . "-" . $data1->year; ?></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo $data2->title ?></td>
                                                        <td><?php echo $data2->amount ?></td>
                                                        <td><?php echo $data2->amount ?></td>
                                                    </tr>
                                                    <?php
                                                        $totalInc += $data1->amount;
                                                        $totalInc += $data2->amount;
                                                    ?>
                                                <?php } ?>

                                            <?php } else { ?>
                                                <?php if($data1->date === $data2->date) { ?>
                                                    <tr>
                                                        <td><?php echo $data2->date . "-" . substr($month_list[$data1->month -1], 0, 3) . "-" . $data1->year; ?></td>
                                                        <td><?php echo $data1->type === "exp" ? $data1->title : $data2->title ?></td>
                                                        <td><?php echo $data1->type === "exp" ? $data1->amount : $data2->amount ?></td>
                                                        <td><?php echo $data1->type === "inc" ? $data1->title : $data2->title ?></td>
                                                        <td><?php echo $data1->type === "inc" ? $data1->amount : $data2->amount ?></td>
                                                        <td><?php echo $data1->type === "inc" ? ($data1->amount - $data2->amount) : ($data2->amount - $data1->amount) ?></td>
                                                    </tr>
                                                    <?php 
                                                        if($data1->type === "exp") {
                                                            $totalExp += $data1->amount;
                                                            $totalInc += $data2->amount;
                                                        } else {
                                                            $totalExp += $data2->amount;
                                                            $totalInc += $data1->amount;
                                                        }
                                                    ?>
                                                <?php } else { ?>
                                                    <?php if($data1->type === 'exp') { ?>
                                                        <tr>
                                                            <td><?php echo $data1->date . "-" . substr($month_list[$data1->month -1], 0, 3) . "-" . $data1->year; ?></td>
                                                            <td><?php echo $data1->title ?></td>
                                                            <td><?php echo $data1->amount ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><?php echo "-" . $data1->amount ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo $data2->date . "-" . substr($month_list[$data1->month -1], 0, 3) . "-" . $data1->year; ?></td>
                                                            <td><?php echo $data2->title ?></td>
                                                            <td><?php echo $data2->amount ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><?php echo "-" . $data2->amount ?></td>
                                                        </tr>
                                                        <?php
                                                            $totalExp += $data1->amount;
                                                            $totalExp += $data2->amount;
                                                        ?>
                                                    <?php } else { ?>
                                                        <tr>
                                                            <td><?php echo $data1->date . "-" . substr($month_list[$data1->month -1], 0, 3) . "-" . $data1->year; ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><?php echo $data1->title ?></td>
                                                            <td><?php echo $data1->amount ?></td>
                                                            <td><?php echo $data1->amount ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo $data2->date . "-" . substr($month_list[$data1->month -1], 0, 3) . "-" . $data1->year; ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><?php echo $data2->title ?></td>
                                                            <td><?php echo $data2->amount ?></td>
                                                            <td><?php echo $data2->amount ?></td>
                                                        </tr>
                                                        <?php
                                                            $totalInc += $data1->amount;
                                                            $totalInc += $data2->amount;
                                                        ?>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php $i += 2; ?>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td>Total</td>
                                        <td><?php echo $totalExp; ?></td>
                                        <td></td>
                                        <td><?php echo $totalInc; ?></td>
                                        <td><?php echo $totalInc - $totalExp ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    <?php } ?>

                <?php } ?>
            </div>
        </main>
    </body>
</html>