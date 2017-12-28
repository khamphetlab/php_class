<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <script src="bootstrap/js/jquery.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="well well-sm" style="font-family: Phetsarath OT; text-align: center; background-color: bisque; font-size:20px; margin-top: 20px">
            ຂໍ້ມູນພະນັກງານທັງໝົດ
        </div>
        <table class="table table-bordered table-hover">
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
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'connect-db.php';

                    $sql = "SELECT e.empno, e.name, e.gender, d.name AS department, 
                    s.sal AS salary, e.incentive, (s.sal+IFNULL(e.incentive, 0)) AS total
                    FROM emp e LEFT JOIN dept d ON e.deptno = d.dno
                    JOIN salary s ON e.grade = s.grade
                    ORDER BY department ASC, total DESC;";

                    $result = mysqli_query($link, $sql);

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
                        <td><?= $empno ?></td>
                        <td><?= $name ?></td>
                        <td style="text-align: center"><?= $gender ?></td>
                        <td><?= $department ?></td>
                        <td style="text-align: right"><?= number_format($salary) ?></td>
                        <td style="text-align: right"><?= number_format($incentive) ?></td>
                        <td style="text-align: right"><?= number_format(doubleval($total), 2) ?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>