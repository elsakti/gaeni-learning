@extends('auth.partials.main')

@section('content')
<div class="loginarea sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">
            <div class="tab-content tab__content__wrapper" id="myTabContent" data-aos="fade-up">
                <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                    <div class="col-xl-8 col-md-8 offset-md-2">
                        <div class="loginarea__wraper">
                            <div class="login__heading">
                                <h5 class="login__title">Login Account</h5>
                                <p class="login__description">Don't have an account yet? <a href="{{ route('register_page') }}" >Sign up for free</a></p>
                            </div>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="login__form">
                                    <label class="form__label">Email</label>
                                    <input class="common__login__input  @error('error') is-invalid @enderror" type="email" placeholder="Your Email" 
                                    name="email" value="{{ session('email') }}" id="email" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="login__form">
                                    <label class="form__label">Password</label>
                                    <input class="common__login__input" type="password" placeholder="Password" name="password" id="password"  required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="login__form d-flex justify-content-between flex-wrap gap-2">
                                    <div class="form__check">
                                        <label for="remember">Remember me  .</label>
                                        <input id="remember" type="checkbox" name="remember" value="1">
                                    </div>
                                    <div class="text-end login__form__link">
                                        <a href="#">Forgot your password?</a>
                                    </div>
                                </div>
                                <div class="login__button" style="text-align: center">
                                    <button class="default__button">LOG IN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" login__shape__img educationarea__shape_image">
            <img class="hero__shape hero__shape__1" src={{ asset("assets/img/education/hero_shape2.png") }} alt="Shape">
            <img class="hero__shape hero__shape__2" src={{ asset("assets/img/education/hero_shape3.png") }} alt="Shape">
            <img class="hero__shape hero__shape__3" src={{ asset("assets/img/education/hero_shape4.png") }} alt="Shape">
            <img class="hero__shape hero__shape__4" src={{ asset("assets/img/education/hero_shape5.png") }} alt="Shape">
        </div>


    </div>
</div>
@endsection