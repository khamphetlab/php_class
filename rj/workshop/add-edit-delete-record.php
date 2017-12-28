<?php include 'session.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ດັດແກ້ຂໍ້ມູນ</title>
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
            .btn1{
                width: 55px;
                border-radius: 15px;
            }
        </style>
        <!--ຈາວາສຄິບສໍາລັບເລືອກທັງໝົດ ແລະ ຍົກເລືອກທັງໝົດ-->
    </head>
    <body>
        <?php include 'include/menu.php'; ?>
        <div class="container-fluid">
            <div style="padding-top: 30px;">

                <!--ເນື້ອຫາ-->
                <div class="well well-sm" style="background-color: burlywood;">
                    <div class="row">

                        <div class="col-sm-3"></div>
                        <form method="GET">
                            <div class="col-sm-4"><input type="search" name="search" placeholder="ຄົ້ນຫາຕາມລະຫັດ ຫຼື ຊື່" class="form-control"></div>
                            <div class="col-sm-5"><button type="submit" name="btnSearch" class="btn btn-primary" >Search</button></div>
                        </form>
                    </div>
                </div>
                <?php
                include 'connect-db.php';

                //*** ເງື່ອນໄຂໃນການລືບຂໍ້ມູນ ***//
                if ($_GET["Action"] == "Del") { //ສົ່ງຄ່າມາແບບລີ້ງ tag <a>
                    $delete_empno = $_GET['emp_no'];
                    $sql = "DELETE FROM emp WHERE empno = '$delete_empno'";
                    $result = mysqli_query($link, $sql);
                }

                //*** ເງື່ອນໄຂໃນການປັບປຸງຂໍ້ມູນ ***//
                if (isset($_POST['Update'])) { //ສົ່ງຄ່າມາແບບປຸ່ມ tag <input>
                    $emp_no = $_POST['edit_empno'];
                    $emp_name = $_POST['edit_name'];
                    $gender = $_POST['gender'];
                    $deptno = $_POST['department'];
                    $emp_grade = $_POST['grade'];
                    $incentive = $_POST['incentive'];

                    //ກວດສອບວ່າມີຄ່າຫວ່າງເປົ່າຫຼືບໍ່ເນື່ອງຈາກສາມາດເພີ້ມຄ່າຫວ່າງລົງໄປໃນຖານຂໍ້ມູນໄດ້
                    if ($deptno == "")
                        $deptno = 'NULL';
                    if ($emp_grade == "")
                        $emp_grade = 'NULL';

                    //ປ້ອນຂໍ້ມູນລົງໃນຖານຂໍ້ມູນ
                    if ($error_name == "") {
                        $sql = "UPDATE emp SET name='$emp_name', gender='$gender', deptno=$deptno, grade=$emp_grade, incentive=$incentive WHERE empno='$emp_no'";
                        $result = mysqli_query($link, $sql);
                    }
                }

                //ສໍາລັບຄົ້ນຫາ
                $where = "";
                if (isset($_GET['btnSearch'])) {
                    $search = $_GET['search'];
                    $where .= "WHERE e.name LIKE '%$search%' OR e.empno LIKE '%$search%' ";
                }

                //ດຶງຂໍ້ມູນຂຶ້ນມາ
                $sql = "SELECT e.empno, e.name as empName, e.gender, d.name as deptName, s.sal, e.incentive FROM emp e LEFT JOIN dept d ON e.deptno =  d.dno LEFT JOIN salary s ON e.grade = s.grade $where ORDER BY e.empno ASC";
                $result = mysqli_query($link, $sql);
                $numRow = mysqli_num_rows($result);

                if ($numRow > 0) {
                    echo "<span style='color: blue; font-size: 18px;'>ຈໍານວນຂໍ້ມູນທັງໝົດ: $numRow ລາຍການ</span>";
                } else {
                    echo "<span style='color: red; font-size: 18px;'>ບໍ່ມີຂໍ້ມູນໃນຖານຂໍ້ມູນ</span>";
                }
                ?>

                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ລໍາດັບ</th>
                                <th>ລະຫັດ</th>
                                <th>ຊື່ ແລະ ນາມສະກຸນ</th>
                                <th>ເພດ</th>
                                <th>ສັງກັດຢູ່ພະແນກ</th>
                                <th>ເງິນເດືອນ</th>
                                <th>ເງິນອຸດໜູນ</th>
                                <th>ດັດແກ້ຂໍ້ມູນ</th>
                                <th>ລືບຂໍ້ມູນ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($numRow > 0) {
                                // ສະແດງຜົນຂໍ້ມູນທັງໝົດ
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $empno = $row['empno'];
                                    $empName = $row['empName'];
                                    $gender = $row['gender'];
                                    $deptName = $row['deptName'];
                                    $salary = number_format($row['sal']);
                                    $incentive = $row['incentive'];

                                    //ຖ້າກົດປຸ່ມດັດແກ້
                                    if ($empno == $_GET['emp_no'] && $_GET['Action'] == "Edit") {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?= ++$number ?></td>
                                            <td style="text-align: center;"><input type="text" name="edit_empno" value="<?= $empno ?>" readonly class="form-control" style="width:100px;"></td>
                                            <td><input type="text" name="edit_name" value="<?= $empName ?>" class="form-control" required=""></td>
                                            <td>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" value="M" <?php if ($gender != 'F') echo 'checked'; ?>> ຊາຍ
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" value="F"  <?php if ($gender == 'F') echo 'checked'; ?>> ຍິງ
                                                </label>
                                            </td>
                                            <td>
                                                <?php
                                                //ສໍາລັບສ້າງລາຍການພະແນກ
                                                $sql_dept = "SELECT dno, name FROM dept ORDER BY name";
                                                $result_dept = mysqli_query($link, $sql_dept);
                                                ?>
                                                <select name="department" class="form-control" style="width:200px;">
                                                    <option value="">------------ພະແນກ-------------</option>
                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($result_dept)) {
                                                        $dno = $row['dno'];
                                                        $name = $row['name'];
                                                        ?>
                                                        <option value="<?= $dno ?>" <?php if ($deptName == $name) echo "selected"; ?>><?= $name ?></option>;
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>

                                            <td>
                                                <?php
                                                $sql_sal = "SELECT *FROM salary";
                                                $result_sal = mysqli_query($link, $sql_sal);
                                                ?>
                                                <select name="grade" class="form-control" style="width:100px;">
                                                    <option value="">-------ຊັ້ນເງິນເດືອນ-------</option>
                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($result_sal)) {
                                                        $grade = $row['grade'];
                                                        $sal = number_format($row['sal']);
                                                        ?>
                                                        <option value="<?= $grade ?>" <?php if ($salary == $sal) echo"selected"; ?>><?= $sal ?></option>;
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td><input type="number" name="incentive" value="<?= $incentive ?>" class="form-control"></td>
                                            <td style="text-align: center;"><input type="submit" name="Update" value="ປັບປຸງ" class="btn btn-primary btn-sm btn1"></td>
                                            <td><a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="btn btn-warning btn-sm btn1">ຍົກເລີກ</a></td>
                                        </tr>
                                        <?php
                                    } else {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?= ++$number ?></td>
                                            <td style="text-align: center;"><?= $empno ?></td>
                                            <td><?= $empName ?></td>
                                            <td style="text-align: center;"><?= $gender ?></td>
                                            <td><?= $deptName ?></td>
                                            <td style="text-align: right;"><?= $salary ?></td>
                                            <td style="text-align: right;"><?= number_format($incentive) ?></td>
                                            <td style="text-align: center;"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?Action=Edit&emp_no=<?= $empno ?>" class="btn btn-primary btn-sm btn1">ແກ້ໄຂ</a></td>
                                            <td style="text-align: center;"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?Action=Del&emp_no=<?= $empno ?>" onclick="return confirm('ທ່ານຕ້ອງການລືບແທ້ບໍ?')" class="btn btn-danger btn-sm btn1">ລືບ</a></td>
                                        </tr>

                                        <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </form>

                <!--ສີ້ນສຸດເນື້ອຫາ-->
                <!--ໃສ່ footer-->
                <div style="margin-top: 50px;">
                    <?php include 'include/footer.php'; ?>      
                </div>
            </div>
        </div>
    </body>
</html>
