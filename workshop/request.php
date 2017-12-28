<?php

    include 'connect-db.php';

    if (isset($_GET['empno'])) {
        $empno = $_GET['empno'];
        $sql = "SELECT * FROM emp WHERE empno='$empno'";
        
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data = $row;
        }

        echo json_encode($data);
    }

    if (isset($_GET['empno_delete'])) {
        $empno = $_GET['empno_delete'];
        $sql = "DELETE FROM emp WHERE empno='$empno'";
        
        $result = mysqli_query($link, $sql);

        if ($result) {
            echo "delete_success";
        } else {
            echo "delete_error";
        }    

    }

    if (isset($_GET['empno_update'])) {
        $empno = $_GET['empno_update'];
        $sql = "SELECT e.empno, e.name, e.gender, d.name AS department, 
        s.sal AS salary, e.incentive, (s.sal+IFNULL(e.incentive, 0)) AS total
        FROM emp e LEFT JOIN dept d ON e.deptno = d.dno
        JOIN salary s ON e.grade = s.grade
        WHERE e.empno='$empno'";
        
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data = $row;
        }

        echo json_encode($data);
    }

    if (isset($_POST['empno_edit'])) {
        $empno = $_POST['empno_edit'];
        $name = $_POST['name_edit'];
        $gender = $_POST['gender_edit'];
        $deptno = $_POST['department_edit'];
        $salary = $_POST['salary_edit'];
        $incentive = $_POST['incentive_edit'];

        if (empty($incentive)) {
            $incentive = "NULL";
        }

        // add to db
        $editQuery = "UPDATE emp 
            SET empno='$empno', name='$name', gender='$gender', deptno=$deptno, grade=$salary, incentive=$incentive
            WHERE empno='$empno'";
        $editResult = mysqli_query($link, $editQuery);
        if ($editResult) {
            $empno = $name = $gender = $deptno = $salary = $incentive = '';

            echo 'success';
        } else {
            echo 'error';
        }        
    }

    if (isset($_POST['empno_add'])) {
        $empno = $_POST['empno_add'];
        $name = $_POST['name_add'];
        $gender = $_POST['gender_add'];
        $deptno = $_POST['department_add'];
        $salary = $_POST['salary_add'];
        $incentive = $_POST['incentive_add'];

        if (empty($incentive)) {
            $incentive = "NULL";
        }

        // check validation of existing emp id
        $validateSQL = "SELECT empno FROM emp WHERE empno='$empno'";
        $validateResult = mysqli_query($link, $validateSQL);
        if (mysqli_num_rows($validateResult) > 0) {
            echo 'duplicate_id';
        } else {
            // add to db
            $postQuery = "INSERT INTO emp VALUES ('$empno', '$name', '$gender', $deptno, $salary, $incentive)";
            $postResult = mysqli_query($link, $postQuery);
            if ($postResult) {
                echo 'success';
            } else {
                echo 'error';
            }
        }

                
    }

?>