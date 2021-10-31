<?php

$dsn = "mysql:host=localhost;dbname=employees;charset=utf8mb4";

$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,];

try {
    $pdo = new PDO($dsn, "root", "password", $options);
} catch (\PDOException $e) {
    echo $e->getMessage();    //In production, there should be a redirection}//to an error page
}

if (array_key_exists('btnSearch', $_POST)) {
    $whereQuery = $_POST['searchQuery'];
    $newQuery = "SELECT last_name, first_name, dept_name, gender, birth_date, hire_date, SUM(salary) 
    FROM employees AS e
    INNER JOIN employees.dept_manager AS dm
    ON e.emp_no = dm.emp_no
    INNER JOIN employees.departments AS d
    ON dm.dept_no = d.dept_no
    INNER JOIN salaries AS s
    ON e.emp_no = s.emp_no
    WHERE first_name = '$whereQuery'
    OR last_name = '$whereQuery';";

    $stmt2 = $pdo->query($newQuery);
    $employeeInfo = $stmt2->fetchAll();
} else {
    $employeesQuery = "SELECT last_name, first_name, dept_name, gender, birth_date, hire_date, salary
    FROM employees AS e
    INNER JOIN employees.dept_manager AS dm
    ON e.emp_no = dm.emp_no
    INNER JOIN employees.departments AS d
    ON dm.dept_no = d.dept_no
    INNER JOIN salaries AS s
    ON e.emp_no = s.emp_no;";

    $stmt = $pdo->query($employeesQuery);
    $employeeInfo = $stmt->fetchAll();
}
