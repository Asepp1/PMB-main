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
            <div class="block-header">
                <h2>EDIT PENDAFTAR</h2>
            </div>
            <div class="card">
                <div class="header">
                    <h2>EDIT PENDAFTAR</h2>
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
                                                        <?php
                                                        if ($value['formJalur'] == 'BEASISWA') {
                                                        ?>
                                                            <input name="jalur" value="Beasiswa" type="radio" id="radio_1" checked />
                                                            <label for="radio_1">Jalur Beasiswa</label>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($value['formJalur'] == 'MANDIRI') {
                                                        ?>
                                                            <input name="jalur" value="Mandiri" type="radio" id="radio_1" checked />
                                                            <label for="radio_1">Jalur Mandiri</label>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <?php
                                                if ($value['formJalur'] == 'BEASISWA') {
                                                ?>
                                                    <label>Pilih Beasiswa*</label>
                                                    <div class="form-group form-float">
                                                        <select name="beasiswa" class="form-control show-tick" required>
                                                            <option value="<?php echo $value['formBeasiswa'] ?>"><?php echo $value['formBeasiswa'] ?></option>
                                                            <option value="Prestasi Tahfidz">Beasiswa Tahfidz</option>
                                                            <option value="Prestasi Kitab Kuning">Beasiswa Kitab Kuning</option>
                                                            <option value="Prestasi Akademik">Beasiswa Prestasi Akademik</option>
                                                            <option value="Prestasi Non Akademik">Beasiswa Prestasi Non Akademik</option>
                                                            <option value="Prestasi Kelas">Beasiswa Prestasi Kelas</option>
                                                            <option value="Alumni Balekambang">Beasiswa Alumni Balekambang</option>
                                                            <option value="KIP">Beasiswa Kartu Indonesia Pintar</option>
                                                        </select>
                                                    </div>
                                                <?php
                                                }
                                                ?>
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
                                                        <option value="<?php echo $value['formProdi'] ?>"><?php echo $value['formProdi'] ?></option>
                                                        <option value="RPL">D4-Rekayasa Perangkat Lunak</option>
                                                        <option value="ABI">D4-Administrasi Bisnis Internasional</option>
                                                        <option value="AKP">D4-Akutansi Keuangan Publik</option>
                                                    </select>
                                                </div>
                                                <label>Pilih Kelas*</label>
                                                <div class="form-group form-float">
                                                    <select name="kelas" class="form-control show-tick" required>
                                                        <option value="<?php echo $value['formKelas'] ?>"><?php echo $value['formKelas'] ?></option>
                                                        <option value="Reguler">Reguler</option>
                                                        <option value="Karyawan">Karyawan</option>
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
                                                        <input type="text" class="form-control" name="nisn" placeholder="nisn" maxlength="10" minlength="10" required value="<?php echo $value['formNisn'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>NIK*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="nik" class="form-control" placeholder="nik" maxlength="16" minlength="16" required value="<?php echo $value['formNik'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Nama Lengkap*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="nama" class="form-control" placeholder="nama lengkap" value="<?php echo $value['formNama'] ?>" required autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Tempat Tanggal Lahir*</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-2">
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="text" name="tempat" class="form-control" placeholder="tempat" required value="<?php echo $value['formTptLahir'] ?>" autocomplete="off" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group form-float">
                                                            <select name="tgl" class="form-control show-tick" required>
                                                                <option value="<?php echo $value['formTglLahir'] ?>"><?php echo $value['formTglLahir'] ?></option>
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
                                                                <option value="<?php echo $value['formBlnLahir'] ?>"><?php echo $value['formBlnLahir'] ?></option>
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
                                                                <option value="<?php echo $value['formThnLahir'] ?>"><?php echo $value['formThnLahir'] ?></option>
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
                                                        <input name="jk" value="L" type="radio" id="radio_2" required <?= $value['formJk'] == 'L' ? 'checked' : '' ?> />
                                                        <label for="radio_2">Laki - Laki</label>
                                                        <input name="jk" value="P" type="radio" id="radio_3" required <?= $value['formJk'] == 'P' ? 'checked' : '' ?> />
                                                        <label for="radio_3">Perempuan</label>
                                                    </div>
                                                </div>
                                                <label>Hobi</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="hobi" class="form-control" placeholder="hobi" value="<?php echo $value['formHobi'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Cita - Cita</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="cita" class="form-control" placeholder="cita - cita" value="<?php echo $value['formCita'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Anak ke</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="anakke" class="form-control" placeholder="isi angka" value="<?php echo $value['formAnakke'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Jumlah Saudara</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="saudara" class="form-control" placeholder="isi angka" value="<?php echo $value['formSaudara'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Berat Badan</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-2">
                                                        <div class="input-group">
                                                            <div class="form-line">
                                                                <input type="text" name="berat" class="form-control" placeholder="isi angka" value="<?php echo $value['formBerat'] ?>" autocomplete="off" />
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
                                                                <input type="text" name="tinggi" class="form-control" placeholder="isi angka" value="<?php echo $value['formTinggi'] ?>" autocomplete="off" />
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
                                                        <input type="text" name="provinsi" class="form-control" placeholder="provinsi" required value="<?php echo $value['formProv'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Kabupaten*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="kabupaten" class="form-control" placeholder="kabupaten" required value="<?php echo $value['formKab'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Kecamatan*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="kecamatan" class="form-control" placeholder="kecamatan" required value="<?php echo $value['formKec'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Desa*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="desa" class="form-control" placeholder="desa" required value="<?php echo $value['formDesa'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Jl/No.Rumah/dll</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <textarea type="text" name="jalan" class="form-control" placeholder="Jl./No.Rumah/dll" autocomplete="off"><?php echo $value['formJalan'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row clearfix">
                                                    <div class="col-sm-2">
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="text" name="rt" class="form-control" placeholder="RT" required value="<?php echo $value['formRt'] ?>" autocomplete="off" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="text" name="rw" class="form-control" placeholder="RW" required value="<?php echo $value['formRw'] ?>" autocomplete="off" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="text" name="kodepos" class="form-control" placeholder="Kode Pos" maxlength="5" minlength="5" required value="<?php echo $value['formKodepos'] ?>" autocomplete="off" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Handphone/WA*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="hp" class="form-control" placeholder="handphone/wa" required value="<?php echo $value['formHp'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Alamat Email*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="email" class="form-control" value="<?php echo $value['formEmail'] ?>" required autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Asal Sekolah*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="asalSekolah" class="form-control" placeholder="asal sekolah" required value="<?php echo $value['formAsalSekolah'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>No. SKHUN</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="skhun" class="form-control" placeholder="no. skhun" value="<?php echo $value['formSkhun'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Tahun Lulus*</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-3">
                                                        <div class="form-group form-float">
                                                            <select name="tahunLulus" class="form-control show-tick" required>
                                                                <option value="<?php echo $value['formTahunLulus'] ?>"><?php echo $value['formTahunLulus'] ?></option>
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
                                                        <input type="text" name="kk" class="form-control" placeholder="nomor kk" maxlength="16" minlength="16" required value="<?php echo $value['formKkAyah'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <br></br>
                                                <label>NIK Ayah*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="nikAyah" class="form-control" placeholder="nik ayah" maxlength="16" minlength="16" required value="<?php echo $value['formNikAyah'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Nama Ayah*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="ayah" class="form-control" placeholder="nama ayah" required value="<?php echo $value['formNamaAyah'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Pekerjaan Ayah*</label>
                                                <div class="form-group form-float">
                                                    <select name="pekerjaanAyah" class="form-control show-tick" required>
                                                        <option value="<?php echo $value['formPekerjaanA'] ?>"><?php echo $value['formPekerjaanA'] ?></option>
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
                                                        <option value="<?php echo $value['formPendidikanA'] ?>"><?php echo $value['formPendidikanA'] ?></option>
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
                                                        <input type="text" name="nikIbu" class="form-control" placeholder="nik ibu" maxlength="16" minlength="16" required value="<?php echo $value['formNikIbu'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Nama Ibu*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="ibu" class="form-control" placeholder="nama ibu" required value="<?php echo $value['formNamaIbu'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Pekerjaan Ibu*</label>
                                                <div class="form-group form-float">
                                                    <select name="pekerjaanIbu" class="form-control show-tick" required>
                                                        <option value="<?php echo $value['formPekerjaanI'] ?>"><?php echo $value['formPekerjaanI'] ?></option>
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
                                                        <option value="<?php echo $value['formPendidikanI'] ?>"><?php echo $value['formPendidikanI'] ?></option>
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
                                                        <option value="<?php echo $value['formPenghasilan'] ?>"><?php echo $value['formPenghasilan'] ?></option>
                                                        <option value="< 500.000">
                                                            < 500.000</option>
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
                                                        <input type="text" name="lomba" class="form-control" placeholder="cabang lomba" value="<?php echo $value['formLomba'] ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <label>Tingkat Lomba</label>
                                                <div class="form-group form-float">
                                                    <select name="tingkat" class="form-control show-tick">
                                                        <option value="<?php echo $value['formTingkat'] ?>"><?php echo $value['formTingkat'] ?></option>
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
                                                        <option value="<?php echo $value['formPeringkat'] ?>"><?php echo $value['formPeringkat'] ?></option>
                                                        <option value="Juara I">Juara I</option>
                                                        <option value="Juara II">Juara II</option>
                                                        <option value="Juara III">Juara III</option>
                                                        <option value="Juara Harapan">Juara Harapan</option>
                                                    </select>
                                                </div>
                                                <label>Tahun Lomba</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="tahun" class="form-control" placeholder="tahun lomba" value="<?php echo $value['formTahun'] ?>" autocomplete="off" />
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
                                                        <option value="<?php echo $value['formOrganisasi'] ?>"><?php echo $value['formOrganisasi'] ?></option>
                                                        <option value="NU">NU</option>
                                                        <option value="Muhammadiyah">Muhammadiyah</option>
                                                        <option value="PERSIS">PERSIS</option>
                                                        <option value="Lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                                <label>Keadaan Calon Mahasiswa*</label>
                                                <div class="form-group form-float">
                                                    <select name="keadaan" class="form-control show-tick" required>
                                                        <option value="<?php echo $value['formKeadaan'] ?>"><?php echo $value['formKeadaan'] ?></option>
                                                        <option value="Lengkap">Lengkap</option>
                                                        <option value="Yatim">Yatim</option>
                                                        <option value="Piatu">Piatu</option>
                                                        <option value="Yatim Piatu">Yatim Piatu</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="headingSeven_19">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseSeven_19" aria-expanded="true" aria-controls="collapseSeven_19">
                                                    <i class="material-icons">attach_file</i> Berkas Pendaftar
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseSeven_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSeven_19">
                                            <div class="panel-body">
                                                <label>Upload KTP Calon Mahasiswa*</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <iframe id="ktpDisplay" onclick="ktpClick()" src="<?= !empty($value['formKtp']) ? base_url('../assets/files/ktp/' . $value['formKtp'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                                            <input id="ktpFile" type="file" name="ktp" onchange="displayKtp(this)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Upload Akta Kelahiran*</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <iframe id="aktaDisplay" onclick="aktaClick()" src="<?= !empty($value['formAkta']) ? base_url('../assets/files/akta/' . $value['formAkta'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                                            <input id="aktaFile" type="file" name="akta" onchange="displayAkta(this)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Upload Kartu Keluarga*</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <iframe id="kkDisplay" onclick="kkClick()" src="<?= !empty($value['formKk']) ? base_url('../assets/files/kk/' . $value['formKk'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                                            <input id="kkFile" type="file" name="kk" onchange="displayKk(this)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Upload Ijazah Terakhir*</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <iframe id="ijazahDisplay" onclick="ijazahClick()" src="<?= !empty($value['formIjazah']) ? base_url('../assets/files/ijazah/' . $value['formIjazah'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                                            <input id="ijazahFile" type="file" name="ijazah" onchange="displayIjazah(this)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Upload Foto Berwarna Terbaru Memakai Seragam*</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <iframe id="fotoDisplay" onclick="fotoClick()" src="<?= !empty($value['formFoto']) ? base_url('../assets/files/foto/' . $value['formFoto'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                                            <input id="fotoFile" type="file" name="foto" onchange="displayFoto(this)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Upload SKTM</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <iframe id="sktmDisplay" onclick="sktmClick()" src="<?= !empty($value['formSktm']) ? base_url('../assets/files/sktm/' . $value['formSktm'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                                            <input id="sktmFile" type="file" name="sktm" onchange="displaySktm(this)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Upload KIP</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <iframe id="kipDisplay" onclick="kipClick()" src="<?= !empty($value['formKip']) ? base_url('../assets/files/kip/' . $value['formKip'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                                            <input id="kipFile" type="file" name="kip" onchange="displayKip(this)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Upload PKH</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <iframe id="pkhDisplay" onclick="pkhClick()" src="<?= !empty($value['formPkh']) ? base_url('../assets/files/pkh/' . $value['formPkh'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                                            <input id="pkhFile" type="file" name="pkh" onchange="displayPkh(this)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Upload KKS</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <iframe id="kksDisplay" onclick="kksClick()" src="<?= !empty($value['formKks']) ? base_url('../assets/files/kks/' . $value['formKks'] . '"') : base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                                            <input id="kksFile" type="file" name="kks" onchange="displayKks(this)">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="headingEight_19">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseEight_19" aria-expanded="true" aria-controls="collapseEight_19">
                                                    <i class="material-icons">attach_money</i> Bukti Pembayaran
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseEight_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingEight_19">
                                            <div class="panel-body">
                                                <label>Upload Bukti Pembayaran*</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <iframe id="buktiDisplay" onclick="buktiClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                                            <input id="buktiFile" type="file" name="bukti" onchange="displayBukti(this)">
                                                        </div>
                                                    </div>
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
                                            <h5><strong>~ Cek Terlebih Dahulu Data Yang Telah Diisi! ~</strong></h5>
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
    <script src="<?php echo base_url('../assets/js/display.js') ?>"></script>
</body>

</html>