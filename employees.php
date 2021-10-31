<?php
include_once("header.php");
include_once("employeeDb.php");
?>
<h1>Employees</h1>
<?php if (count($employeeInfo) > 0) : ?>
    <form action="" method="POST">
        <input type="text" name="searchQuery" placeholder="Name">
        <input type="submit" value="Search" name="btnSearch">
    </form>
    <table>
        <thead>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Department</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Date Hired</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employeeInfo as $row) : array_map('htmlentities', $row); ?>
                <tr>
                    <td><?php echo implode('</td><td>', $row); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php
include_once("footer.php")
?>