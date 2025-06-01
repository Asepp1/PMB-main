<?php
include_once '../config/connect.sample.php';
include_once '../config/function.php';
require_once '../progres/userProgres.php';

//Kondisi sesi login
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
                <h2>MANAGEMEN USER</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>Managemen User</h2>
                                </div>
                                <div class="col-xs-12 col-sm-6 align-right">
                                    <div class="switch panel-switch-btn">
                                        <a type="button" href="<?php echo base_url('../user') ?>" class="btn btn-default waves-effect" data-toggle="tooltip" data-placement="bottom" title="Perbarui"><i class="material-icons">refresh</i></a>
                                        <a href="addUser.php" class="btn bg-green waves-effect">
                                            <i class="material-icons">add_circle_outline</i>
                                            <span><strong>TAMBAH</strong></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div id="" class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th class="col-sm-1 align-center">FOTO</th>
                                            <th class="col-sm-3 ">NAMA LENGKAP</th>
                                            <th class="col-sm-3 ">ALAMAT EMAIL</th>
                                            <th class="col-sm-3 ">USERNAME</th>
                                            <th class="col-sm-2 align-center"><i class="material-icons">settings</i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($users as $user) {
                                        ?>
                                            <tr>
                                                <td class="align-center"><img src="<?= !empty($user['usersImage']) ? base_url('../assets/images/users/' . $user['usersImage'] . '"') : base_url('../assets/images/users/image.png') ?>" width="40" height="40" alt="<?php echo $user['usersName'] ?>"></td>
                                                <td><?php echo $user['usersName'] ?></td>
                                                <td><?php echo $user['usersEmail'] ?></td>
                                                <td><?php echo $user['usersUid'] ?></td>
                                                <td class="align-center">
                                                    <a href="editUser.php?id=<?php echo $user['usersId'] ?>" class="btn bg-cyan waves-effect" data-toggle="tooltip" data-placement="left" title="Edit User"><i class="material-icons">edit</i></a>
                                                    <a href="deleteUser.php?id=<?php echo $user['usersId'] ?>" class="btn btn-danger waves-effect" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" data-toggle="tooltip" data-placement="right" title="Hapus User"><i class="material-icons">delete</i></a>
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
        </div>
    </section>
    <?php include_once '../include/script.php'; ?>
</body>

</html>