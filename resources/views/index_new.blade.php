@extends('layouts.new_index')

@section('content')

<!-- ##### Hero Area Start ##### -->
    <section id="home" class="hero-area">
        <div class="hero-post-slides owl-carousel">

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(css_index/img/bg-img/bg3.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2>Galang bantuan online</h2>
                                <h2>Untuk memenuhi kebutuhan mahasiswa yang kekurangan berdampak positif dan memberdayakan.</h2>
                                <p></p>
                                <div class="welcome-btn-group">
                                    <a href="/newLogin" class="btn alazea-btn mr-30">LOGIN</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(css_index/img/bg-img/bg2.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2>Berkata indah tidak cukup untuk mengubah keadaan menjadi lebih baik</h2>
                                <p>#YUK Lakukan sesuatu sekarang di electronic-Orang Tua Asuh.</p>
                                <div class="welcome-btn-group">
                                    <a href="/newLogin" class="btn alazea-btn mr-30">LOGIN</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(css_index/img/bg-img/bg1.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2>Kita orang beruntung</h2>
                                <p>Namun banyak orang dengan keterbatasan yang memebutuhkan bantuan.</p>
                                <div class="welcome-btn-group">
                                    <a href="/newLogin" class="btn alazea-btn mr-30">LOGIN</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Portfolio Area Start ##### -->
    <section id="about" class="alazea-portfolio-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>#OrangBeruntung</h2>
                        <p>Beberapa orang beruntung yang bergabung memberi bantuan berdampak positif</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">

            <div class="row alazea-portfolio">

                @foreach($donatur as $don)
                <!-- Single Portfolio Area -->
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item design home-design wow fadeInUp" data-wow-delay="100ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(assets/images/avatars/{{$don->image}});"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="assets/images/avatars/{{$don->image}}" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 1">
                            <div class="port-hover-text">
                                <h3>{{$don->nama_don}}</h3>
                                <h5>{{$don->pekerjaan}}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- ##### Portfolio Area End ##### -->

    <!-- ##### Product Area Start ##### -->
    <section id="donasi" class="new-arrivals-products-area bg-gray section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Donasi bantuan</h2>
                        <p>Dukung galang donasi bantuan untuk mahasiswa yang membutuhkan</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12 col-sm-6 col-lg-2">
                </div>

                <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Product Image -->
                        <div class="product-img">
                            <a href="#"><img src="css_index/img/bg-img/donasiUmum.png" alt=""></a>
                            <!-- Product Tag -->
                            <div class="product-tag">
                                <a href="#">Bantuan umum</a>
                            </div>
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="#">
                                <p>Terkumpul</p>
                            </a>
                            <?php $jumlah = 0; ?>
                            @foreach($donasi as $dos)
                                <?php $jumlah+=$dos->total; ?>
                            @endforeach
                            <h6>Rp. <?= $jumlah; ?></h6>
                        </div>
                    </div>
                </div>

                <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Product Image -->
                        <div class="product-img">
                            <a href="#"><img src="css_index/img/bg-img/donasiLangsung.png" alt=""></a>
                            <!-- Product Tag -->
                            <div class="product-tag">
                                <a href="#">Bantuan langsung</a>
                            </div>
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="shop-details.html">
                                <p>Terkumpul</p>
                            </a>
                            <?php $bantu = 0; ?>
                            @foreach($langsung as $lang)
                                <?php $bantu+=$lang->total; ?>
                            @endforeach
                            <h6>Rp. <?= $bantu; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Product Area End ##### -->


    <!-- ##### Blog Area Start ##### -->
    <section id="mahasiswa" class="alazea-blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>#YUK IKUT MEMBANTU</h2>
                        <p>Beberapa mahasiswa yang membutuhkan bantuan</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                @foreach($data as $d)
                <!-- Single Blog Post Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-post mb-100">
                        <div class="post-thumbnail mb-30">
                            <a href="/newLogin"><img src="assets/images/avatars/{{$d->image}}" alt=""></a>
                        </div>
                        <div class="post-content">
                            <a href="/newLogin" class="post-title">
                                <h5>{{$d->nama}}</h5>
                            </a>
                            <p class="post-excerpt">Mahasiswa jurusan {{$d->jurusan}} dengan penghasilan orang tua <?php if($d->penghasilan == 1){echo 'Kecil dari Rp. 1.500.000,-';}elseif($d->penghasilan == 0.61){echo 'Rp. 1.500.000,- s/d Rp. 2.000.000,-';}elseif($d->penghasilan == 0.35){echo 'Rp. 2.000.000,- s/d Rp. 2.500.000,-';}elseif($d->penghasilan == 0.21){echo 'Rp. 2.500.000- s/d Rp. 3.000.000,-';}else{echo 'Besar dari Rp. 3.000.000,-';}; ?> dan beberapa tanggungan orang tua mahasiswa yang bersangkutan. Klik detail informasi untuk melihat detail informasi mahasiswa.</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->

@endsection
