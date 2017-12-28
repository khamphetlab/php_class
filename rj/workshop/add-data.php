<?php include 'session.php'; ?>
<?php
include 'connect-db.php';

if (isset($_POST['add'])) {
    $empno = $_POST['empno'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dept = $_POST['dept'];
    $sal = $_POST['salary'];
    $incentive = $_POST['incentive'];

    //ກວດລະຫັດທີ່ປ້ອນວ່າມີແລ້ວຫຼືບໍ
    $sql = "SELECT empno FROM emp WHERE empno='$empno' ";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) { //ນັບຈໍານວນແຖວທີ່ດຶງຂຶ້ນມາ
        $error_id = 1;
    }

    //ກໍານົດຄ່າໃຫ້ເປັນຄ່າຫວ່າງຖ້າບໍ່ຖືກເລືອກ
    if (empty($_POST['dept']))
        $dept = "NULL";
    if (empty($_POST['salary']))
        $sal = "NULL";
    if (empty($_POST['incentive']))
        $incentive = "NULL";

    //ເພີ້ມຂໍ້ມູນລົງໃນຖານຂໍ້ມູນ ຖ້າວ່າລະຫັດຖືກຕ້ອງ
    if ($error_id != 1) {
        $sql = "INSERT INTO emp VALUES('$empno', '$name', '$gender', $dept, $sal, $incentive)";
        $result = mysqli_query($link, $sql);
        if ($result) {
            echo "<script type='text/javascript'>alert('ເພີ້ມຂໍ້ມູນສໍາເລັດ!')</script>";
            //ຫຼັງຈາກບັນທຶກຂໍ້ມູນແລ້ວລືບຂໍ້ມູນໃນຟອມກໍານົດຄ່າໃຫ້ບໍ່ມີຄ່າ
            $empno = $name = $gender = $dept = $sal = $incentive = "";
        }
    }
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>ເພີ້ມຂໍ້ມູນ</title>
        <?php include 'include/header.php'; ?>
    </head>
    <body>
        <?php include 'include/menu.php'; ?>
        <div class="container" style="padding-top: 50px">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="font-family: Phetsarath OT;"><h4><b>ເພີ້ມຂໍ້ມູນພະນັກງານ</b></h4></div>
                        <div class="panel-body" style="background-color: gainsboro">
                            <form class="form-horizontal" action="" method="POST">
                                <div class="form-group">
                                    <label class="control-label col-md-3">ລະຫັດພະນັກງານ:</label>
                                    <div class="col-md-7">
                                        <input class="form-control" type="text" name="empno" value="<?= $empno ?>" required="">
                                        <div class="alert alert-danger" <?php if ($error_id != 1) echo "style='display: none' "; ?>>
                                            <strong>ເຕືອນ! </strong> ລະຫັດຖືກນໍາໃຊ້ແລ້ວ
                                        </div>
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
                                        <input type="submit" name="add" value="ເພີ້ມຂໍ້ມູນ" class="btn btn-primary" style="width: 80px; border-radius: 20px">
                                        &nbsp;&nbsp;
                                        <input type="reset" name="cancel" value="ຍົກເລີກ" class="btn btn-warning" style="width: 80px; border-radius: 20px">
                                        &nbsp;&nbsp;
                                        <button onclick="window.location.reload(true);" class="btn btn-success" style="width: 80px; border-radius: 20px">Refresh</button>

                                    </div>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <!--ໃສ່ footer-->
        <div style="margin-top: 50px;">
            <?php include 'include/footer.php'; ?>      
        </div>
    </body>
</html>
