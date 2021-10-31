<?php

    $dsn="mysql:host=localhost;dbname=employees;charset=utf8mb4";

    $options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,];

    try{
        $pdo=new PDO($dsn,"root","password",$options);
    }
    catch(\PDOException$e){
        echo $e->getMessage();    //In production, there should be a redirection}//to an error page
    }

    $departmentsQuery = "SELECT dept_name as Name, CONCAT(last_name, ', ', first_name) AS Manager
    FROM employees.employees AS e
    INNER JOIN employees.dept_manager AS dm
    ON e.emp_no = dm.emp_no
    INNER JOIN employees.departments AS d
    ON dm.dept_no = d.dept_no
    WHERE dm.to_date = '9999-01-01';";

    $stmt=$pdo->query($departmentsQuery);
    $departmentsInfo = $stmt->fetchAll();
?>
