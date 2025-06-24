<?php
require_once '../config/connect.sample.php';
require_once '../config/function.php';
require_once '../progres/formProgres.php';

if (!isset($_SESSION['useremail']) || !isset($_SESSION['useruid'])) {
    echo '<script>window.location="' . base_url('../auth/login.php') . '";</script>';
    exit();
}

if (!empty($ktp['formKtp'])) {
    echo '<script>window.location="' . base_url('statusFile.php') . '";</script>';
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
                <h2>BERKAS PENDAFTARAN</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>BERKAS PENDAFTARAN</h2>
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
                                        echo '<div class="alert alert-danger" align="center"><strong>Silahkan Lengkapi Formulir Pendaftaran Terlabih Dahulu!</strong></div>';
                                    }
                                }
                                ?>
                                <label>Upload KTP Calon Mahasiswa*</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="ktpDisplay" onclick="ktpClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="ktpFile" type="file" name="ktp" onchange="displayKtp(this)">
                                        </div>
                                    </div>
                                </div>
                                <label>Upload Akta Kelahiran*</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="aktaDisplay" onclick="aktaClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="aktaFile" type="file" name="akta" onchange="displayAkta(this)">
                                        </div>
                                    </div>
                                </div>
                                <label>Upload Kartu Keluarga*</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="kkDisplay" onclick="kkClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="kkFile" type="file" name="kk" onchange="displayKk(this)">
                                        </div>
                                    </div>
                                </div>
                                <label>Upload Ijazah Terakhir*</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="ijazahDisplay" onclick="ijazahClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="ijazahFile" type="file" name="ijazah" onchange="displayIjazah(this)">
                                        </div>
                                    </div>
                                </div>
                                <label>Upload Foto Berwarna Terbaru Memakai Seragam*</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="fotoDisplay" onclick="fotoClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="fotoFile" type="file" name="foto" onchange="displayFoto(this)">
                                        </div>
                                    </div>
                                </div>
                                <label>Upload SKTM</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="sktmDisplay" onclick="sktmClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="sktmFile" type="file" name="sktm" onchange="displaySktm(this)">
                                        </div>
                                    </div>
                                </div>
                                <label>Upload KIP</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="kipDisplay" onclick="kipClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="kipFile" type="file" name="kip" onchange="displayKip(this)">
                                        </div>
                                    </div>
                                </div>
                                <label>Upload PKH</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="pkhDisplay" onclick="pkhClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="pkhFile" type="file" name="pkh" onchange="displayPkh(this)">
                                        </div>
                                    </div>
                                </div>
                                <label>Upload KKS</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="kksDisplay" onclick="kksClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="kksFile" type="file" name="kks" onchange="displayKks(this)">
                                        </div>
                                    </div>
                                </div>
                                <h5><strong>* = WAJIB DIISI!</strong></h5>
                                <div class="form-group align-center">
                                    <button type="submit" class="btn bg-green m-t-15 waves-effect" name="uploadFile">
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