<?php include 'session.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ໜ້າຫຼັກ</title>
        <?php include 'include/header.php'; ?>
    </head>
    <body>
        <!--ເມນູ-->
        <?php include 'include/menu.php'; ?>
        <!--ສິ້ນສຸດເມນູ-->
        <div class="container-fluid">
            <div class="row" style="padding-top: 30px;">
                <!--ສ້າງເມນູດ້ານຂ້າງ-->
                <div class="col-sm-2">
                    <?php include 'include/side-menu.php'; ?>
                </div>
                <!--ສິ້ນສຸດເມນູດ້ານຂ້າງ-->

                <!--ເນື້ອຫາ-->
                <div class="col-sm-10">
                    <div class="well">Welcome to my home page</div>
                    <form>
                    </form>
                </div>
                <!--ສີ້ນສຸດເນື້ອຫາ-->
                <!--ໃສ່ footer-->
                <div class="col-sm-12" style="margin-top: 50px;">
                    <?php include 'include/footer.php'; ?>      
                </div>
            </div>
        </div>
    </body>
</html>
