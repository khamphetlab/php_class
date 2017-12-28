<?php
include 'session.php';
include 'connect-db.php';

//ລືບຂໍ້ມູນ
if ($_GET['Action'] == "del") {
    $id = $_GET['empno'];
    $sql = "DELETE FROM emp WHERE empno='$id' ";
    mysqli_query($link, $sql);
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>ສະແດງຂໍ້ມູນ</title>
        <?php include 'include/header.php'; ?>
        <style>
            th{
                font-family: Phetsarath OT;
                text-align: center;
                color: white;
                background-color: graytext;
            }
            tr:hover{
                background-color: buttonface;
            }
            .mybtn {
                width: 60px;
                border-radius: 50px;
                font-family: Phetsarath OT;
            }
        </style>
    </head>
    <body>
        <?php include 'include/menu.php'; ?>
        <div class="container-fluid" style="padding-top: 20px">
            <div class="well well-sm" style="background-color: burlywood; font-family: Phetsarath OT; color: blue;">
                <center><h4><b>ຂໍ້ມູນພະນັກງານທັງໝົດ</b></h4></center>
            </div>
            <table class="table table-bordered">
                <thead>
                <th>ລໍາດັບ</th>
                <th>ລະຫັດ</th>
                <th>ຊື່ພະນັກງານ</th>
                <th>ເພດ</th>
                <th>ພະແນກ</th>
                <th>ເງິນເດືອນ</th>
                <th>ເງິນອຸດໜູນ</th>
                <th>ປັງປຸງ</th>
                <th>ລືບ</th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT e.empno, e.name, e.gender, d.name AS department, s.sal, e.incentive FROM emp e JOIN dept d ON e.deptno = d.dno JOIN salary s ON e.grade = s.grade";
                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $empno = $row['empno'];
                        $name = $row['name'];
                        $sex = $row['gender'];
                        $dept = $row['department'];
                        $salary = $row['sal'];
                        $incentive = $row['incentive'];
                        ?>
                        <tr>
                            <td style="text-align: center"><?= ++$number ?></td>
                            <td><?= $empno ?></td>
                            <td><?= $name ?></td>
                            <td style="text-align: center"><?= $sex ?></td>
                            <td><?= $dept ?></td>
                            <td style="text-align: right"><?= number_format($salary) ?></td>
                            <td style="text-align: right"><?= number_format($incentive) ?></td>
                            <td style="text-align: center"><a href="edit.php?empno=<?= $empno ?>" class="btn btn-primary mybtn">ປັບປຸງ</a></td>
                            <td style="text-align: center"><a href="list-data.php?Action=del&empno=<?= $empno ?>" onclick="return confirm('ຕ້ອງການລືບແທ້ຫຼືບໍ່?')" class="btn btn-danger mybtn">ລືບ</a></td>
                        </tr>

                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div style="margin-top: 50px;">
            <?php include 'include/footer.php'; ?>      
        </div>
    </body>
</html>
