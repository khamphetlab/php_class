<?php include 'session.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>ຂໍ້ມູນທັງໝົດ-ແບ່ງໜ້າ</title>
        <?php include 'include/header.php'; ?>
        <style>
            th{
                font-size: 18px;
                text-align: center;
                background: #4cae4c;
            }
            tr:hover{
                background-color: #f7ecb5;
            }
        </style>

    </head>
    <body>
        <!--ເມນູ-->
        <?php include 'include/menu.php'; ?>
        <!--ສິ້ນສຸດເມນູ-->
        <div class="container-fluid">
            <div style="padding-top: 30px;">
                <!--ເນື້ອຫາ-->
                <div class="well well-sm" style="background-color: burlywood; text-align: center; font-size: 20px; font-weight: bold;">ຂໍ້ມູນພະນັກງານ</div>
                <?php
                include 'connect-db.php';

                $perpage = 5;

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $prev_page = $page - 1;
                $next_page = $page + 1;
                $start = ($page - 1) * $perpage;
                $number = $start;

                $sql = "SELECT e.empno, e.name as empName, e.gender, d.name as deptName, s.sal, e.incentive FROM emp e LEFT JOIN dept d ON e.deptno =  d.dno LEFT JOIN salary s ON e.grade = s.grade ORDER BY e.empno ASC  limit $start, $perpage";
                $result = mysqli_query($link, $sql);
                ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ລໍາດັບ</th>
                            <th>ລະຫັດພະນັກງານ</th>
                            <th>ຊື່ ແລະ ນາມສະກຸນ</th>
                            <th>ເພດ</th>
                            <th>ສັງກັດຢູ່ພະແນກ</th>
                            <th>ເງິນເດືອນ</th>
                            <th>ເງິນອຸດໜູນ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {

                            $empno = $row['empno'];
                            $empNane = $row['empName'];
                            $gender = $row['gender'];
                            $deptName = $row['deptName'];
                            $salary = number_format($row['sal']);
                            $incentive = number_format($row['incentive']);
                            ?>
                            <tr>
                                <td style="text-align: center;"><?= ++$number ?></td>
                                <td style="text-align: center;"><?= $empno ?></td>
                                <td><?= $empNane ?></td>
                                <td style="text-align: center;"><?= $gender ?></td>
                                <td><?= $deptName ?></td>
                                <td style="text-align: right;"><?= $salary ?></td>
                                <td style="text-align: right;"><?= $incentive ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                $sql2 = "SELECT e.empno, e.name as empName, e.gender, d.name as deptName, s.sal FROM emp e LEFT JOIN dept d ON e.deptno =  d.dno LEFT JOIN salary s ON e.grade = s.grade ORDER BY d.name ASC";
                $query2 = mysqli_query($link, $sql2);
                $total_record = mysqli_num_rows($query2);
                $total_page = ceil($total_record / $perpage);
                echo "<div style='color: blue; font-size: 18px;'>ຈໍານວນຂໍ້ມູນທັງໝົດ: $total_record ລາຍການ</div>";
                ?>
                <center>
                    <ul class="pagination">
                        <li>
                            <?php if ($page > 1) { ?>
                                <a href="list-record-paging.php?page=<?php echo $prev_page; ?>" aria-ladel="Previous">   
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            <?php } ?>
                        </li>
                        <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                            <li <?php if ($page == $i) echo "class=\"active\""; ?>><a href="list-record-paging.php?page=<?php echo $i; ?>"><?php echo $i; ?></a> </li>
                        <?php } ?>
                        <li>
                            <?php if ($page < $total_page) { ?>
                                <a href="list-record-paging.php?page=<?php echo $next_page; ?>" aria-label = "Next">
                                    <span><span aria-hidden="true">&raquo;</span></span>
                                </a>
                            <?php } ?>
                        </li>
                    </ul>  
                </center>
            </div>
            <!--ສີ້ນສຸດເນື້ອຫາ-->
        </div>
        <!--ໃສ່ footer-->
        <div style="margin-top: 50px;">
            <?php include 'include/footer.php'; ?>      
        </div>
    </body>
</html>
