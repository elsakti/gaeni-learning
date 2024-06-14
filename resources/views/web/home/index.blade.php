@extends('web.partials.main')

@section('content')
    <!-- pre loader area start -->
        <div id="back__preloader">
            <div id="back__circle_loader"></div>
                <div class="back__loader_logo">
                </div>
            </div>
        </div>
    <!-- pre loader area end -->

    <!-- topbar area start -->
        <div class="topbararea" style="background-color: black">
            <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6">
                    <div class="topbar__left">
                        <ul>
                            <li>
                                Call Us: +62 823-1515-3697
                            </li>
                            <li>
                                - Mail Us: info@gaeni.org
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6">
                    <div class="topbar__right">
                        <div class="topbar__icon">
                            <i class="icofont-location-pin" style="color: white"></i>
                        </div>
                        <div class="topbar__text">
                            <p>Jl. Rancakendal No. 20, Cigadung, Kota Bandung, Jawa Barat</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    <!-- topbar area end -->

    <!-- herobannerarea__section__start -->
        <div class="herobannerarea herobannerarea__2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                        <div class="herobannerarea__content__wraper">
                            <div class="herobannerarea__title">
                                <div class="herobannerarea__small__title">
                                    <span>Education Solution</span>
                                </div>
                                <div class="herobannerarea__title__heading__2 herobannerarea__title__heading__3">
                                    <h2 style="margin-bottom: -1%; color: #37e4ff">Gaeni Moentari</h2>
                                    <h1>E-Learning Platform</h1>
                                </div>
                            </div>
                            <div class="herobannerarea__text herobannerarea__text__2">
                                <p>Let's move forward with us, learn and experience the latest technology. </p>
                            </div>
                            <div class="hreobannerarea__button__2">
                                @if (Auth::check())
                                    @if (Auth::user()->hasRole('admin'))
                                        <a class="default__button" href="{{ route('admin_dashboard') }}" >DASHBOARD</a>
                                        <a class="default__button hreobannerarea__button__3" href="{{ route('logout') }}">LOG OUT</a>
                                    @elseif (Auth::user()->hasRole('trainer'))
                                        <a class="default__button" href="{{ route('trainer_dashboard') }}">DASHBOARD</a>
                                        <a class="default__button hreobannerarea__button__3" href="{{ route('logout') }}">LOGOUT</a>
                                    @elseif (Auth::user()->hasRole('student'))
                                        <a class="default__button" href="{{ route('student_dashboard') }}">DASHBOARD</a>
                                        <a class="default__button hreobannerarea__button__3" href="{{ route('logout') }}">LOGOUT</a>
                                    @endif
                                @else
                                    <a class="default__button" href="{{ route('login_page') }}">LOGIN</a>
                                    <a class="default__button hreobannerarea__button__3" href="{{ route('register_page') }}">REGISTER</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                        <div class="aboutarea__img__2" data-tilt>
                            <img class="aboutimg__1" src="{{ asset("assets/img/about/about_10.png") }}" alt="aboutimg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="herobannerarea__icon__2">
                <img class="herobanner__common__img herobanner__img__2" src="{{ asset("assets/img/herobanner/herobanner__2.png")}}" alt="photo">
                <img class="herobanner__common__img herobanner__img__3" src="{{ asset("assets/img/herobanner/herobanner__3.png")}}" alt="photo">
                <img class="herobanner__common__img herobanner__img__4" src="{{ asset("assets/img/herobanner/herobanner__4.png")}}" alt="photo">
                <img class="herobanner__common__img herobanner__img__5" src="{{ asset("assets/img/herobanner/herobanner__5.png")}}" alt="photo">
            </div>
        </div>
    <!-- herobannerarea__section__end-->

    <!-- brand__section__start -->
        <div class="brandarea__2">
            <div class="container">
                <div class="row">
                    <div class="brandarea__wraper brandarea__wraper__2" data-aos="fade-up">
                        <div class="brandarea__img">
                            <a href="#"><img src="{{ asset("assets/img/logo/kemendikbud.png") }}" alt="brand"></a>
                        </div>
                        <div class="brandarea__img">
                            <a href="#"><img src="{{ asset("assets/img/logo/seameo.png") }}" alt="brand"></a>
                        </div>
                        <div class="brandarea__img">
                            <a href="#"><img src="{{ asset("assets/img/logo/seaqis.png") }}" alt="brand"></a>
                        </div>
                        <div class="brandarea__img">
                            <a href="#"><img src="{{ asset("assets/img/logo/gaeni.png") }}" alt="brand"></a>
                        </div>
                        <div class="brandarea__img">
                            <a href="#"><img src="{{ asset("assets/img/logo/pens.png") }}" alt="brand"></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <!-- brand__section__end -->

    {{-- Information_section_start --}}
    <div class="eventlistarea sp_top_50 sp_bottom_100">
        <div class="container">
            <div class="eventlistarea__bg">
                <svg width="938" height="919" viewBox="0 0 938 919" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M926.588 668.954C845.79 881.299 578.082 976.498 328.645 881.587C79.2083 786.675 -57.5003 537.594 23.2975 325.25C104.095 112.905 842.659 -201.917 722.687 181.03C612.239 533.576 1007.39 456.609 926.588 668.954Z"
                        fill="url(#paint0_linear_141_3)" />
                    <defs>
                        <linearGradient id="paint0_linear_141_3" x1="621.24" y1="112.617" x2="328.645" y2="881.586"
                            gradientUnits="userSpaceOnUse">
                            <stop offset="0.9999" stop-color="#FBAED8" stop-opacity="0.08" />
                            <stop offset="1" stop-color="#B64AA4" stop-opacity="0" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="row">
                <div class="section__title text-center" data-aos="fade-up">
                    <div class="section__title__button">
                        <div class="default__small__button">#Pinned</div>
                    </div>
                    <div class="section__title__heading heading__underline">
                        <h2>Pinned Information</h2>
                    </div>
                </div>
            </div>

            <div class="tab-content tab__content__wrapper" id="myTabContent">
                <div class="tab-pane fade active show" id="projects__one" role="tabpanel"
                    aria-labelledby="projects__one">
                    <div class="social__wrapper">
                        <div class="single__event__wraper" data-aos="fade-up">
                            <div class="eventarea__img">
                                <img src="{{ asset("assets/img/service/service__6.png") }}" alt="info">
                            </div>
                            <div class="eventarea__content__wraper">
                                <div class="single__event__heading">
                                    <h4>INFORMASI COURSE GOLDEN TICKET BATCH 5 | PENS - SEAQIS - GEMA FOUNDATION</h4>
                                </div>
                                <div class="single__event__button">
                                    <a href="{{ asset('assets/pdf/gt-b5-information.pdf') }}" target="_blank">Read More <i class="icofont-simple-right"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="tab-content tab__content__wrapper" id="myTabContent">
                <div class="tab-pane fade active show" id="projects__two" role="tabpanel"
                    aria-labelledby="projects__two">
                    <div class="social__wrapper">
                        <div class="single__event__wraper" data-aos="fade-up">
                            <div class="eventarea__img">
                                <img src="{{ asset("assets/img/service/service__6.png") }}" alt="info">
                            </div>
                            <div class="eventarea__content__wraper">
                                <div class="single__event__heading">
                                    <h4>JADWAL COURSE GOLDEN TICKET BATCH 5 | PENS - SEAQIS - GEMA FOUNDATION</h4>
                                </div>
                                <div class="single__event__button">
                                    <a href="{{ asset('assets/pdf/jadwalGT.pdf') }}" target="_blank">Read More <i class="icofont-simple-right"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>




        </div>
    </div>
    {{-- Information_section_end --}}

    <!-- early__programs Start -->
        <div class="early__programs research__programs sp_bottom_100">
            <div class="container-fluid full__width__padding">
                <div class="row">
                    <div class="section__title text-center" data-aos="fade-up">
                        <div class="section__title__button">
                            <div class="default__small__button">#Courses</div>
                        </div>
                        <div class="section__title__heading heading__underline">
                            <h2>Gaeni Moentari Courses</h2>
                            <p>Lets, join with us</p>
                        </div>
                    </div>
                </div>
                <div class="row" >
                    @foreach ($courses as $item)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12" data-aos="fade-up">
                        <div class="single__blog__wraper">
                            <div class="single__blog__img">
                                <a href="{{ route('detail_course', ['name' => $item->name]) }}">
                                    <img src="{{ asset("public/storage/image/$item->image") }}" alt="{{ $item->name }}">
                                </a>
                            </div>
                            <div class="single__blog__content">
                                <p>{{ $item->category->title }}</p>
                                <h4> <a href="{{ route('detail_course', ['name' => $item->name]) }}">{{ $item->name }}</a></h4>
                                <div class="single__blog__bottom__button">
                                    <a href="{{ route('detail_course', ['name' => $item->name]) }}">Read More </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    <!-- early__programs End -->

    <!-- footer__section__start -->
        <div class="footerarea">
            <div class="container">
                <div class="footerarea__wrapper footerarea__wrapper__2">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12" data-aos="fade-up">
                            <div class="footerarea__inner footerarea__about__us">
                                <div class="footerarea__heading">
                                    <h3>About us</h3>
                                </div>
                                <div class="footerarea__content">
                                    <p>
                                        GEMA is an education that engages in education including IT, Entrepreneur, Metaverse, etc. GEMA is a non-profit organization led by Gatot Hari Priowirjanto and Raka Fauzan Hatami.
                                    </p>
                                </div>
                                <div class="foter__bottom__text">
                                    <div class="footer__bottom__icon">
                                        <i class="icofont-clock-time"></i>
                                    </div>
                                    <div class="footer__bottom__content">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6" data-aos="fade-up">
                            <div class="footerarea__inner">
                                <div class="footerarea__heading">
                                    <h3>Usefull Links</h3>
                                </div>
                                <div class="footerarea__list">
                                    <ul>
                                        <li>
                                            <a href="https://gaeni.org/" target="_blank">Gaeni</a>
                                        </li>
                                        <li>
                                            <a href="https://pjj.gaeni.org/" target="_blank">PJJ</a>
                                        </li>
                                        <li>
                                            <a href="https://pranasiswa.gaeni.org/" target="_blank">Pranasiswa</a>
                                        </li>
                                        <li>
                                            <a href="https://gema-gpt.streamlit.app/" target="_blank">Gema GPT</a>
                                        </li>
                                        <li>
                                            <a href="https://gbook.gaeni.org/" target="_blank">Gbook</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6" data-aos="fade-up">
                            <div class="footerarea__inner footerarea__padding__left">
                                <div class="footerarea__heading">
                                    <h3>Course</h3>
                                </div>
                                <div class="footerarea__list">
                                    <ul>
                                        <li>
                                            <a href="">Data Science</a>
                                        </li>
                                        <li>
                                            <a href="">Web Development</a>
                                        </li>
                                        <li>
                                            <a href="">Technopreneur</a>
                                        </li>
                                        <li>
                                            <a href="">Game Development</a>
                                        </li>
                                        <li>
                                            <a href="">Story telling</a>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="footerarea__copyright__wrapper footerarea__copyright__wrapper__2">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="copyright__logo">
                                <a href="https://gaeni.org/">
                                    <img src="{{ asset('assets/img/logo/gema.png') }}" alt="logo" style="weight: 151px; width: 101px">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="footerarea__copyright__content footerarea__copyright__content__2">
                                <p>Copyright © <span>2023</span> by Gema.</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="footerarea__icon footerarea__icon__2">
                                <ul>
                                    <li><a href="//facebook.com"><i class="icofont-linkedin"></i></a></li>
                                    <li><a href="//twitter.com"><i class="icofont-instagram"></i></a></li>
                                    <li><a href="//vimeo.com"><i class="icofont-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <!-- footer__section__end -->

    @endsection
