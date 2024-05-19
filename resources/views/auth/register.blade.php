@extends('auth.partials.main')

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="loginarea sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">
            <div class="tab-content tab__content__wrapper" id="myTabContent" data-aos="fade-up">

                <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                    <div class="col-xl-8 col-md-8 offset-md-2">
                        <div class="loginarea__wraper">
                            <div class="login__heading">
                                <h5 class="login__title">Register Account</h5>
                                <p class="login__description">Already Have an account ? <a href="{{ route('login_page') }}">Let's Login</a></p>
                            </div>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="login__form">
                                    <label class="form__label">Name</label>
                                    <input class="common__login__input @error('name') is-invalid @enderror" name="name" id="name" type="text" placeholder="Name" required autocomplete="name" value="{{ session('name') }}" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="login__form">
                                    <label class="form__label">Institute</label>
                                    <input class="common__login__input @error('institute') is-invalid @enderror" name="institute" id="institute" type="text" placeholder="Institute" required autocomplete="institute" value="{{ session('institute') }}" autofocus>
                                    @error('institute')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="login__form">
                                    <label class="form__label">Phone</label>
                                    <input class="common__login__input @error('phone') is-invalid @enderror" name="phone" id="phone" type="number" placeholder="Phone example: 08123456789" autocomplete="phone" value="{{ session('') }}" autofocus required>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="login__form">
                                    <label class="form__label">Email</label>
                                    <input class="common__login__input @error('email') is-invalid @enderror" name="email" id="email" type="email" placeholder="Email" required autocomplete="email" value="{{ session('email') }}" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="login__form">
                                    <label class="form__label">Password</label>
                                    <input class="common__login__input @error('password') is-invalid @enderror" name="password" id="password" type="password" placeholder="Password" required autocomplete="password" autofocus>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="login__form">
                                    <label class="form__label">Re-Enter Password (Confirmation)</label>
                                    <input class="common__login__input @error('password') is-invalid @enderror" name="password_confirmation" id="password_confirmation" type="password" placeholder="Re-Enter Password" required autocomplete="password_confirmation" autofocus>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="login__form d-flex justify-content-between flex-wrap gap-2">
                                    <div class="form__check">
                                        <input id="accepted" type="checkbox" required>
                                        <label for="accepted"> I am ready to be responsible for all the data that I fill in. <br><span style="color: red">*Saya siap bertanggung jawab atas semua data pribadi yang saya isi.</span></label>
                                    </div>
                                    {{-- <div class="text-end login__form__link">
                                        <a href="#">Forgot your password?</a>
                                    </div> --}}
                                </div>
                                <div class="login__button" style="justify-content: center">
                                    <button class="default__button">REGISTER</button>
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