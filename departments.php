<?php
include_once("header.php");
include_once("departmentsDb.php");
?>
<h1>Departments</h1>


<?php if (count($departmentsInfo) > 0) : ?>
    <table>
        <thead>
            <tr>
                <th><?php echo implode('</th><th>', array_keys(current($departmentsInfo))); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($departmentsInfo as $row) : array_map('htmlentities', $row); ?>
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