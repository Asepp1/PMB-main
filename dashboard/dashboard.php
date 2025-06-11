<?php
require_once '../config/connect.sample.php';
require_once '../config/function.php';
require_once '../progres/formProgres.php';

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
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>INFORMASI PENDAFTARAN</h2>
                            <small>Jika ada pertanyaan/masalah dalam pendaftaran bisa menghubungi petugas administrasi</small>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box bg-cyan">
                                        <div class="icon">
                                            <i class="material-icons">people</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">TOTAL PENDAFTAR</div>
                                            <div class="number count-to" data-from="0" data-to="<?php echo $total ?>" data-speed="1000" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box bg-blue">
                                        <div class="icon">
                                            <i class="material-icons">code</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">RPL</div>
                                            <div class="number count-to" data-from="0" data-to="<?php echo $rpl ?>" data-speed="1000" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box bg-red">
                                        <div class="icon">
                                            <i class="material-icons">computer</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">ABI</div>
                                            <div class="number count-to" data-from="0" data-to="<?php echo $abi ?>" data-speed="1000" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box bg-green">
                                        <div class="icon">
                                            <i class="material-icons">monetization_on</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">AKP</div>
                                            <div class="number count-to" data-from="0" data-to="<?php echo $akp ?>" data-speed="1000" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <blockquote class="blockquote-reverse">
                                <p>Terimakasih Telah Mendaftar di </p>
                                <p class="col-green">UNIVERSITAS PERJUANGAN</p>
                                <footer><cite title="Source Title" class="col-red">Excellent and Character Building</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once '../include/script.php'; ?>
    <script src="<?php echo base_url('../assets/js/pages/widgets/infobox/infobox-2.js') ?>"></script>
</body>

</html>