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
                            <div id="" class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th class="col-sm-1 ">NO.</th>
                                            <th class="col-sm-3 ">NAMA LENGKAP</th>
                                            <th class="col-sm-1 ">JALUR</th>
                                            <th class="col-sm-3 ">ALAMAT EMAIL</th>
                                            <th class="col-sm-2 align-center">BUKTI TRANFER</th>
                                            <th class="col-sm-1 align-center">STATUS</th>
                                            <th class="col-sm-1 align-center"><i class="material-icons">settings</i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($proofs as $proof) {
                                        ?>
                                            <tr>
                                                <td><?php echo $proof['formNo'] ?></td>
                                                <td><?php echo $proof['formNama'] ?></td>
                                                <td><?php echo $proof['formJalur'] ?></td>
                                                <td><?php echo $proof['formEmail'] ?></td>
                                                <td class="align-center"><iframe src="<?= !empty($proof['formBukti']) ? base_url('../assets/files/bukti/' . $proof['formBukti'] . '"') : base_url('../assets/files/file.pdf') ?>" width="40" height="40" alt="<?php echo $proof['formNama'] ?>"></iframe></td>
                                                <td>                                                    
                                                    <div class="demo-switch">
                                                        <div class="switch">
                                                            <label>BELUM<input type="checkbox" <?= $proof['formStatus'] == 'SELESAI' ? 'checked' : '' ?>><span class="lever" ></span>SELESAI</label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-center">
                                                    <a href="viewConfirm.php?id=<?php echo $proof['formId'] ?>" class="btn bg-cyan waves-effect" data-toggle="tooltip" data-placement="left" title="Review"><i class="material-icons">visibility</i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <?php include_once '../include/script.php'; ?>
</body>

</html>