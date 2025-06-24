<?php
require_once '../config/connect.sample.php';
require_once '../config/function.php';
require_once '../progres/selectProgres.php';

if (!isset($_SESSION['useremail']) || !isset($_SESSION['useruid'])) {
    echo '<script>window.location="' . base_url('../auth/login.php') . '";</script>';
    exit();
}

if (!empty($email['formEmail'])) {
    echo '<script>window.location="' . base_url('statusForm.php') . '";</script>';
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
                <h2>FORMULIR PENDAFTARAN</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>FORMULIR PENDAFTARAN</h2>
                            <small>Jika ada pertanyaan/masalah dalam pendaftaran bisa menghubungi panitia pendaftaran</small>
                        </div>
                        <div class="body align-center">
                            <div class="row">
                                <div class="col-sm-3 col-md-2">
                                </div>
                                <div class="col-sm-3 col-md-4">
                                    <div class="button-demo">
                                        <img src="<?php echo base_url('../assets/images/mandiri.png') ?>" width="30%">
                                        <div class="caption">
                                            <h3>Mandiri</h3>
                                            <p>
                                                <a href="<?php echo base_url('formMandiri.php') ?>" class="btn bg-cyan waves-effect" role="button"><strong>DAFTAR</strong></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-4">
                                    <div class="button-demo">
                                        <img src="<?php echo base_url('../assets/images/beasiswa.png') ?>" width="30%">
                                        <div class="caption">
                                            <h3>Beasiswa</h3>
                                            <p>
                                                <a href="<?php echo base_url('formBeasiswa.php') ?>" class="btn bg-cyan waves-effect" role="button"><strong>DAFTAR</strong></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once '../include/script.php'; ?>
</body>

</html>