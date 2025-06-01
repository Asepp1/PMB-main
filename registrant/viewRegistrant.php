<?php
require_once '../config/connect.sample.php';
require_once '../config/function.php';
include_once '../progres/formProgres.php';

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
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="<?= $value['formJk'] == 'L' ? base_url('../assets/images/male.png') : base_url('../assets/images/famale.png') ?>" width="100" height="100" alt="<?php echo $value['formNama'] ?>" />
                            </div>
                            <div class="content-area">
                                <h5><?php echo $value['formNama'] ?></h5>
                                <p><?php echo $value['formNo'] ?></p>
                                <p><?php echo $value['formJalur'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-about-me">
                        <div class="header align-center">
                            <h2>Informasi Akun</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">school</i>
                                        Beasiswa
                                    </div>
                                    <div class="content">
                                        <?= !isset($value['formBeasiswa']) ? '-' : $value['formBeasiswa'] ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">business_center</i>
                                        Program Studi
                                    </div>
                                    <div class="content">
                                        <?= empty($value['formProdi']) ? '-' : $value['formProdi'] ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">access_time</i>
                                        Kelas
                                    </div>
                                    <div class="content">
                                        <?= empty($value['formKelas']) ? '-' : $value['formKelas'] ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">email</i>
                                        Email
                                    </div>
                                    <div class="content">
                                        <?= empty($value['formEmail']) ? '-' : $value['formEmail'] ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">smartphone</i>
                                        No.Hp/WA
                                    </div>
                                    <div class="content">
                                        <?= empty($value['formHp']) ? '-' : $value['formHp'] ?>
                                    </div>
                                </li>
                                <li class="align-center">
                                    <div class="title">
                                        <?php
                                        foreach ($mahasiswas as $mahasiswa) {
                                        ?>
                                        <a href="editRegistrant.php?id=<?php echo $mahasiswa['formId'] ?>">
                                        <?php
                                        }
                                        ?>
                                        <i class="material-icons">edit</i>
                                        Edit Mahasiswa
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#informasi" aria-controls="home" role="tab" data-toggle="tab">Informasi Mahasiswa</a></li>
                                    <li role="presentation"><a href="#orangtua" aria-controls="settings" role="tab" data-toggle="tab">Informasi Data Orang Tua</a></li>
                                    <li role="presentation"><a href="#prestasi" aria-controls="settings" role="tab" data-toggle="tab">Informasi Prestasi</a></li>
                                    <li role="presentation"><a href="#penunjang" aria-controls="settings" role="tab" data-toggle="tab">Informasi Penunjang</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="informasi">
                                        <label>NISN</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formNisn']) ? '-' : $value['formNisn'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>NIK</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formNik']) ? '-' : $value['formNik'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Tempat Tanggal Lahir</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formTptLahir']) ? '-' : $value['formTptLahir'] . ', ' . $value['formTglLahir'] . ' ' . $value['formBlnLahir'] . ' ' . $value['formThnLahir'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Alamat</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formDesa']) ? '-' : $value['formJalan'] . ' ' . $value['formDesa'] . ' ' . $value['formRt'] . '/' . $value['formRw'] . ' ' . $value['formKec'] . ', ' . $value['formKab'] . ', ' . $value['formProv'] . ' - ' . $value['formKodepos'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Hobi</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formHobi']) ? '-' : $value['formHobi'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Cita - Cita</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formCita']) ? '-' : $value['formCita'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Anak ke</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formAnakke']) ? '-' : $value['formAnakke'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Jumlah Saudara</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formSaudara']) ? '-' : $value['formSaudara'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Berat Badan</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formBerat']) ? '-' : $value['formBerat'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Tinggi Badan</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formTinggi']) ? '-' : $value['formTinggi'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Asal Sekolah</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formAsalSekolah']) ? '-' : $value['formAsalSekolah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>SKHUN</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formSkhun']) ? '-' : $value['formSkhun'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Tahun Lulus</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formTahunLulus']) ? '-' : $value['formTahunLulus'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="orangtua">
                                        <label>Kartu Keluarga</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formKkAyah']) ? '-' : $value['formKkAyah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>NIK Ayah</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formNikAyah']) ? '-' : $value['formNikAyah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Nama Ayah</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formNamaAyah']) ? '-' : $value['formNamaAyah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Pekerjaan Ayah</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formPekerjaanA']) ? '-' : $value['formPekerjaanA'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Pendidikan Ayah</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formPendidikanA']) ? '-' : $value['formPendidikanA'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>NIK Ibu</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formNikIbu']) ? '-' : $value['formNikIbu'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Nama Ibu</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formNamaIbu']) ? '-' : $value['formNamaIbu'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Pekerjaan Ibu</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formPekerjaanI']) ? '-' : $value['formPekerjaanI'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Pendidikan Ibu</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formPendidikanI']) ? '-' : $value['formPendidikanI'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Penghasilan Orang Tua</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formPenghasilan']) ? '-' : $value['formPenghasilan'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="prestasi">
                                        <label>Cabang Lomba</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formLomba']) ? '-' : $value['formLomba'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Tingkat Lomba</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formTingkat']) ? '-' : $value['formTingkat'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Peringkat Lomba</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formPeringkat']) ? '-' : $value['formPeringkat'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Tahun Lomba</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formTahun']) ? '-' : $value['formTahun'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="penunjang">
                                        <label>Organisasi Masyarakat Orang Tua/Wali</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formOrganisasi']) ? '-' : $value['formOrganisasi'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Keadaan Calon Mahasiswa</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formKeadaan']) ? '-' : $value['formKeadaan'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>KTP</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe src="<?= !empty($value['formKtp']) ? base_url('../assets/files/ktp/' . $value['formKtp'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                        </div>
                                        <label>Akta</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe src="<?= !empty($value['formAkta']) ? base_url('../assets/files/akta/' . $value['formAkta'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                        </div>
                                        <label>KK</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe src="<?= !empty($value['formKk']) ? base_url('../assets/files/kk/' . $value['formKk'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                        </div>
                                        <label>Ijazah</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe src="<?= !empty($value['formIjazah']) ? base_url('../assets/files/ijazah/' . $value['formIjazah'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                        </div>
                                        <label>Foto</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe src="<?= !empty($value['formFoto']) ? base_url('../assets/files/foto/' . $value['formFoto'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                        </div>
                                        <label>SKTM</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe src="<?= !empty($value['formSktm']) ? base_url('../assets/files/sktm/' . $value['formSktm'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                        </div>
                                        <label>KIP</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe src="<?= !empty($value['formKip']) ? base_url('../assets/files/kip/' . $value['formKip'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                        </div>
                                        <label>PKH</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe src="<?= !empty($value['formPkh']) ? base_url('../assets/files/pkh/' . $value['formPkh'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                        </div>
                                        <label>KKS</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe src="<?= !empty($value['formKks']) ? base_url('../assets/files/kks/' . $value['formKks'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                        </div>
                                        <label>Bukti Pembayaran</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe src="<?= !empty($value['formBukti']) ? base_url('../assets/files/bukti/' . $value['formBukti'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                        </div>
                                    </div>
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