<?php
    include('connect-db.php');

    $departmentQuery = "SELECT dno, name FROM dept ORDER BY name ASC;";
    $resultDept = mysqli_query($link, $departmentQuery);

    $salaryQuery = "SELECT grade FROM salary ORDER BY grade ASC;";
    $resultSalary = mysqli_query($link, $salaryQuery);

    $empno = $name = $gender = $deptno = $salary = $incentive = '';
    
    if (isset($_POST['edit'])) {
        $empno = $_POST['empno'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $deptno = $_POST['department'];
        $salary = $_POST['salary'];
        $incentive = $_POST['incentive'];

        if (empty($incentive)) {
            $incentive = "NULL";
        }

        // edit send to db
        $updateQuery = "UPDATE emp
            SET name='$name', gender='$gender', deptno=$deptno, grade=$salary, incentive=$incentive
            WHERE empno='$empno'";

        $updateResult = mysqli_query($link, $updateQuery);
        if ($updateResult) {
            header('Location: list-record-paging.php');
        } else {
            mysqli_error($link);
        }
        
    }

    if (isset($_GET['empno'])) {
        $empno = $_GET['empno'];
        $editEmpnoQuery = "SELECT * FROM emp WHERE empno='$empno'";

        $resultEdit = mysqli_query($link, $editEmpnoQuery);
        while ($row = mysqli_fetch_assoc($resultEdit)) {
            $empno = $row['empno'];
            $name = $row['name'];
            $gender = $row['gender'];
            $deptno = $row['deptno'];
            $salary = $row['grade'];
            $incentive = $row['incentive'];
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"> 
    <script src="bootstrap/js/jquery-1.12.4.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h4 class="panel-header-text">ແກ້ໄຂຂໍ້ມູນພະນັກງານ</h4>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-3">ລະຫັດພະນັກງານ:</label>
                                <div class="col-sm-9">
                                    <input readonly="" type="text" name="empno" class="form-control" placeholder="ປ້ອນລະຫັດພະນັກງານ" value="<?= $empno ?>" required>
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
                            <d class="form-group">
                                <div class="col-sm-3 col-sm-offset-3">
                                    <button onclick="confirm('ແກ້ໄຂຂໍ້ມູນ?')" type="submit" name="edit" class="btn btn-success form-control"><span class="glyphicon glyphicon-floppy-saved"></span> ແກ້ໄຂຂໍ້ມູນ</button>
                                </div>
                                <div class="col-sm-3">
                                    <a class="btn btn-default" style="width: 100%" href="list-record-paging.php" ><span class="glyphicon glyphicon-remove"></span> ຍົກເລີກ
                                    </a>
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