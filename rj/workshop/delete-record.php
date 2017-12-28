<?php include 'session.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ລືບຂໍ້ມູນ</title>
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
        <!--ຈາວາສຄິບສໍາລັບເລືອກທັງໝົດ ແລະ ຍົກເລືອກທັງໝົດ-->
        <SCRIPT LANGUAGE="JavaScript">
            function CheckAll(chk)
            {
                for (i = 0; i < chk.length; i++)
                    chk[i].checked = true;
            }

            function UnCheckAll(chk)
            {
                for (i = 0; i < chk.length; i++)
                    chk[i].checked = false;
            }
        </script>

    </head>
    <body>
        <?php include 'include/menu.php'; ?>
        <div class="container-fluid" style="padding-top: 30px;">
            <!--ເນື້ອຫາ-->

            <?php
            include 'connect-db.php';

            $sql = "SELECT e.empno, e.name as empName, e.gender, d.name as deptName, s.sal, e.incentive FROM emp e LEFT JOIN dept d ON e.deptno =  d.dno LEFT JOIN salary s ON e.grade = s.grade  ORDER BY d.name ASC";
            $result = mysqli_query($link, $sql);
            $numRow = mysqli_num_rows($result);

            if ($numRow > 0) {
                echo "<span style='color: blue; font-size: 18px;'>ຈໍານວນຂໍ້ມູນທັງໝົດ: $numRow ລາຍການ</span>";
            } else {
                echo "<span style='color: red; font-size: 18px;'>ບໍ່ມີຂໍ້ມູນໃນຖານຂໍ້ມູນ</span>";
            }
            ?>

            <form name="myform" action="multi-delete-record.php" method="POST">
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
                            <th>ລືບຂໍ້ມູນ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($numRow > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                $empno = $row['empno'];
                                $empName = $row['empName'];
                                $gender = $row['gender'];
                                $deptName = $row['deptName'];
                                $salary = number_format($row['sal']);
                                $incentive = number_format($row['incentive']);
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?= ++$number ?></td>
                                    <td style="text-align: center;"><?= $empno ?></td>
                                    <td><?= $empName ?></td>
                                    <td style="text-align: center;"><?= $gender ?></td>
                                    <td><?= $deptName ?></td>
                                    <td style="text-align: right;"><?= $salary ?></td>
                                    <td style="text-align: right;"><?= $incentive ?></td>
                                    <td style="text-align: center;"><input type="checkbox" id="chkDelete" name="chkDel[ ]" value="<?= $empno ?>"></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <input type="submit" name="btnDelete" value="ລືບຂໍ້ມູນ" onclick="return confirm('ທ່ານຕ້ອງການລືບແທ້ບໍ?')" class="btn btn-danger">
                <input type="button" name="Check_All" value="ເລືອກທັງໝົດ" onClick="CheckAll(document.myform.chkDelete)" class="btn btn-primary">
                <input type="button" name="Un_CheckAll" value="ຍົກເລີກທັງໝົດ" onClick="UnCheckAll(document.myform.chkDelete)" class="btn btn-success">
            </form>
        </div>
        <!--ສີ້ນສຸດເນື້ອຫາ-->
        
        <!--ໃສ່ footer-->
        <div style="margin-top: 50px;">
            <?php include 'include/footer.php'; ?>      
        </div>
    </body>
</html>
