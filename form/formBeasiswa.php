<?php
require_once '../config/connect.sample.php';
require_once '../config/function.php';
include_once '../progres/formProgres.php';

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
                <h2>FORMULIR PENDAFTARAN</h2>
            </div>
            <div class="card">
                <div class="header">
                    <h2>FORMULIR PENDAFTARAN BEASISWA</h2>
                    <small>Jika ada pertanyaan/masalah dalam pendaftaran bisa menghubungi panitia pendaftaran</small>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                            <div class="panel-group" id="accordion_19" role="tablist" aria-multiselectable="true">
                                <form id="form_validation" method="POST">
                                    <?php
                                    if (isset($_GET['error'])) {
                                        if ($_GET['error'] == 'emptyform') {
                                            echo '<div class="alert alert-danger" align="center"><strong>Isi Semua Form yang Wajib di Isi!</strong></div>';
                                        }
                                        if ($_GET['error'] == 'registed') {
                                            echo '<div class="alert alert-danger" align="center"><strong>NIK Sudah Terdaftar!</strong></div>';
                                        }
                                    }
                                    ?>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="headingOne_19">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseOne_19" aria-expanded="true" aria-controls="collapseOne_19">
                                                    <i class="material-icons">school</i>Jalur Pendaftaran
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_19">
                                            <div class="panel-body">
                                                <label>Jalur Pendaftaran</label>
                                                <div class="form-group form-float">
                                                    <div class="demo-radio-button">
                                                        <input name="jalur" value="Beasiswa" type="radio" id="radio_1" checked />
                                                        <label for="radio_1">Jalur Beasiswa</label>
                                                    </div>
                                                </div>
                                                <label>Pilih Beasiswa*</label>
                                                <div class="form-group form-float">
                                                    <select name="beasiswa" class="form-control show-tick" required>
                                                        <option value="">-- Pilih Beasiswa --</option>
                                                        <option value="Prestasi Tahfidz">Beasiswa Tahfidz</option>
                                                        <option value="Prestasi Kitab Kuning">Beasiswa Kitab Kuning</option>
                                                        <option value="Prestasi Akademik">Beasiswa Prestasi Akademik</option>
                                                        <option value="Prestasi Non Akademik">Beasiswa Prestasi Non Akademik</option>
                                                        <option value="Prestasi Kelas">Beasiswa Prestasi Kelas</option>
                                                        <option value="Alumni Balekambang">Beasiswa Alumni Balekambang</option>
                                                        <option value="KIP">Beasiswa Kartu Indonesia Pintar</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="headingTwo_19">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseTwo_19" aria-expanded="true" aria-controls="collapseTwo_19">
                                                    <i class="material-icons">business_center</i> Pilih Program Studi
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo_19">
                                            <div class="panel-body">
                                                <label>Program Studi*</label>
                                                <div class="form-group form-float">
                                                    <select name="prodi" class="form-control show-tick" required>
                                                        <option value="">-- Pilih Program Studi --</option>
                                                        <option value="RPL">D4-Rekayasa Perangkat Lunak</option>
                                                        <option value="ABI">D4-Administrasi Bisnis Internasional</option>
                                                        <option value="AKP">D4-Akutansi Keuangan Publik</option>
                                                    </select>
                                                </div>
                                                <label>Pilih Kelas*</label>
                                                <div class="form-group form-float">
                                                    <select name="kelas" class="form-control show-tick" required>
                                                        <option value="">-- Pilih Kelas --</option>
                                                        <option value="Reguler">Reguler</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="headingThree_19">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseThree_19" aria-expanded="true" aria-controls="collapseThree_19">
                                                    <i class="material-icons">account_box</i> Informasi Data Pribadi
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree_19">
                                            <div class="panel-body">
                                                <label>NISN*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="nisn" placeholder="nisn" maxlength="10" minlength="10" required>
                                                    </div>
                                                </div>
                                                <label>NIK*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="nik" class="form-control" placeholder="nik" maxlength="16" minlength="16" required />
                                                    </div>
                                                </div>
                                                <label>Nama Lengkap*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="nama" class="form-control" placeholder="nama lengkap" value="<?php echo $_SESSION['username'] ?>" required autocomplete="off"/>
                                                    </div>
                                                </div>
                                                <label>Tempat Tanggal Lahir*</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-2">
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="text" name="tempat" class="form-control" placeholder="tempat" required autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group form-float">
                                                            <select name="tgl" class="form-control show-tick" required>
                                                                <option value="">-- Pilih Tangal --</option>
                                                                <?php for ($a = 1; $a < 32; $a++) {
                                                                ?>
                                                                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group form-float">
                                                            <select name="bln" class="form-control show-tick" required>
                                                                <option value="">-- Pilih Bulan --</option>
                                                                <option value="Januari">Januari</option>
                                                                <option value="Februari">Februari</option>
                                                                <option value="Maret">Maret</option>
                                                                <option value="April">April</option>
                                                                <option value="Mei">Mei</option>
                                                                <option value="Juni">Juni</option>
                                                                <option value="Juli">Juli</option>
                                                                <option value="Agustus">Agustus</option>
                                                                <option value="September">September</option>
                                                                <option value="Oktober">Oktober</option>
                                                                <option value="November">November</option>
                                                                <option value="Desember">Desember</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group form-float">
                                                            <select name="thn" class="form-control show-tick" required>
                                                                <option value="">-- Pilih Tahun --</option>
                                                                <?php $th = date('Y') - 30; ?>
                                                                <?php for ($th; $th <= date('Y'); $th++) {
                                                                ?>
                                                                    <option value="<?php echo $th; ?>"><?php echo $th; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Jenis Kelamin*</label>
                                                <div class="form-group form-float">
                                                    <div class="demo-radio-button">
                                                        <input name="jk" value="L" type="radio" id="radio_2" required />
                                                        <label for="radio_2">Laki - Laki</label>
                                                        <input name="jk" value="P" type="radio" id="radio_3" required />
                                                        <label for="radio_3">Perempuan</label>
                                                    </div>
                                                </div>
                                                <label>Hobi</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="hobi" class="form-control" placeholder="hobi" />
                                                    </div>
                                                </div>
                                                <label>Cita - Cita</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="cita" class="form-control" placeholder="cita - cita" />
                                                    </div>
                                                </div>
                                                <label>Anak ke</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="anakke" class="form-control" placeholder="isi angka" />
                                                    </div>
                                                </div>
                                                <label>Jumlah Saudara</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="saudara" class="form-control" placeholder="isi angka" />
                                                    </div>
                                                </div>
                                                <label>Berat Badan</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-2">
                                                        <div class="input-group">
                                                            <div class="form-line">
                                                                <input type="text" name="berat" class="form-control" placeholder="isi angka" />
                                                            </div>
                                                            <span class="input-group-addon">
                                                                <label>Kg</label>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Tinggi Badan</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-2">
                                                        <div class="input-group">
                                                            <div class="form-line">
                                                                <input type="text" name="tinggi" class="form-control" placeholder="isi angka" />
                                                            </div>
                                                            <span class="input-group-addon">
                                                                <label>Cm</label>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Provinsi*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="provinsi" class="form-control" placeholder="provinsi" required autocomplete="off"/>
                                                    </div>
                                                </div>
                                                <label>Kabupaten*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="kabupaten" class="form-control" placeholder="kabupaten" required />
                                                    </div>
                                                </div>
                                                <label>Kecamatan*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="kecamatan" class="form-control" placeholder="kecamatan" required />
                                                    </div>
                                                </div>
                                                <label>Desa*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="desa" class="form-control" placeholder="desa" required />
                                                    </div>
                                                </div>
                                                <label>Jl/No.Rumah/dll</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <textarea type="text" name="jalan" class="form-control" placeholder="Jl./No.Rumah/dll" autocomplete="off"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row clearfix">
                                                    <div class="col-sm-2">
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="text" name="rt" class="form-control" placeholder="RT" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="text" name="rw" class="form-control" placeholder="RW" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="text" name="kodepos" class="form-control" placeholder="Kode Pos" maxlength="5" minlength="5" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Handphone/WA*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="hp" class="form-control" placeholder="handphone/wa" required />
                                                    </div>
                                                </div>
                                                <label>Alamat Email*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="email" class="form-control" value="<?php echo $_SESSION['useremail'] ?>" required />
                                                    </div>
                                                </div>
                                                <label>Asal Sekolah*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="asalSekolah" class="form-control" placeholder="asal sekolah" required />
                                                    </div>
                                                </div>
                                                <label>No. SKHUN</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="skhun" class="form-control" placeholder="no. skhun" />
                                                    </div>
                                                </div>
                                                <label>Tahun Lulus*</label>
                                                <div class="row clearfix">                                                    
                                                    <div class="col-sm-3">
                                                        <div class="form-group form-float">
                                                            <select name="tahunLulus" class="form-control show-tick" required>
                                                                <option value="">-- Pilih Tahun --</option>
                                                                <?php $th = date('Y') - 30; ?>
                                                                <?php for ($th; $th <= date('Y'); $th++) {
                                                                ?>
                                                                    <option value="<?php echo $th; ?>"><?php echo $th; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="headingFour_19">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseFour_19" aria-expanded="true" aria-controls="collapseFour_19">
                                                    <i class="material-icons">face</i> Informasi Data Orangtua
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour_19">
                                            <div class="panel-body">
                                                <label>Nomor KK*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="kk" class="form-control" placeholder="nomor kk" maxlength="16" minlength="16" required />
                                                    </div>
                                                </div>
                                                <br></br>
                                                <label>NIK Ayah*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="nikAyah" class="form-control" placeholder="nik ayah" maxlength="16" minlength="16" required />
                                                    </div>
                                                </div>
                                                <label>Nama Ayah*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="ayah" class="form-control" placeholder="nama ayah" required />
                                                    </div>
                                                </div>
                                                <label>Pekerjaan Ayah*</label>
                                                <div class="form-group form-float">
                                                    <select name="pekerjaanAyah" class="form-control show-tick" required>
                                                        <option value="">-- Pilih --</option>
                                                        <option value="Buruh">Buruh</option>
                                                        <option value="Dosen">Dosen</option>
                                                        <option value="Guru">Guru</option>
                                                        <option value="Nelayan">Nelayan</option>
                                                        <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                        <option value="Petani">Petani</option>
                                                        <option value="PNS">PNS</option>
                                                        <option value="Supir">Supir</option>
                                                        <option value="Tukang">Tukang</option>
                                                        <option value="Wiraswasta">Wiraswasta</option>
                                                        <option value="Lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                                <label>Pendidikan Ayah*</label>
                                                <div class="form-group form-float">
                                                    <select name="pendidikanAyah" class="form-control show-tick" required>
                                                        <option value="">-- Pilih --</option>
                                                        <option value="SD/MI">SD/MI</option>
                                                        <option value="SMP/MTs">SMP/MTs</option>
                                                        <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                        <option value="D1">D1</option>
                                                        <option value="D2">D2</option>
                                                        <option value="D3">D3</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                        <option value="Pesantren">Pesantren</option>
                                                    </select>
                                                </div>
                                                <br></br>
                                                <label>NIK Ibu*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="nikIbu" class="form-control" placeholder="nik ibu" maxlength="16" minlength="16" required />
                                                    </div>
                                                </div>
                                                <label>Nama Ibu*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="ibu" class="form-control" placeholder="nama ibu" required />
                                                    </div>
                                                </div>
                                                <label>Pekerjaan Ibu*</label>
                                                <div class="form-group form-float">
                                                    <select name="pekerjaanIbu" class="form-control show-tick" required>
                                                        <option value="">-- Pilih --</option>
                                                        <option value="Buruh">Buruh</option>
                                                        <option value="Dosen">Dosen</option>
                                                        <option value="Guru">Guru</option>
                                                        <option value="Nelayan">Nelayan</option>
                                                        <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                        <option value="Petani">Petani</option>
                                                        <option value="PNS">PNS</option>
                                                        <option value="Supir">Supir</option>
                                                        <option value="Tukang">Tukang</option>
                                                        <option value="Wiraswasta">Wiraswasta</option>
                                                        <option value="Lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                                <label>Pendidikan Ibu*</label>
                                                <div class="form-group form-float">
                                                    <select name="pendidikanIbu" class="form-control show-tick" required>
                                                        <option value="">-- Pilih --</option>
                                                        <option value="SD/MI">SD/MI</option>
                                                        <option value="SMP/MTs">SMP/MTs</option>
                                                        <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                        <option value="D1">D1</option>
                                                        <option value="D2">D2</option>
                                                        <option value="D3">D3</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                        <option value="Pesantren">Pesantren</option>
                                                    </select>
                                                </div>
                                                <br></br>
                                                <label>Rata - Rata Penghasilan Orang Tua*</label>
                                                <div class="form-group form-float">
                                                    <select name="penghasilan" class="form-control show-tick" required>
                                                        <option value="">-- Pilih --</option>
                                                        <option value="< 500.000">< 500.000</option>
                                                        <option value="500.000 - 1.000.000">500.000 - 1.000.000</option>
                                                        <option value="1.000.000 - 2.000.000">1.000.000 - 2.000.000</option>
                                                        <option value="2.000.000 - 3.000.000">2.000.000 - 3.000.000</option>
                                                        <option value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
                                                        <option value="> 5.000.000">> 5.000.000</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="headingFive_19">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseFive_19" aria-expanded="true" aria-controls="collapseFive_19">
                                                    <i class="material-icons">star</i> Informasi Prestasi
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFive_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive_19">
                                            <div class="panel-body">
                                                <label>Cabang Lomba</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="lomba" class="form-control" placeholder="cabang lomba" />
                                                    </div>
                                                </div>
                                                <label>Tingkat Lomba</label>
                                                <div class="form-group form-float">
                                                    <select name="tingkat" class="form-control show-tick">
                                                        <option value="">-- Pilih --</option>
                                                        <option value="Kecamatan">Kecamatan</option>
                                                        <option value="Kabupaten">Kabupaten</option>
                                                        <option value="Provinsi">Provinsi</option>
                                                        <option value="Nasioanl">Nasioanl</option>
                                                        <option value="International">International</option>
                                                    </select>
                                                </div>
                                                <label>Peringkat Lomba</label>
                                                <div class="form-group form-float">
                                                    <select name="peringkat" class="form-control show-tick">
                                                        <option value="">-- Pilih --</option>
                                                        <option value="Juara I">Juara I</option>
                                                        <option value="Juara II">Juara II</option>
                                                        <option value="Juara III">Juara III</option>
                                                        <option value="Juara Harapan">Juara Harapan</option>
                                                    </select>
                                                </div>
                                                <label>Tahun Lomba</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="tahun" class="form-control" placeholder="tahun lomba" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="headingSix_19">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseSix_19" aria-expanded="true" aria-controls="collapseSix_19">
                                                    <i class="material-icons">receipt</i> Informasi Penunjang
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseSix_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSix_19">
                                            <div class="panel-body">
                                                <label>Organisasi Masyarakat Orang Tua/Wali*</label>
                                                <div class="form-group form-float">                                                    
                                                    <select name="organisasi" class="form-control show-tick" required>
                                                        <option value="">-- Pilih --</option>
                                                        <option value="NU">NU</option>
                                                        <option value="Muhammadiyah">Muhammadiyah</option>
                                                        <option value="PERSIS">PERSIS</option>
                                                        <option value="Lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                                <label>Keadaan Calon Mahasiswa*</label>
                                                <div class="form-group form-float">
                                                    <select name="keadaan" class="form-control show-tick" required>
                                                        <option value="">-- Pilih --</option>
                                                        <option value="Lengkap">Lengkap</option>
                                                        <option value="Yatim">Yatim</option>
                                                        <option value="Piatu">Piatu</option>
                                                        <option value="Yatim Piatu">Yatim Piatu</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5><strong>* = WAJIB DIISI!</strong></h5>
                                    <div class="row clearfix">
                                        <div class="button-demo" align="center">
                                            <button type="submit" class="btn bg-green m-t-15 waves-effect" name="addBeasiswa">
                                                <i class="material-icons">save</i>
                                                <span><strong>SIMPAN</strong></span>
                                            </button>
                                            <h5><strong>~ Cek Terlebih Dahulu Formulir Yang Telah Diisi! ~</strong></h5>
                                        </div>
                                    </div>
                                </form>
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