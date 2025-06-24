<?php
include_once '../config/connect.sample.php';

$position = $_POST['position'];
$i = 1;
foreach ($position as $key => $value) {
    $sql = 'UPDATE `menus` SET `menusOrder` = ? WHERE `menusId` = ?';
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        echo '<script>window.location="' . base_url('menu.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ss', $i, $value);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $i++;
}
