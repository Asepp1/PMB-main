<?php
include_once '../config/connect.sample.php';
include_once '../config/function.php';
require_once '../progres/menuProgres.php';
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
                            <h2>Managemen Menu</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div align="right">
                                            <a type="button" href="<?php echo base_url('menu.php') ?>" class="btn btn-default waves-effect" data-toggle="tooltip" data-placement="bottom" title="Perbarui"><i class="material-icons">refresh</i></a>
                                            <a href="addMenu.php" class="btn bg-green waves-effect">
                                                <i class="material-icons">add_circle_outline</i>
                                                <span><strong>TAMBAH</strong></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="userTable" class="table-responsive">
                                <table class="table table-striped" id="my_table" align="center">
                                    <thead>
                                        <tr>
                                            <th class="col-sm-1">POSISI</th>
                                            <th class="col-sm-3">NAMA</th>
                                            <th class="col-sm-3">KONTEN</th>                                            
                                            <th class="col-sm-2"><i class="material-icons">settings</i></th>
                                        </tr>
                                    </thead>
                                    <tbody class="my_position">
                                        <?php
                                        foreach ($menus as $menu) {
                                        ?>
                                            <tr id="<?php echo $menu['menusId'] ?>">
                                                <td><?php echo $menu['menusOrder'] ?></td>
                                                <td><?php echo $menu['menusName'] ?></td>
                                                <td><?php echo $menu['menusUrl'] ?></td>                                                
                                                <td>
                                                    <a href="editMenu.php?id=<?php echo $menu['menusId'] ?>" class="btn bg-cyan waves-effect" data-toggle="tooltip" data-placement="left" title="Edit Menu"><i class="material-icons">edit</i></a>
                                                    <a href="deleteMenu.php?id=<?php echo $menu['menusId'] ?>" class="btn bg-red waves-effect" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" data-toggle="tooltip" data-placement="right" title="Hapus Menu"><i class="material-icons">delete</i></a>
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
    <script src="<?php echo base_url('../assets/js/jqueryui.js') ?>"></script>
    <script src="<?php echo base_url('../assets/js/costum.js') ?>"></script>
</body>

</html>