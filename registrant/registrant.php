<?php
require_once '../config/connect.sample.php';
require_once '../config/function.php';
require_once '../progres/formProgres.php';

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
                <h2>CALON MAHASISWA</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Calon Mahasiswa</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box bg-cyan">
                                        <div class="icon">
                                            <i class="material-icons">people</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">TOTAL</div>
                                            <div class="number count-to" data-from="0" data-to="<?php echo $total ?>" data-speed="1000" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
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
                                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
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
                                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
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
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box bg-teal">
                                        <div class="icon">
                                            <i class="material-icons">import_contacts</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Jalur Mandiri</div>
                                            <div class="number count-to" data-from="0" data-to="<?php echo $mandiri ?>" data-speed="1000" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box bg-lime">
                                        <div class="icon">
                                            <i class="material-icons">school</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Jalur Beasiswa</div>
                                            <div class="number count-to" data-from="0" data-to="<?php echo $beasiswa ?>" data-speed="1000" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="" class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th class="col-sm-1">NO.</th>
                                            <th class="col-sm-1">JALUR</th>
                                            <th class="col-sm-3">NAMA LENGKAP</th>
                                            <th class="col-sm-3">ALAMAT EMAIL</th>
                                            <th class="col-sm-2">No.TELP/WA</th>
                                            <th class="col-sm-1 align-center"><i class="material-icons">settings</i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($mahasiswas as $mahasiswa) {
                                        ?>
                                            <tr>
                                                <td><?php echo $mahasiswa['formNo'] ?></td>
                                                <td><?php echo $mahasiswa['formJalur'] ?></td>
                                                <td><?php echo $mahasiswa['formNama'] ?></td>
                                                <td><?php echo $mahasiswa['formEmail'] ?></td>
                                                <td><?php echo $mahasiswa['formHp'] ?></td>
                                                <td class="align-center">
                                                    <a href="viewRegistrant.php?id=<?php echo $mahasiswa['formId'] ?>" class="btn bg-cyan waves-effect" data-toggle="tooltip" data-placement="left" title="Review"><i class="material-icons">visibility</i></a>
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
    <script src="<?php echo base_url('../assets/js/pages/widgets/infobox/infobox-2.js') ?>"></script>
</body>

</html>