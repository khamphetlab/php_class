<?php
session_start(); // Starting Session
ob_start();

if (isset($_POST['login'])) {

    // ກໍານົດຄ່າ username ແລະ password
    $username = $_POST['user'];
    $pass = $_POST['pwd'];

    // ຕິດຕໍ່ MySQL Server
    include 'connect-db.php';
    // ເລືອກ username ແລະ password ໃນຕາຕະລາງ user

    $sql = mysqli_query($link, "SELECT * FROM user WHERE username='$username' AND password='$pass' ");
    $rows = mysqli_num_rows($sql);
    if ($rows) {
        $_SESSION['login_user'] = $user; // ກໍານົດຄ່າເລີ້ມຕົ້ນໃຫ້ session
        header("location: index.php"); // ໄປໜ້າ index.php
    } else {
        $error = 1;
    }
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>ເຂົ້າໃຊ້ລະບົບ</title>
        <?php include 'include/header.php'; ?>
    </head>
    <body>
        <!--ເມນູ-->
        <?php include 'include/menu.php'; ?>
        <!--ສິ້ນສຸດເມນູ-->
        <!--ເນື້ອຫາ-->
        <div class="container-fluid">
            <div class="row" style="margin-top: 30px">
                <div class="col-sm-12">

                    <!--ໜ້າເຂົ້າໃຊ້ງານລະບົບ-->
                    <div class="mainbox col-md-6 col-md-offset-3">                    
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <div class="panel-title" style="text-align: center; font-weight: bold;">ເຂົ້າໃຊ້ລະບົບ</div>
                            </div>     

                            <div style="padding-top:30px" class="panel-body" >
                                <!--ແກ້ທີ່ display: none ຖ້າຕ້ອງການໃຫ້ສະແດງກໍລະນີ ລະຫັດບໍ່ຖືກຕ້ອງ -->
                                <div style="<?php if (!$error) echo 'display:none'; ?>" class="alert alert-danger col-sm-12">ລະຫັດຜູ້ໃຊ້ ຫຼື ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ</div>

                                <!--ຟອມເຂົ້າໃຊລະບົບ-->
                                <form action="" method="POST" class="form-horizontal" >

                                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" name="user" value="<?= $username ?>" placeholder="ຊື່ເຂົ້າໃຊ້ລະບົບ" required="">                                        
                                    </div>

                                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="password" class="form-control" name="pwd" value="" placeholder="ລະຫັດຜ່ານ" required="">
                                    </div>

                                    <div style="margin-top:10px" class="form-group">
                                        <!-- Button -->
                                        <div class="col-sm-12 controls">
                                            <button type="submit" name="login" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span> ເຂົ້າໃຊ້ລະບົບ</button>
                                        </div>
                                    </div>

                                </form>     
                            </div>                     
                        </div>  
                    </div>
                    <!--ສິນສຸດໜ້າເຂົ້າໃຊ້ລະບົບ-->
                </div>
            </div>
            <!--ສີ້ນສຸດເນື້ອຫາ-->

        </div>
        <!-- /.container -->
        <div style="margin-top: 50px;">
            <?php include 'include/footer.php'; ?>      
        </div>
    </body>
</html>
