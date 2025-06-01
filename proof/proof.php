<?php
require_once '../config/connect.sample.php';
require_once '../config/function.php';
require_once '../progres/proofProgres.php';

if (!isset($_SESSION['useremail']) || !isset($_SESSION['useruid'])) {
    echo '<script>window.location="' . base_url('../auth/login.php') . '";</script>';
    exit();
}

if (!empty($bukti['formBukti'])) {
    echo '<script>window.location="' . base_url('statusProof.php') . '";</script>';
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
            <div class="block-header">
                <h2>BUKTI PEMBAYARAN</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>BUKTI PEMBAYARAN PENDAFTARAN</h2>
                            <small>Jika ada pertanyaan/masalah dalam pendaftaran bisa menghubungi panitia pendaftaran</small>
                        </div>
                        <div class="body">
                            <form id="" action="" method="POST" enctype="multipart/form-data">
                                <?php
                                if (isset($_GET['error'])) {
                                    if ($_GET['error'] == 'error') {
                                        echo '<div class="alert alert-danger" align="center"><strong>Isi File Terlebih Dahulu!</strong></div>';
                                    }
                                    if ($_GET['error'] == 'upload') {
                                        echo '<div class="alert alert-danger" align="center"><strong>Format File Tidak Sesuai!</strong></div>';
                                    }
                                    if ($_GET['error'] == 'bigfile') {
                                        echo '<div class="alert alert-danger" align="center"><strong>File Terlalu Besar!</strong></div>';
                                    }
                                    if ($_GET['error'] == 'form') {
                                        echo '<div class="alert alert-danger" align="center"><strong>Silahkan Upload Berkas Pendaftaran Terlabih Dahulu!</strong></div>';
                                    }
                                }
                                ?>
                                <label>Upload Bukti Pembayaran*</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="buktiDisplay" onclick="buktiClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="buktiFile" type="file" name="bukti" onchange="displayBukti(this)">
                                        </div>
                                    </div>
                                </div>
                                <h5><strong>* = WAJIB DIISI!</strong></h5>
                                <div class="form-group align-center">
                                    <button type="submit" class="btn bg-green m-t-15 waves-effect" name="uploadBukti">
                                        <i class="material-icons">save</i>
                                        <span><strong>SIMPAN</strong></span>
                                    </button>
                                    <h5><strong>~ Cek Terlebih Dahulu File Yang Akan Di Upload! ~</strong></h5>
                                </div>
                            </form>
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