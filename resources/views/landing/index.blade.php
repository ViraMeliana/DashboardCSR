@extends('layouts/landing/landing')

@section('content')
    <section class="banner-section style-2">
        <div class="banner-area">
            <div class="left-side">
                <div class="section-wrapper">
                    <div class="banner-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide slide-1"
                                 style="background: url({{asset('images/banner/03.jpg')}});"></div>
                            <div class="swiper-slide slide-2"
                                 style="background: url({{asset('images/banner/02.jpg')}});"></div>
                            <div class="swiper-slide slide-3"
                                 style="background: url({{asset('images/banner/01.jpg')}});"></div>
                        </div>
                        <div class="banner-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="right-side">
                <div class="content-part">
                    <div class="section-header style-2">
                        <div class="banner-price">
                            <p>Informasi</p>
                            <span>CSR</span>
                        </div>
                        <h2><span>Corporate</span></h2>
                        <h2><span>Social Responsibility</span></h2>
                        <h2>Semen Indonesia</h2>

                        <div class="button-group">
                            <a href="#" class="lab-btn"><span>Tambah Aktivitas</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section style-5 padding-tb">
        <div class="container">
            <div class="section-header">
                <h2>Tujuan Strategis</h2>
                <p>Mengelola CSR yang berfokus pada perlindungan lingkungan dan tanggung jawab sosial berkelanjutan</p>
            </div>
            <div class="section-wrapper">
                <div class="lab-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                    <div class="lab-inner">
                        <div class="lab-content">
                            <h4>Tanggung Jawab</h4>
                            <p>Mencapai posisi sebagai perusahaan yang beretika & bertanggung jawab</p>
                        </div>
                    </div>
                </div>
                <div class="lab-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                    <div class="lab-inner">
                        <div class="lab-content">
                            <h4>Kontribusi</h4>
                            <p>Memberikan kontribusi nyata bagi kesejahteraan masyarakat dan kepeduliac lingkungan yang
                                tinggi</p>
                        </div>
                    </div>
                </div>
                <div class="lab-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                    <div class="lab-inner">
                        <div class="lab-content">
                            <h4>Stakeholder</h4>
                            <p>Memperoleh dukungan stakeholder & lingkungan untuk kelancaran operasional perusahaan
                                (Social License to Operate).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shopapp-manager bgc-1 padding-tb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-12">
                    <div class="lab-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                        <img src="{{asset('images/banner/home.jpg')}}" alt="lab-shopapp">
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="lab-content">
                        <h2>Landasan Hukum</h2>
                        <p>Pada dasarnya pelaksanaan pengembangan masyarakat di Indonesia didukung oleh beberapa
                            peraturan yang saling berkaitan satu dengan yang lain. Peraturan ini dapat dijadikan
                            panduan ataupun justifikasi dalam mengimplementasikan program pemberdayaan masyarakat.</p>
                        <ul>
                            <li><i class="icofont-tick-mark"></i>UU No.19 Tahun 2003 tentang Badan Usaha Milik Negara.
                            </li>
                            <li><i class="icofont-tick-mark"></i>UU No.40 Tahun 2007 Tentang Perseroan Terbatas.</li>
                            <li><i class="icofont-tick-mark"></i>Peraturan Pemerintah No. 47 Tahun 2012 tentang</li>
                            Tanggung Jawab Sosial dan Lingkungan Perseroan Terbatas.
                            <li><i class="icofont-tick-mark"></i>Peraturan Menteri Negara BUMN No. PER-03/MBU/12.2016
                            </li>
                            Tentang Perubahan Atas Peraturan Menteri BUMN No. PER-09/MBU/07/2015 tentang Program
                            Kemitraan dan Program Bina Lingkungan Badan Usaha Milik Negara.
                            <li><i class="icofont-tick-mark"></i>Anggaran Dasar PT Semen Gresik yang terakhir dengan
                                Akta
                            </li>
                            No.121 tanggal 27 April 2016, dibuat oleh Notaris Dr.Slamet Wahjudi, SH.M.Kn.
                            <li><i class="icofont-tick-mark"></i>SK Direksi PT Semen Gresik Nomor
                                010/Kpts/Dir/PTSG/02.2018
                            </li>
                            tentang Struktur Organisasi Perusahaan.
                            <li><i class="icofont-tick-mark"></i>ISO 26000 SR : 2010 Guidance on Social
                                Responsibility/Core-Subjects.
                            </li>
                        </ul>
                        <a href="{{route('landing.about')}}" class="lab-btn"><span>Lihat Aktivitas CSR</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
