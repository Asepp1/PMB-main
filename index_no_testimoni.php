<?php
require_once 'config/connect.sample.php';
require_once 'config/function.php';
require_once 'progres/menuProgres.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>PMB | UNPER/title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="<?php echo base_url('assets/images/favicon Unper.png') ?>" rel="icon">
    <link href="<?php echo base_url('assets/images/favicon Unper.png') ?>" rel="favicon Unper">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/icofont/icofont.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/animate.css/animate.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/owl.carousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/venobox/venobox.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/aos/aos.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="icofont-clock-time"></i> Senin - sabtu, 08.00 - 15.00 WIB
            </div>
            <div class="d-flex align-items-center">
                <i class="icofont-phone"></i> Hubungi Kami +62 812-2260-7505
            </div>
        </div>
    </div>
    <!-- ======= Menu ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <a href="<?php echo base_url() ?>" class="logo mr-auto">
                <img src="<?php echo base_url('assets/images/favicon Unper.png') ?>">
            </a>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <?php
                    foreach ($menus as $menu) {
                    ?>
                        <li><a href="#<?php echo $menu['menusUrl'] ?>"><?php echo $menu['menusName'] ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
            <?php
            if (isset($_SESSION['useremail']) || isset($_SESSION['useruid'])) {
            ?>
                <a class="appointment-btn scrollto" href="<?php echo base_url('dashboard') ?>"><b>HOME</b></a>
            <?php
            } else {
            ?>
                <a class="appointment-btn scrollto" href="<?php echo base_url('auth') ?>"><b>LOGIN</b></a>
                <a class="appointment-btn scrollto" href="<?php echo base_url('auth') ?>"><b>LOGIN ADMIN</b></a>
            <?php
            }
            ?>
        </div>
    </header>
    <!-- ======= Gambabar Sliding Fakultas ======= -->
    <section id="hero">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="background-image: url(<?php echo base_url('assets/images/slide/slide-1.jpg') ?>)"></div>
                <div class="carousel-item" style="background-image: url(<?php echo base_url('assets/images/slide/slide-2.jpg') ?>)"></div>
                <div class="carousel-item" style="background-image: url(<?php echo base_url('assets/images/slide/slide-3.png') ?>)"></div>
            </div>
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <main id="main">
        <!-- ======= Visi Misi ======= -->
        <section id="visi_misi" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Visi dan Misi</h2><br>
                </div>
                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right">
                        <img src="<?php echo base_url('assets/images/visi/about.png') ?>" class="img-fluid">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
                        <h3>Visi</h3>
                        <p class="font-italic">DENGAN UBAH BERBASIS KEARIFAN LOKAL UNIVERSITAS PERJUANGAN TASIKMALAYA UNGGUL DALAM PENYELENGGARAAN TRI DHARMA PERGURUAN TINGGI BERKARAKTER KEJUANGAN TAHUN 2035 PADA TINGKAT NASIONAL</p>
                        <h3>Misi</h3>
                        <ol>
                        Menyelenggarakan program pendidikan berbasis kearifan lokal secara kondusif, disiplin, jujur dan kreatif dalam membentuk lulusan yang memiliki pengetahuan, keterampilan, dan sikap kejuangan yang sesuai dengan bidang ilmu yang dikajinya.
    Melaksanakan program penelitian ilmiah berbasis kearifan lokal dengan menerapkan prinsip kejujuran, kecermatan, dan kemanfaatan dalam membentuk lulusan yang mampu melaksanakan penelitian sesuai dengan bidang ilmu dan etika ilmiah yang berlaku.
    Melakukan program pengabdian kepada masyarakat berbasis kearifan lokal dengan penuh tanggungjawab dan sungguh – sungguh, sehingga terbentuk lulusan yang suka dan bisa menyebarluaskan pengetahuan, keterampilan, dan temuan-temuan ilmiah yang dipelajarinya untuk kesejahteraan masyarakat.
    Menciptakan suasana lingkungan kehidupan akademik yang sehat, dinamis, kreatif dalam membentuk lulusan berkarakter kejuangan secara optimal
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======= Panduan Pendaftaran ======= -->
        <section id="panduan" class="featured-services">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Panduan Pendaftaran</h2><br>
                    <p>Pendaftaran mahasiswa baru UNIVERSITAS PERJUANGAN dapat mengikuti alur berikut:</p>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <img src="<?php echo base_url('assets/images/panduan/tahap1.png') ?>" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-3 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <img src="<?php echo base_url('assets/images/panduan/tahap2.png') ?>" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <img src="<?php echo base_url('assets/images/panduan/tahap3.png') ?>" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <img src="<?php echo base_url('assets/images/panduan/tahap4.png') ?>" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-3 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <img src="<?php echo base_url('assets/images/panduan/tahap5.png') ?>" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <img src="<?php echo base_url('assets/images/panduan/tahap6.png') ?>" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======= Beasiswa ======= -->
        <section id="beasiswa" class="counts">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Beasiswa Kuliah</h2><br>
                    <p>Bagi Lulusan SMA/MA/SMK yang masih pusing cari kuliah/kerja? Yuk gabung bersama kami di UNIVERSITAS PERJUANGAN
                        <b>
                            <h6>buruan ambil <u>KESEMPATAN EMAS</u> ini</h6>
                        </b>
                    </p>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
                        
                    </div>
                    <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="icofont-read-book"></i>
                          
                        
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="icofont-brainstorming"></i>
                            <span>
                                <h4>Beasiswa Prestasi Akademik</h4>
                            </span>
                            <p>Bagi kalian yang memiliki Prestasi Akademik pada tingkat berikut :<br></br>
                                <strong>KABUPATEN GRATIS 1 SEMESTER</strong><br>
                                <strong>PROVINSI GRATIS 2 SEMESTER</strong><br>
                                <strong>NASIONAL GRATIS 4 SEMESTER</strong><br></br>
                                (dibuktikan dengan piagam kejuaraan asli)
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="icofont-medal"></i>
                            <span>
                                <h4>Beasiswa Prestasi Non Akademik</h4>
                            </span>
                            <p>Bagi kalian yang memiliki Prestasi Non Akademik pada tingkat berikut :<br></br>
                                <strong>KABUPATEN GRATIS 1 SEMESTER</strong><br>
                                <strong>PROVINSI GRATIS 2 SEMESTER</strong><br>
                                <strong>NASIONAL GRATIS 4 SEMESTER</strong><br></br>
                                (dibuktikan dengan piagam kejuaraan asli)
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="icofont-certificate-alt-1"></i>
                            <span>
                                <h4>Beasiswa Prestasi Kelas</h4>
                            </span>
                            <p>Bagi kalian yang memiliki Rangking Pararel<br></br>
                                <strong>RANGKING 1 GRATIS 4 SEMESTER</strong><br>
                                <strong>RANGKING 2 GRATIS 2 SEMESTER</strong><br>
                                <strong>RANGKING 3 GRATIS 1 SEMESTER</strong><br></br>
                                (dibuktikan dengan Raport Asli & Surat Keterangan dari sekolah)
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="icofont-graduate-alt"></i>
                            <span>
                                <h4>Alumni Balekambang</h4>
                            </span>
                            <p>Bagi alumni Balekambang yang memiliki <strong>RANGKING 1/2/3 PARAREL GRATIS 8 SEMESTER</strong> selain kategori diatas <strong>GRATIS 1 SEMESTER</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="cta">
            <div class="buat_akun" data-aos="zoom-in">
                <div class="text-center">
                    <h3>Tersedia juga beasiswa KIP - Kuliah</h3>
                    <a class="cta-btn scrollto" href="https://kip-kuliah.kemdikbud.go.id/">KIP - Kuliah</a>
                </div>
            </div>
        </section>
        <!-- ======= Program Studi ======= -->
        <section id="prodi" class="departments">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Progam Studi</h2><br>
                    <p>Program studi yang dimiliki Fakultas Teknik Universitas Perjuangan</p>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" href="#tab-1">
                                    <h4>Teknik Informatika</h4>
                                    <p>Lulusan Prodi RPL merupakan Sarjana Komputer (S.Kom.)</p>
                                </a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link" data-toggle="tab" href="#tab-2">
                                    <h4>Teknik Sipil</h4>
                                    <p>Lulusan Prodi Teknik Sipil Merupakan Sarjana Teknik (S.T) </p>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======= Biaya Perkuliahan ======= -->
        <section id="biaya" class="pricing">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Biaya Pendaftaran</h2><br>
                    <p>Tabel biaya registrasi awal setelah calon mahasiswa dinyatakan lulus sesuai jalur yang dipilih</p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="box featured" data-aos="fade-up" data-aos-delay="100">
                            <h3>Kelas Reguler</h3>
                            <h4><sup>Rp. </sup>4.550.000</h4>
                            <ul>
                                <li>Sumbangan Pengembangan Institusi<br>(Rp. 1.500.000)</li>
                                <li>Biaya Perkuliahan/Semester<br>(Rp. 2.500.000)</li>
                                <li>Jas Almamater<br>(Rp. 200.000)</li>
                                <li>PKKMBk<br>(Rp. 250.000)</li>
                                <li>Kaos PBN<br>(Rp. 100.000)</li>
                                <li class="na">Biaya Operasional/Bulan<br>(Rp. 600.000)</li>
                                
                                
                            </ul>
                            <div class="btn-wrap">
                                <a href="<?php echo base_url('proof') ?>" class="btn-buy">Registrasi</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="box featured" data-aos="fade-up" data-aos-delay="200">
                            <h3>Kelas Karyawan</h3>
                            <h4><sup>Rp. </sup>5.050.000</h4>
                            <ul>
                                <li>Sumbangan Pengembangan Institusi<br>(Rp. 1.500.000)</li>
                                <li>Biaya Perkuliahan/Semester<br>(Rp. 3.000.000)</li>
                                <li>Jas Almamater<br>(Rp. 200.000)</li>
                                <li>PKKMB<br>(Rp. 250.000)</li>
                                <li>Kaos PBN<br>(Rp. 100.000)</li>
                                <li class="na">Biaya Operasional/Bulan<br>(Rp. 600.000)</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="<?php echo base_url('proof') ?>" class="btn-buy">Registrasi</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="box featured" data-aos="fade-up" data-aos-delay="300">
                            <h3>Kelas Reguler </h3>
                            <h4><sup>Rp. </sup>5.870.000</h4>
                            <ul>
                                <li>Sumbangan Pengembangan Institusi<br>(Rp. 1.500.000)</li>
                                <li>Biaya Perkuliahan/Semester<br>(Rp. 2.500.000)</li>
                                <li>Jas Almamater<br>(Rp. 200.000)</li>
                                <li>PKKMB<br>(Rp. 250.000)</li>
                                <li>Kaos PBN<br>(Rp. 100.000)</li>
                                <li>Biaya Operasional/Bulan<br>(Rp. 600.000)</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="<?php echo base_url('proof') ?>" class="btn-buy">Registrasi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======= Buat Akun ======= -->
        <section id="akun" class="cta">
            <div class="buat_akun" data-aos="zoom-in">
                <div class="text-center">
                    <h3>Belum Punya Akun?</h3>
                    <a class="cta-btn scrollto" href="<?php echo base_url('auth/register.php') ?>">Buat Akun</a>
                </div>
            </div>
        </section>
        <!-- ======= Fasilitas ======= -->
        <section id="fasilitas" class="doctors section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Fasilitas</h2><br>
                    <p>Fasilitas-faslitas pendukung Pembelajaran di Universitas Perjuangan</p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="<?php echo base_url('assets/images/fasilitas/gedung.jpg') ?>" class="img-fluid">
                            </div>
                            <div class="member-info">
                                <h4>Gedung Utama</h4>
                                <span>Gedung Pembelajaran</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="200">
                            <div class="member-img">
                                <img src="<?php echo base_url('assets/images/fasilitas/aula.jpg') ?>" class="img-fluid">
                            </div>
                            <div class="member-info">
                                <h4>Aula</h4>
                                <span>Gedung Serba Guna</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="400">
                            <div class="member-img">
                                <img src="<?php echo base_url('assets/images/fasilitas/lab1.png') ?>" class="img-fluid">
                            </div>
                            <div class="member-info">
                                <h4>Lab Komputer</h4>
                                <span>Laboratorium Komputer k</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="500">
                            <div class="member-img">
                                <img src="<?php echo base_url('assets/images/fasilitas/lab2.jpeg') ?>" class="img-fluid">
                            </div>
                            <div class="member-info">
                                <h4>Labaratorium Teknik Sipil</h4>
                                <span>Laboratorium Teknik Sipil</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="600">
                            <div class="member-img">
                                <img src="<?php echo base_url('assets/images/fasilitas/kelas.jpeg') ?>" class="img-fluid">
                            </div>
                            <div class="member-info">
                                <h4>Ruang Perkuliahan</h4>
                                <span>Ruangan Belajar Mengajar</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="600">
                            <div class="member-img">
                                <img src="<?php echo base_url('assets/images/fasilitas/image.jpg') ?>" class="img-fluid">
                            </div>
                            <div class="member-info">
                                <h4>Ruang Perpustakaan</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="600">
                            <div class="member-img">
                                <img src="<?php echo base_url('assets/images/fasilitas/image.jpg') ?>" class="img-fluid">
                            </div>
                            <div class="member-info">
                                <h4>.....</h4>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>

       
     <!-- ======= info ======= -->
        <section id="info" class="contact">
            <div class="container">
                <div class="section-title">
                    <h2>Kontak</h2><br>
                    
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="info-box">
                            <h3>Alamat</h3>
                            <p>Jl. Peta No.177, Kahuripan, Kec. Tawang, Kab. Tasikmalaya, Jawa Barat 46115</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box mt-4">
                            <a href="https://www.polibang.ac.id/" class="youtube"><i class="bx bx-world"></i></a>
                            <h3>Website</h3>
                            <strong>
                                <p><a href="https://pmb-unper">www.pmb.unper</a></p>
                            </strong>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box mt-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email</h3>
                            <strong>
                                <p>pmb@unper.ac.id</p>
                            </strong>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box mt-4">
                            <a href="https://www.youtube.com/channel/UCpqNI0TmjPTDbIg9H83d99g" class="youtube"><i class="bx bxl-youtube"></i></a>
                            <a href="https://www.facebook.com/politbang/" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="https://www.instagram.com/politeknikbalekambang/" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="https://www.tiktok.com/@polibangjepara" class="instagram"><i class="bx bxs-music"></i></a>
                            <h3>Sosial Media</h3>
                            <strong>
                                <p>Universitas Perjuangan</p>
                            </strong>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="info-box mt-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Kontak Kami</h3>
                            <strong>
                                <p>+62 856-4111-9898 (Ryan G)</p>
                                <p>+62 856-4111-9999 (Asep N)</p>
                                <p>+62 857-4252-777 (Rizal M)</p>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>UNIVERISTAS PERJUANGAN</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <b><a href="<?php echo base_url() ?>">PMB | UNPER</a></b>
            </div>
        </div>
    </footer>
    <div id="preloader"></div>
    <a class="back-to-top"><i class="icofont-simple-up"></i></a>
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery.easing/jquery.easing.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/waypoints/jquery.waypoints.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/counterup/counterup.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/owl.carousel/owl.carousel.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/venobox/venobox.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/aos/aos.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js') ?>"></script>
</body>

</html>