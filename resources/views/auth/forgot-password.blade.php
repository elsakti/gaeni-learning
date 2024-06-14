@extends('admin.partials.main')

@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="loginarea__wraper">
        <div class="login__heading">
            <h5 class="login__title">Admin Reset Password</h5>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('status'))
                <div class="alert alert-success">
                    {{ session()->get('status') }}
                </div>
        @endif
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="login__form">
                <label class="form__label">Email</label>
                <input class="common__login__input" type="email" name="email">
            </div>

            <div class="login__button" style="margin-top: 2%">
                <button type="submit" class="default__button">Send Link</button>
            </div>
        </form>
    </div>

    <div class=" login__shape__img educationarea__shape_image">
        <img class="hero__shape hero__shape__1" src={{ asset("assets/img/education/hero_shape2.png") }} alt="Shape">
        <img class="hero__shape hero__shape__2" src={{ asset("assets/img/education/hero_shape3.png") }} alt="Shape">
        <img class="hero__shape hero__shape__3" src={{ asset("assets/img/education/hero_shape4.png") }} alt="Shape">
        <img class="hero__shape hero__shape__4" src={{ asset("assets/img/education/hero_shape5.png") }} alt="Shape">
    </div>
</div>
@endsection
