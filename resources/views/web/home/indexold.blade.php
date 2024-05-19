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
    
    <div class="topbararea" style="background-color: black">    
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6">
                    <div class="topbar__left">
                        <ul>
                            <li >
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

    <header>
        <div class="headerarea headerarea__3 header__sticky header__area">
            <div class="container desktop__menu__wrapper">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12">
                        <div class="headerarea__left">
                            <div class="headerarea__left__logo">
                                <a href="/"><img src="{{ asset("assets/img/logo/gema.png") }}" alt="Gema" width="40%" ></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-6 col-md-12">
                        <div class="headerarea__right">
                            <div class="headerarea__login">
                                <a><i class="icofont-user-alt-5"></i></a>
                            </div>
                            <div class="headerarea__button">
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

                </div>

            </div>
        </div>
    </header>

    <!-- herobannerarea__section__start -->
    <div class="herobannerarea herobannerarea__2 herobannerarea__machine__learning" style="background-color: #5f2ded">
        <div class="swiper ai__slider">
            <div class="herobannerarea__slider__wrap swiper-wrapper">
                <div class="swiper-slide herobannerarea__single__slider">
                    <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 col-12" data-aos="fade-up" >
                            <div class="herobannerarea__content__wraper text-center" ">
                                <div class="herobannerarea__title">
                                    <div class="herobannerarea__small__title">
                                        <span >lms.gaeni.org</span>
                                    </div>
                                    <div class="herobannerarea__title__heading__2 herobannerarea__title__heading__3">
                                        <h2 >Welcome to Gaeni Moentari <br> E-Learning Platform</h2>
                                    </div>
                                </div>
                                <div class="herobannerarea__text herobannerarea__text__2">
                                    <p >Learn With Us</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="herobannerarea__icon__2">
            <img class="herobanner__common__img herobanner__img__1" src="{{ asset("assets/img/herobanner/herobanner__slider__8.png") }}" alt="photo" width="20%" style="opacity: 100%">
            {{-- <img class="herobanner__common__img herobanner__img__2" src="{{ asset("assets/img/herobanner/herobanner__2.png") }}" alt="photo"> --}}
            {{-- <img class="herobanner__common__img herobanner__img__3" src="{{ asset("assets/img/herobanner/herobanner__3.png") }}" alt="photo"> --}}
            {{-- <img class="herobanner__common__img herobanner__img__4" src="{{ asset("assets/img/herobanner/herobanner__4.png") }}" alt="photo"> --}}
            {{-- <img class="herobanner__common__img herobanner__img__5" src="{{ asset("assets/img/herobanner/herobanner__5.png") }}" alt="photo"> --}}
        </div>

    </div>
    <!-- herobannerarea__section__end-->

    <!-- populer__section__start -->
    <div class="populerarea__2 sp_top_50 sp_bottom_50">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 about__wrap__content" data-aos="fade-up">
                    <div class="service__animate__shape__1">
                        <img src={{ asset("assets/img/service/service__shape__1.png") }} alt="">
                    </div>
                    <div class="populerarea__content__wraper__2">
                        <div class="section__title ">
                            <div class="section__title__button">
                                <div class="default__small__button">Populer Courses</div>
                            </div>
                            <div class="section__title__heading">
                                <h2>The Best Our Newest Technology Courses
                            </div>
                        </div>

                        <div class="populerarea__content__2">
                            <p class="populerarea__para__2">We Update Every Course In Every Latest And Updated Technology, So That It Can Be The Best Platform In Technology Science.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 service__wrap__content">
                    <div class="service__animate__shape__2">
                        <img src={{ asset("assets/img/service/service__shape__bg__1.png") }} alt="">
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" data-aos="fade-up">
                            <div class="single__service">
                                <div class="service__img">
                                    <img src={{ asset("assets/img/service/service__5.png") }} alt="p1">

                                </div>
                                <div class="service__content service__content__2">
                                    <h3>Data Science</h3>
                                    <p> combines mathematics, statistics, programming, analytics, artificial intelligence, and machine learning</p>
                                </div>
                            </div>

                            <div class="single__service">
                                <div class="service__img">
                                    <img src={{ asset("assets/img/service/service__7.png") }} alt="p2">
                                </div>
                                <div class="service__content service__content__2">
                                    <h3>Metaverse</h3>
                                    <p>digital spaces for socializing, learning, playing, and more. It is the next evolution in social connection</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" data-aos="fade-up">
                            <div class="single__service ss_margin">
                                <div class="service__img">
                                        <img src={{ asset("assets/img/service/service__4.png") }} alt="">

                                </div>
                                <div class="service__content service__content__2">
                                    <h3>Web Programming</h3>
                                    <p>developing web applications and websites that can be accessed via the internet.</p>
                                </div>
                            </div>

                            <div class="single__service">
                                <div class="service__img">
                                        <img src={{ asset("assets/img/service/service__1.png") }} alt="">
                                </div>
                                <div class="service__content service__content__2">
                                    <h3>Technopreneur</h3>
                                    <p>entrepreneur who is involved with high-tech business.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- populer__section__end-->
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
                                <img src="{{ asset("storage/image/$item->image") }}" alt="{{ $item->name }}">
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
    <div class="footerarea">
        <div class="container">
            <div class="footerarea__newsletter__wraper">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" data-aos="fade-up">
                        <div class="footerarea__text">
                            <h3>Still You Need Our <span>Support</span> ?</h3>
                            <p>Call Us: +62 823-1515-3697 - Mail Us: info@gaeni.org</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" data-aos="fade-up">
                        <div class="footerarea__newsletter">
                            <div class="footerarea__newsletter__input">
                                {{-- <form action="#">
                                    <input type="text" placeholder="Enter your email here">
                                    <div class="footerarea__newsletter__button">
                                        <button type="submit" class="subscribe__btn">Subscribe Now</button>
                                    </div>
                                </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footerarea__copyright__wrapper footerarea__copyright__wrapper__2">
                <div class="row">
                    <div class="col-xl-3 col-lg-3">
                        <div class="copyright__logo">
                            {{-- <a href="/"><img src="{{ asset("assets/img/logo/gema.png") }}" style="width: " alt="GEMA"></a> --}}
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="footerarea__copyright__content footerarea__copyright__content__2">
                            {{-- <p>Copyright © <span>2023</span> by edurock. All Rights Reserved.</p> --}}
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="footerarea__icon footerarea__icon__2">
                            {{-- <ul>
                                <li><a href="//facebook.com"><i class="icofont-facebook"></i></a></li>
                                <li><a href="//twitter.com"><i class="icofont-twitter"></i></a></li>
                                <li><a href="//vimeo.com"><i class="icofont-vimeo"></i></a></li>
                                <li><a href="//linkedin.com"><i class="icofont-linkedin"></i></a></li>
                                <li><a href="//skype.com"><i class="icofont-skype"></i></a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
