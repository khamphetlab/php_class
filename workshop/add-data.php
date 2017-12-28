<?php
    error_reporting(0);
    include('connect-db.php');

    $departmentQuery = "SELECT dno, name FROM dept ORDER BY name ASC;";
    $resultDept = mysqli_query($link, $departmentQuery);

    $salaryQuery = "SELECT grade FROM salary ORDER BY grade ASC;";
    $resultSalary = mysqli_query($link, $salaryQuery);

    $empno = $name = $gender = $deptno = $salary = $incentive = '';
    $error_id = "";
    if (isset($_POST['add'])) {
        $empno = $_POST['empno'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $deptno = $_POST['department'];
        $salary = $_POST['salary'];
        $incentive = $_POST['incentive'];

        if (empty($incentive)) {
            $incentive = "NULL";
        }

        // check validation of existing emp id
        $validateSQL = "SELECT empno FROM emp WHERE empno='$empno'";
        $validateResult = mysqli_query($link, $validateSQL);
        if (mysqli_num_rows($validateResult) > 0) {
            $error_id = '<br><div class="alert alert-warning"><b>ເຕືອນ: </b> ລະຫັດຖືກນຳໃຊ້ແລ້ວ</div>';
        }

        // add to db
        $postQuery = "INSERT INTO emp VALUES ('$empno', '$name', '$gender', $deptno, $salary, $incentive)";
        $postResult = mysqli_query($link, $postQuery);
        if ($postResult) {
            echo "<script type='text/javascript'>alert('ເພີ່ມຂໍ້ມູນສຳເລັດ!')</script>";
            $empno = $name = $gender = $deptno = $salary = $incentive = '';
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <?php include_once('css-js.php') ?>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        body, select, option {
            font-family: Phetsarath OT;
        }
        
        .container-fluid {
            padding-top: 50px;
        }

        .panel-header-text {
            font-weight: bold;
        }
        
    </style>

</head>
<body>
    <?php include('menu.php') ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-header-text">ປ້ອນຂໍ້ມູນພະນັກງານ</h4>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-3">ລະຫັດພະນັກງານ:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="empno" class="form-control" placeholder="ປ້ອນລະຫັດພະນັກງານ" value="<?= $empno ?>" required>
                                    <?= $error_id ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">ຊື່ພະນັກງານ:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" placeholder="ປ້ອນຊື່ພະນັກງານ" value="<?= $name ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">ເພດ:</label>
                                <div class="col-sm-9">
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="M" <?= ($gender != 'F')?'checked':'' ?>>
                                        ຊາຍ
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="F" <?= ($gender == 'F')?'checked':'' ?>>
                                        ຍິງ
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">ພະແນກ:</label>
                                <div class="col-sm-9">
                                    <select name="department" class="form-control" required>
                                        <option value="NULL">ເລືອກພະແນກ</option>

                                        <?php while ($row = mysqli_fetch_assoc($resultDept)) { ?>
                                            <option value="<?= $row['dno'] ?>" <?= ($deptno == $row['dno'])?'selected':'' ?> ><?= $row['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">ຂັ້ນເງິນເດືອນ:</label>
                                <div class="col-sm-9">
                                    <select name="salary" class="form-control" required>
                                        <option value="1">ເລືອກຂັ້ນເງິນເດືອນ</option>

                                        <?php while ($row = mysqli_fetch_assoc($resultSalary)) { ?>
                                            <option value="<?= $row['grade'] ?>" <?= ($salary == $row['grade'])? 'selected':'' ?> ><?= $row['grade'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">ເງິນອຸດໜຸນ:</label>
                                <div class="col-sm-9">
                                    <input type="number" name="incentive" class="form-control" placeholder="ປ້ອນເງິນອຸດໜຸນ" value="<?= $incentive ?>">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="btn-style col-sm-3 col-sm-offset-2">
                                    <button type="submit" name="add" class="btn btn-primary form-control"><span class="glyphicon glyphicon-plus"></span> ເພີ່ມຂໍ້ມູນ</button>
                                </div>
                                <div class="btn-style col-sm-3">
                                    <button type="reset" class="btn btn-warning" name="cancel" style="width: 100%"><span class="glyphicon glyphicon-remove"></span> ຍົກເລີກ</button>
                                </div>
                                <div class="btn-style col-sm-3">
                                    <button onclick="window.location.reload(true)" class="btn btn-default" style="width: 100%"><span class="glyphicon glyphicon-refresh"></span>ໂຫລດໃໝ່</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>