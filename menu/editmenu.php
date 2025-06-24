<?php
include_once '../config/connect.sample.php';
include_once '../config/function.php';
include_once '../progres/menuProgres.php';

//Kondisi sesi login
if (!isset($_SESSION['useremail']) || !isset($_SESSION['useruid'])) {
    echo '<script>window.location="' . base_url('../auth/login.php') . '";</script>';
    exit();
}

if (!$_SESSION['userlevel'] == 'admin')
{
    echo '<script>window.location="' . base_url('../dashboard') . '";</script>';
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Tambah Menu</h2>
                        </div>
                        <div class="body">
                            <?php
                            if (isset($_GET['error'])) {
                                if ($_GET['error'] == 'registed') {
                                    echo '<div class="alert alert-danger" align="center"><strong>Posisi/Url menu sudah terdaftar!</strong></div>';
                                }
                            }
                            ?>
                            <form id="sign_up" class="form-horizontal" action="" method="POST">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="name">Nama Menu</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="name" class="form-control" value="<?php echo $value['menusName'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="url">Url Menu</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="url" class="form-control" value="<?php echo $value['menusUrl'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <div class="button-demo">
                                            <button type="submit" class="btn bg-green m-t-15 waves-effect" name="edit">
                                                <i class="material-icons">save</i>
                                                <span><strong>SIMPAN</strong></span>
                                            </button>
                                            <a type="button" href="<?php echo base_url('menu.php') ?>" class="btn bg-red m-t-15 waves-effect">
                                                <i class="material-icons">backspace</i>
                                                <span><strong>KEMBALI</strong></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once '../include/script.php'; ?>
</body>

</html>