<?php include 'session.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>ຄົ້ນຫາຂໍ້ມູນ</title>
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
                <!--ສ້າງເມນູດ້ານຂ້າງ-->
                <!--ເນື້ອຫາ-->
                <div class="well well-sm" style="background-color: burlywood;">
                    <div class="row">

                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <form method="GET">
                                <div class="input-group">
                                    <input type="search" name="search" placeholder="ຄົ້ນຫາຕາມລະຫັດ ຫຼື ຊື່" class="form-control">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" type="submit" name="btnSearch"><i class="glyphicon glyphicon-search"></i> ຄົ້ນຫາ</button>
                                    </div>
                                </div>
                            </form>    
                        </div>
                    </div>
                </div>
                <?php
                include 'connect-db.php';

                $where = "";
                if (isset($_GET['btnSearch'])) {
                    $search = $_GET['search'];
                    $where .= "WHERE e.name LIKE '%$search%' OR e.empno LIKE '%$search%' ";
                }

                $sql = "SELECT e.empno, e.name as empName, e.gender, d.name as deptName, s.sal, e.incentive FROM emp e LEFT JOIN dept d ON e.deptno =  d.dno LEFT JOIN salary s ON e.grade = s.grade $where ORDER BY d.name ASC";
                $result = mysqli_query($link, $sql);
                $numRow = mysqli_num_rows($result);

                if ($numRow > 0) {
                    echo "<span style='color: blue; font-size: 18px;'>ຈໍານວນຂໍ້ມູນທັງໝົດ: $numRow ລາຍການ</span>";
                } else {
                    echo "<span style='color: red; font-size: 18px;'>ບໍ່ມີຂໍ້ມູນໃນຖານຂໍ້ມູນ</span>";
                }
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
                        if ($numRow > 0) {
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
                        }
                        ?>
                    </tbody>
                </table>

                <!--ສີ້ນສຸດເນື້ອຫາ-->
                <!--ໃສ່ footer-->
                <div class="col-sm-12" style="margin-top: 50px;">
                    <?php include 'include/footer.php'; ?>      
                </div>
            </div>
        </div>
    </body>
</html>
