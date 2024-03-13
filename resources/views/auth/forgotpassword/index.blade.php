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
                                <h5 class="login__title">Reset Password</h5>
                                <p class="login__description">Please check, the email that is filled is your email? if not. Please contact Admin to update your email.</p>
                            </div>
                            <form action="#">
                                <div class="login__form">
                                    <label class="form__label">Email</label>
                                    <input class="common__login__input" type="email" placeholder="useremail" value="useremail" disabled>
                                </div>
                                <p style="margin-top: 2%" class="login__description">We will send a link to reset your password to your email.</p>
                                <div class="login__button" style="margin-top: -1%">
                                    <a class="default__button" href="#">Send Link</a>
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