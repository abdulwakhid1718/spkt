@extends('user.layout.app')

@section('main')
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="hero-bg">
            <img src="{{ asset('assets/img/hero-bg-light.webp') }}')}}" alt="" />
        </div>
        <div class="container text-center">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1 data-aos="fade-up">Surat <span>Kehilangan</span></h1>
                <p data-aos="fade-up" data-aos-delay="100">
                    Website Penampungan Laporan untuk Surat Kehilangan Secara Online
                    Polsek Kamal.<br />
                </p>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <a href="/pelaporan/create" class="btn-get-started"><i class="bi bi-telephone"></i> Buat Laporan</a>
                </div>
                <img src="{{ asset('assets/img/hero-services-img.webp') }}" class="img-fluid hero-img" alt=""
                    data-aos="zoom-out" data-aos-delay="300" />
            </div>
        </div>
    </section>
    <!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0">
                            <i class="bi bi-lightning"></i>
                        </div>
                        <div>
                            <h4 class="title">
                                <a href="#" class="stretched-link">Proses Cepat</a>
                            </h4>
                            <p class="description">Prosesnya Cepat dan Mudah</p>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0">
                            <i class="bi bi-briefcase"></i>
                        </div>
                        <div>
                            <h4 class="title">
                                <a href="#" class="stretched-link">500+ Laporan</a>
                            </h4>
                            <p class="description">
                                Sudah menangangi lebih dari 500 laporan masyarakat Kamal
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0">
                            <i class="bi bi-bar-chart"></i>
                        </div>
                        <div>
                            <h4 class="title">
                                <a href="#" class="stretched-link">Gratis</a>
                            </h4>
                            <p class="description">Layanan Gratis Tanpa dipungut biaya</p>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->
            </div>
        </div>
    </section>
    <!-- /Featured Services Section -->

    <!-- About Section -->
    {{-- <section id="about" class="about section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <p class="who-we-are">Who We Are</p>
                    <h3>Unleashing Potential with Creative Strategy</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <ul>
                        <li>
                            <i class="bi bi-check-circle"></i>
                            <span>Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle"></i>
                            <span>Duis aute irure dolor in reprehenderit in voluptate
                                velit.</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle"></i>
                            <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate trideta
                                storacalaperda mastiro dolore eu fugiat nulla
                                pariatur.</span>
                        </li>
                    </ul>
                    <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <img src="{{ asset('assets/img/about-company-1.jpg') }}" class="img-fluid" alt="" />
                        </div>
                        <div class="col-lg-6">
                            <div class="row gy-4">
                                <div class="col-lg-12">
                                    <img src="{{ asset('assets/img/about-company-2.jpg') }}" class="img-fluid"
                                        alt="" />
                                </div>
                                <div class="col-lg-12">
                                    <img src="{{ asset('assets/img/about-company-3.jpg') }}" class="img-fluid"
                                        alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- /About Section -->

    <!-- Services Section -->
    <section id="services" class="services section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Syarat Kehilangan</h2>
            <p>Syarat laporan kehilangan</p>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="row g-5">
                @foreach ($dokumens as $dokumen)
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item item-cyan position-relative">
                            <img class="img-service" src="{{ asset('assets/img/' . $dokumen->logo_dokumen) }}"
                                alt="" />
                            <div class="">
                                <h5>Kehilangan {{ $dokumen->nama_dokumen }}</h5>
                                @if (is_array(json_decode($dokumen->dokumen_persyaratan, true)))
                                    @foreach (json_decode($dokumen->dokumen_persyaratan, true) as $syarat)
                                        <div class="syarat-dokumen">
                                            <i class="bi bi-patch-check-fill"></i>
                                            {{ $syarat }}
                                        </div>
                                    @endforeach
                                @else
                                    <div class="syarat-dokumen">
                                        <i class="bi bi-patch-check-fill"></i>
                                        Tidak ada persyaratan yang ditemukan.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Services Section -->

    <!-- Faq Section -->
    {{-- <section id="faq" class="faq section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Frequently Asked Questions</h2>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
                    <div class="faq-container">
                        <div class="faq-item faq-active">
                            <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                            <div class="faq-content">
                                <p>
                                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna
                                    id volutpat lacus laoreet non curabitur gravida. Venenatis
                                    lectus magna fringilla urna porttitor rhoncus dolor purus
                                    non.
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
                            <div class="faq-content">
                                <p>
                                    Dolor sit amet consectetur adipiscing elit pellentesque
                                    habitant morbi. Id interdum velit laoreet id donec
                                    ultrices. Fringilla phasellus faucibus scelerisque
                                    eleifend donec pretium. Est pellentesque elit ullamcorper
                                    dignissim. Mauris ultrices eros in cursus turpis massa
                                    tincidunt dui.
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->

                        <div class="faq-item">
                            <h3>
                                Dolor sit amet consectetur adipiscing elit pellentesque?
                            </h3>
                            <div class="faq-content">
                                <p>
                                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices
                                    sagittis orci. Faucibus pulvinar elementum integer enim.
                                    Sem nulla pharetra diam sit amet nisl suscipit. Rutrum
                                    tellus pellentesque eu tincidunt. Lectus urna duis
                                    convallis convallis tellus. Urna molestie at elementum eu
                                    facilisis sed odio morbi quis
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->

                        <div class="faq-item">
                            <h3>
                                Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                            </h3>
                            <div class="faq-content">
                                <p>
                                    Dolor sit amet consectetur adipiscing elit pellentesque
                                    habitant morbi. Id interdum velit laoreet id donec
                                    ultrices. Fringilla phasellus faucibus scelerisque
                                    eleifend donec pretium. Est pellentesque elit ullamcorper
                                    dignissim. Mauris ultrices eros in cursus turpis massa
                                    tincidunt dui.
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->

                        <div class="faq-item">
                            <h3>
                                Tempus quam pellentesque nec nam aliquam sem et tortor?
                            </h3>
                            <div class="faq-content">
                                <p>
                                    Molestie a iaculis at erat pellentesque adipiscing
                                    commodo. Dignissim suspendisse in est ante in. Nunc vel
                                    risus commodo viverra maecenas accumsan. Sit amet nisl
                                    suscipit adipiscing bibendum est. Purus gravida quis
                                    blandit turpis cursus in
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                            <div class="faq-content">
                                <p>
                                    Enim ea facilis quaerat voluptas quidem et dolorem. Quis
                                    et consequatur non sed in suscipit sequi. Distinctio ipsam
                                    dolore et.
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->
                    </div>
                </div>
                <!-- End Faq Column-->
            </div>
        </div>
    </section> --}}
    <!-- /Faq Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Kontak</h2>
            <p>Hubungi kami melalui kontak berikut</p>
        </div>
        <!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Alamat</h3>
                        <p>
                            Jl. Kusuma Bangsa No.2, Karanganyar, Banyu Ajuh, <br />
                            Kec. Kamal, Kabupaten Bangkalan, Jawa Timur 69162
                        </p>
                    </div>
                </div>
                <!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
                        data-aos-delay="300">
                        <i class="bi bi-telephone"></i>
                        <h3>Telepon Kami</h3>
                        <p>(031) 3011110</p>
                    </div>
                </div>
                <!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
                        data-aos-delay="400">
                        <i class="bi bi-envelope"></i>
                        <h3>Email Kami</h3>
                        <p>polsekkamal@gmail.com</p>
                    </div>
                </div>
                <!-- End Info Item -->
            </div>

            <div class="row gy-4 mt-1">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.6715406251196!2d112.71718047334831!3d-7.163917570287978!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd803daaaaaaaab%3A0xbf214518d16502f!2sPolsek%20Kamal!5e0!3m2!1sid!2sid!4v1717578780074!5m2!1sid!2sid"
                        frameborder="0" style="border: 0; width: 100%; height: 400px" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- End Google Maps -->

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="400">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name"
                                    required="" />
                            </div>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Your Email"
                                    required="" />
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                    required="" />
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">
                                    Your message has been sent. Thank you!
                                </div>

                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Contact Form -->
            </div>
        </div>
    </section>
    <!-- /Contact Section -->
@endsection
