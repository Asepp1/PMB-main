<?php

$userUid = $_SESSION['useruid'];

if (isset($_POST['editProfil']))
{
    /* $image = $_FILES['image']; */
    
    $imageName    = $_FILES['image']['name'];
    $imageType    = $_FILES['image']['type'];    
    $imageSize    = $_FILES['image']['size'];
    $imageError   = $_FILES['image']['error'];
    $imageTmpName = $_FILES['image']['tmp_name'];

    $imageExt     = explode('.', $imageName);
    $imageActExt  = strtolower(end($imageExt));

    $allowed      = array('jpg', 'jpeg', 'png');

    if (!$imageError == 0)
    {
        echo '<script>window.location="' . base_url('profile.php?error=error') . '";</script>';
        exit();
    }

    if (!in_array($imageActExt, $allowed))
    {
        echo '<script>window.location="' . base_url('profile.php?error=upload') . '";</script>';
        exit();
    }    

    if ($imageSize > 1500000)
    {
        echo '<script>window.location="' . base_url('profile.php?error=bigfile') . '";</script>';
        exit();
    }

    $imageNameNew = uniqid().'.'.$imageActExt;
    $imageDesti   = '../assets/images/users/'.$imageNameNew;
    
    move_uploaded_file($imageTmpName, $imageDesti);

    //Compress Image
    $compressName = 'c'.$imageNameNew;
    $compressDesti = '../assets/images/users/'.$compressName;

    function compressImage($sourceImage, $compressImage)
    {
        $imageInfo = getimagesize($sourceImage);
        if ($imageInfo['mime'] == 'image/jpeg')
        {
            $sourceImage = imagecreatefromjpeg($sourceImage);
            imagejpeg($sourceImage, $compressImage, 50);
        }

        if ($imageInfo['mime'] == 'image/png')
        {
            $sourceImage = imagecreatefrompng($sourceImage);
            imagepng($sourceImage, $compressImage, 5);
        }
        return $compressImage;
    }

    $compressImage = compressImage($imageDesti, $compressDesti);
    
    unlink($imageDesti);    
    
    //Update Image to usres
    $dataupdate = 'UPDATE `users` SET `usersImage` = ? WHERE `usersUid` = ?';
    $stmtupdate = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtupdate, $dataupdate))
    {
        echo '<script>window.location="' . base_url('profile.php?error=stmtfailed') . '";</script>';
        exit();
    }
    
    mysqli_stmt_bind_param($stmtupdate, 'ss', $compressName, $userUid);
    mysqli_stmt_execute($stmtupdate);

    //Auto Cange Image After Update
    $dataselect = 'SELECT `usersImage` FROM `users` WHERE `usersUid` = ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect))
    {
        echo '<script>window.location="' . base_url('profile.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 's', $userUid);
    mysqli_stmt_execute($stmtselect);

    $resultData = mysqli_stmt_get_result($stmtselect);
    $data = mysqli_fetch_assoc($resultData);    
    
    $_SESSION['userimage']  = $data['usersImage'];

    echo
    '<script>
            alert("Perubahan Foto Profil Berhasil")
            document.location="' . base_url('../profile') . '";
        </script>';
    exit();
}

if (isset($_POST['editPassword']))
{

    $passwordOld = htmlspecialchars(trim($_POST['passwordOld']));
    $password    = htmlspecialchars(trim($_POST['password']));
    $confirm     = htmlspecialchars(trim($_POST['confirm']));    

    $dataselect = 'SELECT `usersPwd` FROM `users` WHERE `usersUid` = ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect))
    {
        echo '<script>window.location="' . base_url('profile.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 's', $userUid);
    mysqli_stmt_execute($stmtselect);

    $resultData = mysqli_stmt_get_result($stmtselect);
    $data = mysqli_fetch_assoc($resultData);

    $pwdHashed = $data['usersPwd'];
    $checkPwd  = password_verify($passwordOld, $pwdHashed);

    if ($checkPwd == false)
    {
        echo '<script>window.location="' . base_url('profile.php?error=pwdwrong') . '";</script>';
        exit();
    }

    $dataupdate = 'UPDATE `users` SET `usersPwd` = ? WHERE `usersUid` = ?';
    $stmtupdate = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtupdate, $dataupdate))
    {
        echo '<script>window.location="' . base_url('editUser.php?error=stmtfailed') . '";</script>';
        exit();
    }

    $pwdHashed = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmtupdate, 'ss', $pwdHashed, $userUid);
    mysqli_stmt_execute($stmtupdate);    
    mysqli_stmt_close($stmtupdate);    

    echo
    '<script>
            alert("Perubahan Password Berhasil")
            document.location="' . base_url('../profile') . '";
        </script>';
    exit();
}