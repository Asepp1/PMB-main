<?php
require_once '../config/connect.sample.php';
require_once '../config/function.php';
require_once '../progres/authProgres.php';
?>
<!DOCTYPE html>
<html>
<?php include_once '../include/head.php'; ?>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a>Sign - <b>Up</b></a>
            <small>PMB | UNPER</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" action="" method="POST">
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 'invalidemail') {
                            echo '<div class="alert alert-danger" align="center"><strong>Email tidak sesuai!</strong></div>';
                        }
                        if ($_GET['error'] == 'invaliduid') {
                            echo '<div class="alert alert-danger" align="center"><strong>Username tidak sesuai!</strong></div>';
                        }
                        if ($_GET['error'] == 'registed') {
                            echo '<div class="alert alert-danger" align="center"><strong>Email/Usernamae sudah terdaftar!</strong></div>';
                        }
                    }
                    ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Alamat Email" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_circle</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Konfirmasi Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">Saya membaca dan menyetujui <a href="javascript:void(0);">syarat penggunaan</a>.</label>
                    </div>
                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" name="register">BUAT AKUN</button>
                    <div class="m-t-25 m-b--5 align-center">
                        <a href="<?php echo base_url('login.php') ?>">Sudah Mempunyai Akun?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include_once '../include/script.php'; ?>
</body>

</html>