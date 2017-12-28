<?php

    include_once("connect-db.php");
    // initial value
    $fname = $lname = $gender = $address = $tel = $email = $username = $password = $confirm_password = $file = $file_name = "";
    $error_user = $error_password = "";

    // handle value from FORM POST
    if (isset($_POST["register"])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // echo $fname."<br>".$lname."<br>".$gender."<br>".$address."<br>".$tel."<br>".$email."<br>".$username."<br>".$password."<br>".$confirm_password."<br>".$file_name."<br>".$file_tmp."<br>";

        // validate username exist?
        $sqlUsername = "SELECT username FROM user WHERE username='$username'";
        $resultUser = mysqli_query($link, $sqlUsername);
        if (mysqli_num_rows($resultUser) > 0) {
            $error_user = '<br><div class="alert alert-warning"><b>ເຕືອນ: </b> ຊື່ເຂົ້າລະບົບນີ້ ຖືກນຳໃຊ້ແລ້ວ</div>';
        } else {

            // check pass and confirm_pass
            if ($password !== $confirm_password) {
                $error_password = '<br><div class="alert alert-danger"><b>ເຕືອນ: </b> ລະຫັດຜ່ານບໍ່ກົງກັນ ກະລຸນາໃສ່ໃໝ່</div>';
            } else {

                if (isset($_FILES['image']['name'])) {
                    // file name
                    $rand_time = time();
                    $img_name = $_FILES['image']['name'];
                    $file_name = $rand_time.$img_name;
                    $file_tmp = $_FILES['image']['tmp_name'];
                    // move file to images/ dir
                    move_uploaded_file($file_tmp, 'images/'.$file_name);
                } else {
                    $file_name = NULL;
                }

                $tmp_pwd = md5($password);
                $addUserQuery = "INSERT INTO user (firstname, lastname, gender, address, tel, email, image, username, pwd) VALUES ('$fname', '$lname', '$gender', '$address', '$tel', '$email', '$file_name', '$username', '$tmp_pwd')";
                $result = mysqli_query($link, $addUserQuery);
                if ($result) {
                    header("Location: login.php");
                }

            }
            

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <?php include_once('css-js.php') ?>
    <script src="script-register.js"></script>
    <style>        
        .container-fluid {
            padding-top: 50px;
        }
        .panel-header-text {
            font-weight: bold;
        }
        .file {
            visibility: hidden;
            position: absolute;
        }
        .pf_img {
            padding-top: 10px;
            height: 100px;
        }
        .btn-style {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-header-text">ສະໝັກສະມາຊິກ</h4>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label class="control-label col-sm-3">ຊື່:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="fname" class="form-control" placeholder="ປ້ອນຊື່" required value="<?= $fname ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">ນາມສະກຸນ:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="lname" class="form-control" placeholder="ປ້ອນນາມສະກຸນ" required value="<?= $lname ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">ເພດ:</label>
                                <div class="col-sm-8">
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="M" required <?= ($gender != 'F')?'checked':'' ?> >
                                        ຊາຍ
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="F" required <?= ($gender == 'F')?'checked':'' ?> >
                                        ຍິງ
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">ເບີໂທ:</label>
                                <div class="col-sm-8">
                                    <input type="number" name="tel" class="form-control" placeholder="020 12345678" required value="<?= $tel ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">ອີເມວ:</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control" placeholder="example@mail.com" required value="<?= $email ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">ທີ່ຢູ່:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="address" class="form-control" placeholder="ປ້ອນທີ່ຢູ່" required value="<?= $address ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">ຮູບ:</label>
                                <div class="col-sm-8">
                                    <input type="file" accept="image/*" name="image" id="img_upload" class="file">
                                    <div class="input-group">
                                        <input type="text" disabled placeholder="ກະລຸນາເລືອກຮູບ" class="form-control" name="img_name_show">
                                        <span class="input-group-btn">
                                            <button class="browse btn btn-primary" type="button">
                                                <i class="glyphicon glyphicon-search"></i> ເລືອກຮູບ</button>
                                        </span>
                                    </div>
                                    <img src="" class="pf_img" hidden>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">ຊື່ເຂົ້າໃຊ້ລະບົບ:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="username" class="form-control" placeholder="ປ້ອນຊື່ເຂົ້າໃຊ້ລະບົບ" required value="<?= $username ?>">
                                    <?= $error_user ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">ລະຫັດຜ່ານ:</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control" placeholder="ລະຫັດຜ່ານ" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">ຢືນຢັນລະຫັດຜ່ານ:</label>
                                <div class="col-sm-8">
                                    <input type="password" name="confirm_password" class="form-control" placeholder="ຢືນຢັນລະຫັດຜ່ານ" required>
                                    <?= $error_password ?>
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <div class="btn-style col-sm-3 col-sm-offset-2">
                                    <button type="submit" name="register" class="btn btn-success form-control"><span class="glyphicon glyphicon-check"></span> ສະໝັກ</button>
                                </div>
                                <div class="btn-style col-sm-3">
                                    <button type="reset" class="btn btn-warning" name="cancel" style="width: 100%"><span class="glyphicon glyphicon-remove"></span> ຍົກເລີກ</button>
                                </div>
                                <div class="btn-style col-sm-3">
                                    <button onclick="window.location.reload(true)" class="btn btn-default" style="width: 100%"><span class="glyphicon glyphicon-refresh"></span>  ໂຫລດໃໝ່</button>
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