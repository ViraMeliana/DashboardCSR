@extends('layouts/landing/landing')

@section('content')

    <section class="about-section style-2 style-3 style-4 padding-tb">
        <div class="container">
            <div class="section-header">
                <span>Realisasi CSR Semen Indonesia</span>
                <h2>Harmonisasi Sumber Daya, Nilai, Budaya dan Kode Etik</h2>
            </div>
            <div class="section-wrapper">
                <div class="lab-item col-md-3">
                    <div class="lab-inner">
                        <div class="lab-thumb">
                            <img src="{{asset('landing-assets/images/about/2.png')}}" alt="lab-thumb">
                        </div>
                        <div class="lab-content">
                            <h4>Lingkungan</h4>
                            <p>Pengelolaan sumberdaya alam dan lingkungan yang berkelanjutan sebagai penyangga seluruh kehidupan</p>
                        </div>
                    </div>
                </div>
                <div class="lab-item col-md-3">
                    <div class="lab-inner">
                        <div class="lab-thumb">
                            <img src="{{asset('landing-assets/images/about/4.png')}}" alt="lab-thumb">
                        </div>
                        <div class="lab-content">
                            <h4>Sosial</h4>
                            <p>Pemenuhan hak dasar manusia yang berkualitas secara adil dan setara</p>
                        </div>
                    </div>
                </div>
                <div class="lab-item col-md-3">
                    <div class="lab-inner">
                        <div class="lab-thumb">
                            <img src="{{asset('landing-assets/images/about/1.png')}}" alt="lab-thumb">
                        </div>
                        <div class="lab-content">
                            <h4>Ekonomi</h4>
                            <p>Pertumbuhan ekonomi berkualitas melalui keberlanjutan peluang kerja dan usaha</p>
                        </div>
                    </div>
                </div>
                <div class="lab-item col-md-3">
                    <div class="lab-inner">
                        <div class="lab-thumb">
                            <img src="{{asset('landing-assets/images/about/3.png')}}" alt="lab-thumb">
                        </div>
                        <div class="lab-content">
                            <h4>Hukum dan Tata Kelola</h4>
                            <p>Kepastian hukum dan tata kelola yang efektif, transparan, akuntabel dan partisipatif</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="market-range-section padding-tb">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12">
                        <div class="mr-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                            <img src="{{asset('images/banner/02.jpg')}}" alt="mr-thumb">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="section-header style-2">
                            <span>Visi Misi CSR SIG</span>
                            <h3>Visi</h3>
                            <p>Menjadi pengelola CSR yang berfokus pada perlindungan lingkungan dan tanggung jawab social yang berkelanjutan,sehingga memberikan nilai tambah bagi pembangku kepentingan.</p>
                        </div>
                        <div class="section-wrapper">
                            <h3>Misi</h3>
                            <div class="skill-bar-wrapper">
                                <div class="skill-item">
                                    <div class="skill-title">
                                        <div class="left">Menjalankan program CSR berdasarkan pada prinsip harmonisasi triple line (Profit,Planet, People) dan SDGs Concept.</div>
                                    </div>
                                    <div class="skillbar-container clearfix" data-percent="85%">
                                        <div class="skills" style="background: linear-gradient(to top, #23cc88, #8ecf35);"></div>
                                    </div>
                                </div>
                                <div class="skill-item">
                                    <div class="skill-title">
                                        <div class="left">Mewujudkan pengelolaan CSR menuju Good Corporate Citizen.</div>
                                    </div>
                                    <div class="skillbar-container clearfix" data-percent="70%">
                                        <div class="skills" style="background: linear-gradient(to top, #ff4f58, #ffb400);"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-area">
                <div class="section-wrapper">
                    <div class="contact-count-item">
                        <div class="contact-count-inner">
                            <div class="contact-count-content">
                                <h5 style="color: #fb4f6b;"><span class="counter">370</span>+</h5>
                                <p>UMKM</p>
                            </div>
                        </div>
                    </div>
                    <div class="contact-count-item">
                        <div class="contact-count-inner">
                            <div class="contact-count-content">
                                <h5 style="color: #ffb400;"><span class="counter">348</span></h5>
                                <p>Mitra Binaan</p>
                            </div>
                        </div>
                    </div>
                    <div class="contact-count-item">
                        <div class="contact-count-inner">
                            <div class="contact-count-content">
                                <h5 style="color: #c961fa;"><span class="counter">25</span>+</h5>
                                <p>Daerah Binaan</p>
                            </div>
                        </div>
                    </div>
                    <div class="contact-count-item">
                        <div class="contact-count-inner">
                            <div class="contact-count-content">
                                <h5 style="color: #38cd78;"><span class="counter">24</span>K +</h5>
                                <p>Klien</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
