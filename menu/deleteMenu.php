<?php
require_once '../config/connect.sample.php';
require_once '../config/function.php';

$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
if (empty($id))
{
    return false;
}

$datadelete = 'DELETE FROM `menus` WHERE `menusId` = ?';
$stmtdelete = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtdelete, $datadelete)) {
    echo '<script>window.location="' . base_url('user/addUser.php?error=stmtfailed') . '";</script>';
    exit();
}

mysqli_stmt_bind_param($stmtdelete, 's', $id);
mysqli_stmt_execute($stmtdelete);
mysqli_stmt_close($stmtdelete);

echo
'<script>
    alert("Menu Berhasil di Hapus")
    document.location="' . base_url('menu.php') . '";
</script>';
exit();
