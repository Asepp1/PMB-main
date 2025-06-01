<?php
require_once '../config/connect.sample.php';
require_once '../config/function.php';
require_once '../progres/profileProgres.php';

if (!isset($_SESSION['useremail']) || !isset($_SESSION['useruid'])) {
    echo '<script>window.location="' . base_url('../auth/login.php') . '";</script>';
    exit();
}
?>
<!DOCTYPE html>
<html>
<?php include_once '../include/head.php'; ?>

<body class="theme-cyan">
    <?php include_once '../include/sidebar.php'; ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="<?= !empty($_SESSION['userimage']) ? base_url('../assets/images/users/' . $_SESSION['userimage'] . '"') : base_url('../assets/images/users/image.png') ?>" width="125" height="125" alt="<?php echo $_SESSION['username'] ?>" />
                            </div>
                            <div class="content-area">
                                <h5><?php echo $_SESSION['username'] ?></h5>
                            </div>                            
                        </div>
                    </div>
                    <div class="card card-about-me">
                        <div class="header align-center">
                            <h2>Informasi Akun</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">person</i>
                                        Username
                                    </div>
                                    <div class="content">
                                        <?php echo $_SESSION['useruid'] ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">email</i>
                                        Email
                                    </div>
                                    <div class="content">
                                        <?php echo $_SESSION['useremail'] ?>                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 'error') {
                            echo '<div class="alert alert-danger" align="center"><strong>Pilih Foto Terlebih Dahulu!</strong></div>';
                        }
                        if ($_GET['error'] == 'upload') {
                            echo '<div class="alert alert-danger" align="center"><strong>Format Foto Tidak Sesuai!</strong></div>';
                        }
                        if ($_GET['error'] == 'bigfile') {
                            echo '<div class="alert alert-danger" align="center"><strong>File Terlalu Besar!</strong></div>';
                        }
                        if ($_GET['error'] == 'pwdwrong') {
                            echo '<div class="alert alert-danger" align="center"><strong>Password Tidak Sesuai!</strong></div>';
                        }
                    }
                    ?>
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Pengaturan Profil</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Ganti Password</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                        <form id="" action="" method="POST" enctype="multipart/form-data">
                                            <label>Foto Profil</label>
                                            <div class="input-group">
                                                <img id="profilDisplay" onclick="triggerClick()" src="<?= !empty($_SESSION['userimage']) ? base_url('../assets/images/users/' . $_SESSION['userimage'] . '"') : base_url('../assets/images/users/image.png') ?>" width="100" height="100" alt="<?php echo $_SESSION['username'] ?>" />
                                                <input id="profilImage" type="file" name="image" onchange="displayImage(this)" style="display:none">
                                            </div>
                                            <p>~ foto harus = 1:1 (format : jpg, jpeg, png) max 1.5 Mb ~</p>
                                            <div class="form-group align-center">
                                                <button type="submit" class="btn bg-green m-t-15 waves-effect" name="editProfil">
                                                    <i class="material-icons">save</i>
                                                    <span><strong>SIMPAN</strong></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form id="sign_up" action="" method="POST">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="password" class="form-control" name="passwordOld" minlength="6" placeholder="Password Lama" required autofocus>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="password" class="form-control" name="password" minlength="6" placeholder="Password Baru" required>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Konfirmasi Password Baru" required>
                                                </div>
                                            </div>
                                            <div class="form-group align-center">
                                                <button type="submit" class="btn bg-green m-t-15 waves-effect" name="editPassword">
                                                    <i class="material-icons">save</i>
                                                    <span><strong>SIMPAN</strong></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once '../include/script.php'; ?>
    <script src="<?php echo base_url('../assets/js/display.js') ?>"></script>
</body>

</html>