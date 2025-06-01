<?php

//Register user
if (isset($_POST['register']))
{
    $name     = htmlspecialchars(trim(strtoupper($_POST['name'])));
    $email    = htmlspecialchars(trim($_POST['email']));
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirm  = htmlspecialchars(trim($_POST['confirm']));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo '<script>window.location="' . base_url('register.php?error=invalidemail') . '";</script>';
        exit();
    }

    if (!preg_match('/^[a-zA-Z0-9]*$/', $username))
    {
        echo '<script>window.location="' . base_url('register.php?error=invaliduid') . '";</script>';
        exit();
    }

    $dataselect = 'SELECT `usersEmail`, `usersUid`, `usersPwd` FROM `users` WHERE `usersEmail` = ? OR `usersUid` = ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect))
    {
        echo '<script>window.location="' . base_url('register.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 'ss', $email, $username);
    mysqli_stmt_execute($stmtselect);

    $resultData = mysqli_stmt_get_result($stmtselect);

    if ($row = mysqli_fetch_assoc($resultData))
    {
        echo '<script>window.location="' . base_url('register.php?error=registed') . '";</script>';
        exit();
    }

    $datainsert = 'INSERT INTO `users` (`usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES (?, ?, ?, ?)';
    $stmtinsert = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtinsert, $datainsert))
    {
        echo '<script>window.location="' . base_url('register.php?error=stmtfailed') . '";</script>';
        exit();
    }

    $pwdHashed = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmtinsert, 'ssss', $name, $email, $username, $pwdHashed);
    mysqli_stmt_execute($stmtinsert);
    mysqli_stmt_close($stmtinsert);

    echo
    '<script>
            alert("Pembuatan Akun Berhasil")
            document.location="' . base_url('login.php') . '";
        </script>';
    exit();
}

//Login user
if (isset($_POST['login']))
{
    $uid      = htmlspecialchars(trim($_POST['uid']));
    $password = htmlspecialchars(trim($_POST['password']));

    $dataselect = 'SELECT `usersName`, `usersEmail`, `usersUid`, `usersPwd`, `usersLevel`, `usersImage` FROM `users` WHERE `usersEmail` = ? OR `usersUid` = ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect))
    {
        echo '<script>window.location="' . base_url('login.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 'ss', $uid, $uid);
    mysqli_stmt_execute($stmtselect);

    $resultData = mysqli_stmt_get_result($stmtselect);
    $data = mysqli_fetch_assoc($resultData);

    if ($data == false)
    {
        echo '<script>window.location="' . base_url('login.php?error=uidwrong') . '";</script>';
        exit();
    }

    $pwdHashed = $data['usersPwd'];
    $checkPwd  = password_verify($password, $pwdHashed);

    if ($checkPwd == false)
    {
        echo '<script>window.location="' . base_url('login.php?error=pwdwrong') . '";</script>';
        exit();
    }

    $_SESSION['useruid']   = $data['usersUid'];
    $_SESSION['useremail'] = $data['usersEmail'];
    $_SESSION['userlevel'] = $data['usersLevel'];
    $_SESSION['username']  = $data['usersName'];
    $_SESSION['userimage'] = $data['usersImage'];

    echo
    '<script>
        alert("Selamat Login Berhasil")
        document.location="' . base_url('../dashboard') . '";
    </script>';
    exit();    
}
