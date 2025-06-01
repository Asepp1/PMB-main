import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import './assets/vendor/icofont/icofont.min.css';
import './assets/vendor/boxicons/css/boxicons.min.css';
import './assets/vendor/animate.css/animate.min.css';
import './assets/vendor/owl.carousel/assets/owl.carousel.min.css';
import './assets/vendor/venobox/venobox.css';
import './assets/vendor/aos/aos.css';
import './assets/css/style.css';

const HomePage = () => {
  const menus = [
    { menusUrl: 'beranda', menusName: 'Beranda' },
    { menusUrl: 'tentang', menusName: 'Tentang' },
    { menusUrl: 'panduan', menusName: 'Panduan' },
    { menusUrl: 'kontak', menusName: 'Kontak' },
  ];

  const isLoggedIn = false; // Ganti dengan context/auth check

  return (
    <>
      <div id="topbar" className="d-none d-lg-flex align-items-center fixed-top">
        <div className="container d-flex align-items-center justify-content-between">
          <div className="d-flex align-items-center">
            <i className="icofont-clock-time"></i> Senin - Ahad, 08.00 - 15.00 WIB
          </div>
          <div className="d-flex align-items-center">
            <i className="icofont-phone"></i> Hubungi Kami +62 856-4111-1267
          </div>
        </div>
      </div>

      <header id="header" className="fixed-top">
        <div className="container d-flex align-items-center">
          <a href="/" className="logo mr-auto">
            <img src="/assets/images/log6o.png" alt="Logo" />
          </a>

          <nav className="nav-menu d-none d-lg-block">
            <ul>
              {menus.map((menu, index) => (
                <li key={index}><a href={`#${menu.menusUrl}`}>{menu.menusName}</a></li>
              ))}
            </ul>
          </nav>

          {isLoggedIn ? (
            <a className="appointment-btn scrollto" href="/logout">Logout</a>
          ) : (
            <a className="appointment-btn scrollto" href="/login">Masuk</a>
          )}
        </div>
      </header>
    </>
  );
};

export default HomePage;
