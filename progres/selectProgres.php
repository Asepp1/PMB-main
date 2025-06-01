<?php

$userName    = $_SESSION['username'];
$userEmail   = $_SESSION['useremail'];

$dataemail = 'SELECT `formEmail` FROM `mahasiswas` WHERE `formEmail` = ?';
$stmtemail = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtemail, $dataemail)) {
    echo '<script>window.location="' . base_url('file.php?error=stmtMemail') . '";</script>';
    exit();
}

mysqli_stmt_bind_param($stmtemail, 's', $userEmail);
mysqli_stmt_execute($stmtemail);
$resultEmail = mysqli_stmt_get_result($stmtemail);
$email = mysqli_fetch_assoc($resultEmail);


$dataktp = 'SELECT `formKtp` FROM `mahasiswas` WHERE `formEmail` = ?';
$stmtktp = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtktp, $dataktp)) {
    echo '<script>window.location="' . base_url('file.php?error=stmtFemail') . '";</script>';
    exit();
}

mysqli_stmt_bind_param($stmtktp, 's', $userEmail);
mysqli_stmt_execute($stmtktp);
$resultKtp = mysqli_stmt_get_result($stmtktp);
$ktp    = mysqli_fetch_assoc($resultKtp);


$databukti = 'SELECT `formBukti` FROM `mahasiswas` WHERE `formEmail` = ?';
$stmtbukti = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtbukti, $databukti)) {
    echo '<script>window.location="' . base_url('file.php?error=stmtFemail') . '";</script>';
    exit();
}

mysqli_stmt_bind_param($stmtbukti, 's', $userEmail);
mysqli_stmt_execute($stmtbukti);
$resultBukti= mysqli_stmt_get_result($stmtbukti);
$bukti    = mysqli_fetch_assoc($resultBukti);


$datastatus = 'SELECT `formStatus` FROM `mahasiswas` WHERE `formEmail` = ?';
$stmtstatus = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtstatus, $datastatus)) {
    echo '<script>window.location="' . base_url('file.php?error=stmtFemail') . '";</script>';
    exit();
}

mysqli_stmt_bind_param($stmtstatus, 's', $userEmail);
mysqli_stmt_execute($stmtstatus);
$resultStatus = mysqli_stmt_get_result($stmtstatus);
$status       = mysqli_fetch_assoc($resultStatus);