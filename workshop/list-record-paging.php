<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="bootstrap/css/dataTables.bootstrap.min.css" type="text/css">

    <script src="bootstrap/js/jquery-1.12.4.js" type="text/javascript"></script>
    <script src="bootstrap/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/dataTables.bootstrap.min.js" type="text/javascript"></script>    
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="script.js"></script>

    <style>
        body {
            font-family: 'Phetsarath OT'
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#table_1_id').DataTable();
        })
    </script>
 

</head>
<body>
    <?php include('menu.php') ?>
    <div class="container-fluid" style="padding-bottom: 50px">
        <div class="well well-sm" style="font-family: Phetsarath OT; text-align: center; background-color: bisque; font-size:20px; margin-top: 20px">
            ຂໍ້ມູນພະນັກງານທັງໝົດ
        </div>
        <div class="row">
            <div class="col-sm-2">
                <button id="add_btn" class="btn btn-primary" style="width: 100%" data-toggle="modal" data-target="#modal_add" > <span class="glyphicon glyphicon-plus"></span> ເພີ່ມຂໍ້ມູນ</button>
            </div>
        </div>
        <br>
        <table id="table_1_id" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ລຳດັບ</th>
                    <th>ລະຫັດ</th>
                    <th>ຊື່</th>
                    <th>ເພດ</th>
                    <th>ພະແນກ</th>
                    <th>ເງິນເດືອນ</th>
                    <th>ເງິນອຸດໜຸນ</th>
                    <th>ລາຍຮັບທັງໝົດ</th>
                    <th>ຈັດການຂໍ້ມູນ</th>
                    <!-- <th>ລຶບຂໍ້ມູນ</th> -->
                </tr>
            </thead>
            <tbody>
                <?php

                    error_reporting(0);
                    include 'connect-db.php';
                    
                    $sql = "SELECT e.empno, e.name, e.gender, d.name AS department, 
                    s.sal AS salary, e.incentive, (s.sal+IFNULL(e.incentive, 0)) AS total
                    FROM emp e LEFT JOIN dept d ON e.deptno = d.dno
                    JOIN salary s ON e.grade = s.grade
                    ORDER BY department ASC, total DESC;";

                    $result = mysqli_query($link, $sql);
                

               if (!$result) {
                
                    echo "<tr><td>No data</td></tr>";

               } else if ($result) {
                    $number = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $empno = $row['empno'];
                        $name = $row['name'];
                        $gender = $row['gender'];
                        $department = $row['department'];
                        $salary = $row['salary'];
                        $incentive = $row['incentive'];
                        $total = $row['total'];
                ?>
                    <tr>
                        <td style="text-align: center"><?= ++$number ?></td>
                    <div id='<?= "row$empno" ?>'>
                        <td><?= $empno ?></td>
                        <td><?= $name ?></td>
                        <td style="text-align: center"><?= $gender ?></td>
                        <td><?= $department ?></td>
                        <td style="text-align: right"><?= number_format($salary) ?></td>
                        <td style="text-align: right"><?= number_format($incentive) ?></td>
                        <td style="text-align: right"><?= number_format(doubleval($total), 2) ?></td>
                        <td style="text-align: center">
                            <button id="edit_btn" class="btn btn-warning" data-toggle="modal" data-target="#modal_edit" data-id="<?= $empno ?>" > <span class="glyphicon glyphicon-edit"></span> ແກ້ໄຂ</button>
                        <!-- </td>
                        <td style="text-align: center"> -->
                            <button id="delete_btn" class="btn btn-danger" data-toggle="modal" data-target="#modal_delete" data-id="<?= $empno ?>" > <span class="glyphicon glyphicon-trash"></span> ລຶບ</button>
                        </td>
                    </div>
                    </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <?php
            include 'modal-add.php';        
            include 'modal-edit.php';
            include 'modal-delete.php';
        ?>
    </div>
</body>
</html>