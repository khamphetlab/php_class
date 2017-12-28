<?php
ob_start();
include 'session.php';
include 'connect-db.php';

//ຮັບຂໍ້ມູນທີ່ສົ່ງມາກັບ URL ໂດຍໃຊ້ $_GET[ ]
$emp_id = $_GET['empno'];
$sql = "SELECT *FROM emp WHERE empno='$emp_id' ";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
$empno = $row[0];
$name = $row[1];
$gender = $row[2];
$dept = $row[3];
$sal = $row[4];
$incentive = $row[5];

if (isset($_POST['edit'])) {
    $empno = $_POST['empno'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dept = $_POST['dept'];
    $sal = $_POST['salary'];
    $incentive = $_POST['incentive'];

    //ກໍານົດຄ່າໃຫ້ເປັນຄ່າຫວ່າງຖ້າບໍ່ຖືກເລືອກ
    if (empty($_POST['dept']))
        $dept = "NULL";
    if (empty($_POST['salary']))
        $sal = "NULL";
    if (empty($_POST['incentive']))
        $incentive = "NULL";

    //ດັດປກ້ຂໍ້ມູນ
    $sql = "UPDATE emp SET name='$name', gender='$gender', deptno=$dept, grade=$sal, incentive=$incentive WHERE empno='$empno' ";
    $result = mysqli_query($link, $sql) or die(mysqli_error($conn));
    if ($result) {
        header('Location: list-record.php'); //ໃຫ້ລິງໄປໜ້າ list_data.php ການໃຊ້ຄໍາສັ່ງ header ຕ້ອງເພີ້ມ ob_start() ໄວ້ແຖວເທິງສຸດ
    }
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>ດັດແກ້ຂໍ້ມູນ</title>
        <?php include 'include/header.php'; ?>
    </head>
    <body>
        <!--ເມນູ-->
        <?php include 'include/menu.php'; ?>
        <!--ສິ້ນສຸດເມນູ-->
        <div class="container" style="padding-top: 30px">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="font-family: Phetsarath OT;"><h4><b>ປັບປຸງຂໍ້ມູນພະນັກງານ</b></h4></div>
                        <div class="panel-body" style="background-color: gainsboro">
                            <form class="form-horizontal" action="" method="POST">
                                <div class="form-group">
                                    <label class="control-label col-md-3">ລະຫັດພະນັກງານ:</label>
                                    <div class="col-md-7">
                                        <input class="form-control" type="text" name="empno" value="<?= $empno ?>" readonly="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">ຊື່ພະນັກງານ:</label>
                                    <div class="col-md-7">
                                        <input class="form-control" type="text" name="name" value="<?= $name ?>" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">ເພດ:</label>
                                    <div class="col-md-7">
                                        <label class="radio-inline"><input type="radio" name="gender" value="M" <?php if ($gender != 'F') echo "checked"; ?>>ຊາຍ</label>
                                        <label class="radio-inline"><input type="radio" name="gender" value="F" <?php if ($gender == 'F') echo "checked"; ?>>ຍິງ</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">ພະແນກ:</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="dept" >
                                            <option value="">-----------------ເລືອກພະແນກ-------------------</option>
                                            <?php
                                            $sql = "SELECT dno, name FROM dept ORDER BY name ASC";
                                            $result = mysqli_query($link, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $dno = $row['dno'];
                                                $name = $row['name'];
                                                ?>
                                                <option value="<?= $dno ?>" <?php if ($dept == $dno) echo 'selected'; ?>><?= $name ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">ຂັ້້ນເງິນເດືອນ:</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="salary">
                                            <option value="">-----------------ເລືອກຂັ້ນເງິນເດືອນ-------------------</option>
                                            <?php
                                            $sql = "SELECT grade FROM salary ORDER BY grade ASC";
                                            $result = mysqli_query($link, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $grade = $row['grade'];
                                                ?>
                                                <option value="<?= $grade ?>" <?php if ($sal == $grade) echo 'selected'; ?>><?= $grade ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">ເງິນອຸດໜູນ:</label>
                                    <div class="col-md-7">
                                        <input class="form-control" type="number" name="incentive" value="<?= $incentive ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-7">
                                        <input type="submit" name="edit" value="ປັງປຸງ" class="btn btn-primary" style="width: 100px; border-radius: 20px">
                                        <a href="list-record.php" class="btn btn-warning" style="width: 100px; border-radius: 20px">ຍົກເລີກ</a>
                                    </div>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <div style="margin-top: 50px;">
            <?php include 'include/footer.php'; ?>      
        </div>
    </body>
</html>
