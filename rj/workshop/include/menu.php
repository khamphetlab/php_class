<!--ສ້າງເມນູຫຼັກ-->
<nav id="nav" class="navbar navbar-inverse" style="font-size: 14px; font-weight: bold;">
    <div class="navbar-header">
        <!--ສ້າງໃຫ້ເປັນປຸ່ມໃນເວລາເບິ່ງໃນອຸປະກອນຂະໜາດນ້ອຍ-->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        
    </div>
    <!--ສ້າງລາຍການຂອງເມນູ-->
    <div class="collapse navbar-collapse" id="myNavbar" style="margin-top: 10px;">
        <ul class="nav navbar-nav">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> ໜ້າຫຼັກ</a></li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">ສະແດງຂໍ້ມູນ&nbsp;<span class="glyphicon glyphicon-triangle-bottom"></span></a>
                <ul id="products-menu" class="dropdown-menu">
                    <li><a href="list-record.php">ສະແດງຂໍ້ມູນທັງໝົດ</a></li>
                    <li><a href="list-record-paging.php">ສະແດງຂໍ້ມູນທັງໝົດ ແບ່ງໜ້າ</a></li>
                </ul>
            </li>
            <li><a href="search-record.php">ຄົ້ນຫາຂໍ້ມູນ</a></li>
            <li><a href="add-data.php">ເພີ້ມຂໍ້ມູນ</a></li>
            <li><a href="delete-record.php">ລືບຂໍ້ມູນ</a></li>
            <li><a href="add-edit-delete-record.php">ຈັດການຂໍ້ມູນໃນໜ້າດຽວ</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            if(empty( $_SESSION['login_user'])) {
                echo " <li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> ເຂົ້າໃຊ້ລະບົບ</a></li>";
            } else {
                echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> ອອກຈາກລະບົບ</a></li>";
            }
            ?>
           
            
        </ul>
    </div>
</nav>
<!--ສິນສຸດເມນູຫຼັກ-->
