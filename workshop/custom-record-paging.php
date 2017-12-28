<?php
    // for database connection
    include 'connect-db.php';

    // get total rows 
    $sqlGetRowNum = "SELECT COUNT(empno) AS total_rows FROM emp;";
    $rowNumResult = mysqli_query($link, $sqlGetRowNum);
    while ($row = mysqli_fetch_assoc($rowNumResult)) {
        $total_emp = $row['total_rows'];
        $total_rows = $row['total_rows'];
    }

    $perpage = 5; //default per page is 5
    if (isset($_GET['perpage'])) {
        $perpage = $_GET['perpage'];
        $total_pages = ceil($total_rows / $perpage);
    }

    // paging change
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        // page default is 1. so should detect value more than 1
        // other value ( 1 or less than 1 must set to default = 0 )
        if ($page > 1) {
            $offsetValue = ($page-1) * $perpage;
            $number= $offsetValue;
        } else {
            $offsetValue = 0;
            $number = 0;
        }
    } else {
        $page = 1;
        $offsetValue = 0;
        $number=0;
    }

    // query only for that current page
    // according to $perpage and $offsetValue
    $sql = "SELECT e.empno, e.name, e.gender, d.name AS department, s.sal AS salary, e.incentive, (s.sal+IFNULL(e.incentive, 0)) AS total
    FROM emp e LEFT JOIN dept d ON e.deptno = d.dno
    JOIN salary s ON e.grade = s.grade
    ORDER BY department ASC, total DESC
    LIMIT $perpage OFFSET $offsetValue;";

    $result = mysqli_query($link, $sql);

    // search function
    $searchValue = '';
    if (isset($_GET['search']) && $_GET['search'] !== '') {
        $searchValue = $_GET['search'];

        $searchQuery = "SELECT e.empno, e.name, e.gender, d.name AS department, s.sal AS salary, e.incentive, (s.sal+IFNULL(e.incentive, 0)) AS total
    FROM emp e LEFT JOIN dept d ON e.deptno = d.dno
    JOIN salary s ON e.grade = s.grade
    WHERE 
        e.empno LIKE '%$searchValue%' OR
        e.name LIKE '%$searchValue%' OR
        d.name LIKE '%$searchValue%'
    ORDER BY department ASC, total DESC
    LIMIT $perpage OFFSET $offsetValue;";

        $result = mysqli_query($link, $searchQuery);
        $total_rows = mysqli_num_rows($result);
        $total_pages = ceil($total_rows / $perpage);
    }

    // sorting function
    if (isset($_GET['sort']) && isset($_GET['sorttype'])) {
        $sort = $_GET['sort'];
        $sorttype = $_GET['sorttype'];
        if ($sort == 'id') {
            
        } else if ($sort == 'id') {
            
        } else if ($sort == 'id') {
            
        } else if ($sort == 'id') {
            
        } else if ($sort == 'id') {
            
        } else if ($sort == 'id') {
            
        } else if ($sort == 'id') {
            
        }

    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Custom Paging</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"> 
    <script src="bootstrap/js/jquery-1.12.4.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <style>
        th {
            background-color: #117bf3;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-bottom: 50px;">
        <div class="well well-sm" style="text-align: center; background-color: bisque; font-size:20px; margin-top: 20px">
            ຂໍ້ມູນພະນັກງານທັງໝົດ
        </div>
        <div class="row">
            <h3 style="float: right; padding-right: 15px">
                ພະນັກງານທັງໝົດມີ <span style="color: red;"><?= $total_emp ?></span> ຄົນ
            </h3>
        </div> <br>
        <div class="row">
            <div class="dropdown" style="float: right; margin-top: 20px; padding-right: 15px">
                <button class="btn btn-default dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <?= $perpage ?> ແຖວຕໍ່ໜ້າ
                <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li class="<?= ($perpage==5)?'active':'' ?>" ><a href="custom-record-paging.php?perpage=5">5 ແຖວ ຕໍ່ໜ້າ</a></li>
                    <li class="<?= ($perpage==10)?'active':'' ?>" ><a href="custom-record-paging.php?perpage=10">10 ແຖວ ຕໍ່ໜ້າ</a></li>
                    <li class="<?= ($perpage==15)?'active':'' ?>" ><a href="custom-record-paging.php?perpage=15">15 ແຖວ ຕໍ່ໜ້າ</a></li>
                </ul>
            </div>

            <div style="float: left; margin-top: 20px;">
            <form method="get">
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="text" class="form-control" name="search" placeholder="Search" value="<?= $searchValue ?>">
                    </div>
                </div>
                <input type="hidden" name="perpage" value="<?= $perpage ?>">
                <input type="hidden" name="page" value="1">
                <div class="col-sm-2">
                    <input type="submit" class="btn btn-default" value="Search">
                </div>
            </form>
        </div>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <th>
                    ລຳດັບ
                    <?php if () ?>
                </th>
                <th>
                    ລະຫັດ
                    <?php if () ?>
                </th>
                <th>
                    ຊື່
                    <?php if () ?>
                </th>
                <th>
                    ເພດ
                    <?php if () ?>
                </th>
                <th>
                    ພະແນກ
                    <?php if () ?>
                </th>
                <th>
                    ເງິນເດືອນ
                    <?php if () ?>
                </th>
                <th>
                    ເງິນອຸດໜຸນ
                    <?php if () ?>
                </th>
                <th>
                    ລາຍຮັບທັງໝົດ
                    <?php if () ?>
                </th>
            </thead>
            <tbody>
                <?php
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
                <?php } ?>
            </tbody>
        </table>
        <div class="row">
            <div style="width:100%; margin-top: 50px">
                <ul class="pagination" style=" display: table; margin: 0 auto;">
                    <?php if ($page > 1) { ?>
                        <li>
                            <a href="custom-record-paging.php?<?= ($searchValue !== '')? "search=$searchValue&":"" ?>perpage=<?= $perpage ?>&page=<?= ($page-1) ?>" aria-label="Previous" >
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li> 
                    <?php } else { ?>
                        <li class="disabled">
                            <a><span aria-hidden="true">&laquo;</span></a>
                        </li>
                    <?php } ?>

                    <?php
                        for ($i=1; $i<=$total_pages; $i++) { ?>
                            <li class="<?= ($i==$page)?'active':'' ?>" >
                                <a href="custom-record-paging.php?<?= ($searchValue !== '')? "search=$searchValue&":"" ?>perpage=<?= $perpage ?>&page=<?= $i ?>" aria-label="Previous">
                                    <?= $i; ?>
                                </a>
                            </li>
                    <?php } ?>

                    <?php if ($page!=$total_pages) { ?>
                        <li>
                            <a href="custom-record-paging.php?<?= ($searchValue !== '')? "search=$searchValue&":"" ?>perpage=<?= $perpage ?>&page=<?= ($page+1) ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="disabled">
                            <a><span aria-hidden="true">&raquo;</span></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>