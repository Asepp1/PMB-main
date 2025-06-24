<?php
require_once '../config/connect.sample.php';
require_once '../config/function.php';

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
                            <blockquote class="m-b-25">
                                <p>Anda Sudah Melakukan Upload Berkas Pendaftaran</p>
                            </blockquote>
                            <blockquote>
                                <p>Untuk Langkah Selanjutnya Silahakan Upload Bukti Pembayaran Pendaftaran</p>
                                <footer>Silahkan menuju halaman pada <cite title="Source Title" class="col-cyan">Bukti Pembayaran</cite></footer>
                            </blockquote>
                            <blockquote class="blockquote-reverse">
                                <p>Terimakasih Telah Mendaftar di </p><p class="col-green">UNIVERSITAS PERJUANGAN TASIKMALAYA</p>
                                <footer><cite title="Source Title" class="col-red">Excellent and Character Building</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once '../include/script.php'; ?>
</body>

</html>