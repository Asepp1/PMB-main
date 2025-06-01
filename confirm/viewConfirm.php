<?php
require_once '../config/connect.sample.php';
require_once '../config/function.php';
require_once '../progres/proofProgres.php';

if (!isset($_SESSION['useremail']) || !isset($_SESSION['useruid'])) {
    echo '<script>window.location="' . base_url('../auth/login.php') . '";</script>';
    exit();
}

if (!$_SESSION['userlevel'] == 'admin') {
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
            <div class="block-header">
                <h2>KONFIRMASI PEMBAYARAN</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Konfirmasi Pembayaran</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="" method="POST">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nama">Nama Lengkap</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line disabled">
                                                <input type="text" name="nama" class="form-control" value="<?php echo $value['formNama'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email">Email Address</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line disabled">
                                                <input type="email" name="email" class="form-control" value="<?php echo $value['formEmail'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="username">Bukti Transfer</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <iframe src="<?= !empty($value['formBukti']) ? base_url('../assets/files/bukti/' . $value['formBukti'] . '"') : base_url('../assets/files/file.pdf') ?>" width="50%"></iframe>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password">Status Pembayaran</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="demo-switch">
                                            <div class="switch">
                                                <label>BELUM<input type="checkbox" value="SELESAI" name="status" <?= $value['formStatus'] == 'SELESAI' ? 'checked' : '' ?>><span class="lever"></span>SELESAI</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <div class="button-demo">
                                            <button type="submit" class="btn bg-green m-t-15 waves-effect" name="confirm">
                                                <i class="material-icons">save</i>
                                                <span><strong>SIMPAN</strong></span>
                                            </button>
                                            <a type="button" href="<?php echo base_url('confirm.php') ?>" class="btn bg-red m-t-15 waves-effect">
                                                <i class="material-icons">backspace</i>
                                                <span><strong>KEMBALI</strong></span></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <?php include_once '../include/script.php'; ?>
</body>

</html>