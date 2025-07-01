<?php
require_once '../config/connect.sample.php';
require_once '../config/function.php';
include_once '../progres/formProgres.php';
//require_once '../progres/proofProgres.php';


if (!isset($_SESSION['useremail']) || !isset($_SESSION['useruid'])) {
    echo '<script>window.location="' . base_url('../auth/login.php') . '";</script>';
    exit();
}
if (!$_SESSION['userlevel'] == 'admin') {
    echo '<script>window.location="' . base_url('../dashboard') . '";</script>';
}


// Ambil ID dari parameter URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    echo '<script>window.location="' . base_url('../dashboard') . '";</script>'; 
    exit();
}

// Query untuk mengambil data registrant
$query = "SELECT * FROM mahasiswas WHERE formId = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo '<script>window.location="' . base_url('../dashboard') . '";</script>'; 
    exit();
}

$value = $result->fetch_assoc();
$mahasiswas = [$value]; 

// Handle form submission untuk konfirmasi pembayaran
if (isset($_POST['confirm'])) {
    $id = $_POST['formId'];
    $status = isset($_POST['status']) ? $_POST['status'] : 'BELUM';
    $catatan = isset($_POST['catatan']) ? $_POST['catatan'] : '';

    // Update status pembayaran di database
    $query = "UPDATE mahasiswas SET formStatus = ? WHERE formId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $status, $id);

    if ($stmt->execute()) {
        // Simpan ke riwayat pembayaran
        $queryHistory = "INSERT INTO payment_history (formId, status, updated_by, catatan, created_at) VALUES (?, ?, ?, ?, NOW())";
        $stmtHistory = $conn->prepare($queryHistory);
        $stmtHistory->bind_param("isss", $id, $status, $_SESSION['useremail'], $catatan);
        $stmtHistory->execute();

        echo '<script>
            alert("Status pembayaran berhasil diperbarui!");
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        </script>';
        exit();
    } else {
        echo '<script>alert("Terjadi kesalahan saat menyimpan!");</script>';
    }
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
                                <img src="<?= $value['formJk'] == 'L' ? base_url('../assets/images/male.png') : base_url('../assets/images/famale.png') ?>"
                                    width="100" height="100" alt="<?php echo $value['formNama'] ?>" />
                            </div>
                            <div class="content-area">
                                <div class="content-area">
                                    <h5><?= $value['nama'] ?? '-' ?></h5> 
                                    <p><?= $value['no_pendaftaran'] ?? '-' ?></p> <
                                    <p><?= $value['jalur'] ?? '-' ?></p> 
                                </div>
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
                                    <li role="presentation" class="active"><a href="#informasi" aria-controls="home"
                                            role="tab" data-toggle="tab">Informasi Mahasiswa</a></li>
                                    <li role="presentation"><a href="#orangtua" aria-controls="settings" role="tab"
                                            data-toggle="tab">Informasi Data Orang Tua</a></li>
                                    <li role="presentation"><a href="#prestasi" aria-controls="settings" role="tab"
                                            data-toggle="tab">Informasi Prestasi</a></li>
                                    <li role="presentation"><a href="#penunjang" aria-controls="settings" role="tab"
                                            data-toggle="tab">Informasi Penunjang</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="informasi">
                                        <label>NISN</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <h4><?= $value['formNisn'] ?? '-' ?></h4>
                                                            
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
                                                            <h4><?= $value['formNik'] ?? '-' ?></h4>
                                                            
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
                                                            <?php
                                                            $tempat = '';
                                                            $tanggal = '';

                                                            
                                                            if (!empty($value['formTptLahir'])) {
                                                                $tempat = $value['formTptLahir'];
                                                            }

                                                            
                                                            $tgl = !empty($value['formTglLahir']) ? $value['formTglLahir'] : '';
                                                            $bln = !empty($value['formBlnLahir']) ? $value['formBlnLahir'] : '';
                                                            $thn = !empty($value['formThnLahir']) ? $value['formThnLahir'] : '';

                                                            if (!empty($tgl) && !empty($bln) && !empty($thn)) {
                                                                $tanggal = $tgl . ' ' . $bln . ' ' . $thn;
                                                            }

                                                            // Tampilkan hasil
                                                            if (!empty($tempat) && !empty($tanggal)) {
                                                                echo $tempat . ', ' . $tanggal;
                                                            } elseif (!empty($tempat)) {
                                                                echo $tempat;
                                                            } elseif (!empty($tanggal)) {
                                                                echo $tanggal;
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?>
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
                                            <iframe
                                                src="<?= !empty($value['formKtp']) ? base_url('../assets/files/ktp/' . $value['formKtp'] . '"') : base_url('../assets/files/file.pdf') ?>"
                                                width="100%"></iframe>
                                        </div>
                                        <label>Akta</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe
                                                src="<?= !empty($value['formAkta']) ? base_url('../assets/files/akta/' . $value['formAkta'] . '"') : base_url('../assets/files/file.pdf') ?>"
                                                width="100%"></iframe>
                                        </div>
                                        <label>KK</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe
                                                src="<?= !empty($value['formKk']) ? base_url('../assets/files/kk/' . $value['formKk'] . '"') : base_url('../assets/files/file.pdf') ?>"
                                                width="100%"></iframe>
                                        </div>
                                        <label>Ijazah</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe
                                                src="<?= !empty($value['formIjazah']) ? base_url('../assets/files/ijazah/' . $value['formIjazah'] . '"') : base_url('../assets/files/file.pdf') ?>"
                                                width="100%"></iframe>
                                        </div>
                                        <label>Foto</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe
                                                src="<?= !empty($value['formFoto']) ? base_url('../assets/files/foto/' . $value['formFoto'] . '"') : base_url('../assets/files/file.pdf') ?>"
                                                width="100%"></iframe>
                                        </div>
                                        <label>SKTM</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe
                                                src="<?= !empty($value['formSktm']) ? base_url('../assets/files/sktm/' . $value['formSktm'] . '"') : base_url('../assets/files/file.pdf') ?>"
                                                width="100%"></iframe>
                                        </div>
                                        <label>KIP</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe
                                                src="<?= !empty($value['formKip']) ? base_url('../assets/files/kip/' . $value['formKip'] . '"') : base_url('../assets/files/file.pdf') ?>"
                                                width="100%"></iframe>
                                        </div>
                                        <label>PKH</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe
                                                src="<?= !empty($value['formPkh']) ? base_url('../assets/files/pkh/' . $value['formPkh'] . '"') : base_url('../assets/files/file.pdf') ?>"
                                                width="100%"></iframe>
                                        </div>
                                        <label>KKS</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe
                                                src="<?= !empty($value['formKks']) ? base_url('../assets/files/kks/' . $value['formKks'] . '"') : base_url('../assets/files/file.pdf') ?>"
                                                width="100%"></iframe>
                                        </div>
                                        <label>Bukti Pembayaran</label>
                                        <div class="panel panel-default panel-post">
                                            <iframe
                                                src="<?= !empty($value['formBukti']) ? base_url('../assets/files/bukti/' . $value['formBukti'] . '"') : base_url('../assets/files/file.pdf') ?>"
                                                width="100%"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BAGIAN KONFIRMASI PEMBAYARAN -->
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
                            <form id="paymentForm" class="form-horizontal" method="POST"
                                action="viewRegistrant.php?id=<?= $value['formId'] ?>">
                                <input type="hidden" name="formId" value="<?= $value['formId'] ?>">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="current_status">Status Saat Ini:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <span
                                                    class="badge <?= ($value['formStatus'] == 'LUNAS') ? 'bg-green' : 'bg-red' ?>">
                                                    <?= $value['formStatus'] ?? 'BELUM' ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="status">Ubah Status:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick" name="status" id="status" required>
                                                <option value="">-- Pilih Status --</option>
                                                <option value="BELUM" <?= ($value['formStatus'] == 'BELUM') ? 'selected' : '' ?>>BELUM BAYAR</option>
                                                <option value="PENDING" <?= ($value['formStatus'] == 'PENDING') ? 'selected' : '' ?>>PENDING</option>
                                                <option value="LUNAS" <?= ($value['formStatus'] == 'LUNAS') ? 'selected' : '' ?>>LUNAS</option>
                                                <option value="DITOLAK" <?= ($value['formStatus'] == 'DITOLAK') ? 'selected' : '' ?>>DITOLAK</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="catatan">Catatan:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" class="form-control no-resize" name="catatan"
                                                    id="catatan"
                                                    placeholder="Masukkan catatan jika diperlukan..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" name="confirm"
                                            class="btn btn-primary m-t-15 waves-effect">
                                            <i class="material-icons">save</i> SIMPAN PERUBAHAN
                                        </button>
                                        <button type="button" onclick="window.location.href='../dashboard'"
                                            class="btn btn-default m-t-15 waves-effect">
                                            <i class="material-icons">arrow_back</i> KEMBALI
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BAGIAN RIWAYAT PEMBAYARAN -->
        <div class="container-fluid">
            <div class="block-header">
                <h2>RIWAYAT PEMBAYARAN</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Riwayat Status Pembayaran</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Diubah Oleh</th>
                                            <th>Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Query untuk mengambil riwayat pembayaran
                                        $queryHistory = "SELECT * FROM payment_history WHERE formId = ? ORDER BY created_at DESC";
                                        $stmtHistory = $conn->prepare($queryHistory);
                                        $stmtHistory->bind_param("i", $value['formId']);
                                        $stmtHistory->execute();
                                        $resultHistory = $stmtHistory->get_result();

                                        $no = 1;
                                        if ($resultHistory->num_rows > 0) {
                                            while ($history = $resultHistory->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= date('d/m/Y H:i:s', strtotime($history['created_at'])) ?></td>
                                                    <td>
                                                        <span
                                                            class="badge <?= ($history['status'] == 'LUNAS') ? 'bg-green' : (($history['status'] == 'PENDING') ? 'bg-orange' : 'bg-red') ?>">
                                                            <?= $history['status'] ?>
                                                        </span>
                                                    </td>
                                                    <td><?= $history['updated_by'] ?></td>
                                                    <td><?= !empty($history['catatan']) ? $history['catatan'] : '-' ?></td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada riwayat pembayaran</td>
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

    <!-- Jquery Core Js -->
    <script src="<?= base_url('../assets/plugins/jquery/jquery.min.js') ?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url('../assets/plugins/bootstrap/js/bootstrap.js') ?>"></script>

    <!-- Select Plugin Js -->
    <script src="<?= base_url('../assets/plugins/bootstrap-select/js/bootstrap-select.js') ?>"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?= base_url('../assets/plugins/jquery-slimscroll/jquery.slimscroll.js') ?>"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?= base_url('../assets/plugins/jquery-datatable/jquery.dataTables.js') ?>"></script>
    <script
        src="<?= base_url('../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') ?>"></script>
    <script
        src="<?= base_url('../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') ?>"></script>
    <script src="<?= base_url('../assets/plugins/jquery-datatable/extensions/export/jszip.min.js') ?>"></script>
    <script src="<?= base_url('../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js') ?>"></script>
    <script src="<?= base_url('../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js') ?>"></script>
    <script src="<?= base_url('../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js') ?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url('../assets/plugins/node-waves/waves.js') ?>"></script>

    <!-- Custom Js -->
    <script src="<?= base_url('../assets/js/admin.js') ?>"></script>
    <script src="<?= base_url('../assets/js/pages/tables/jquery-datatable.js') ?>"></script>

    <!-- Demo Js -->
    <script src="<?= base_url('../assets/js/demo.js') ?>"></script>

    <script>
        $(document).ready(function () {
            // Konfirmasi sebelum submit
            $('#paymentForm').on('submit', function (e) {
                var status = $('#status').val();
                if (status === '') {
                    alert('Silakan pilih status pembayaran!');
                    e.preventDefault();
                    return false;
                }

                var confirmMessage = 'Apakah Anda yakin ingin mengubah status pembayaran menjadi ' + status + '?';
                if (!confirm(confirmMessage)) {
                    e.preventDefault();
                    return false;
                }
            });

            // Hapus auto-refresh atau ubah menjadi refresh data saja
            // setInterval(function() {
            //     location.reload();
            // }, 300000);
        });
    </script>
</body>

</html>