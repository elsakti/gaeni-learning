@extends('admin.partials.main')

@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="loginarea__wraper">
        <div class="login__heading">
            <h5 class="login__title">Update {{ $user->name }} Data</h5>
        </div>
        <form action="{{ route('admin_update_users', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="login__form">
                <label class="form__label">Name</label>
                <input class="common__login__input  @error('error') is-invalid @enderror" type="text" placeholder="Name" 
                name="name" id="name" value="{{ $user->name }}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="login__form">
                <label class="form__label">Email</label>
                <input class="common__login__input  @error('error') is-invalid @enderror" type="email" placeholder="Email" 
                name="email" id="email" value="{{ $user->email }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="login__form">
                <label class="form__label">Institute</label>
                <input class="common__login__input  @error('error') is-invalid @enderror" type="text" placeholder="Institute" 
                name="institute" id="institute" value="{{ $user->institute }}" required>
                @error('institute')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="login__form">
                <label class="form__label">Phone</label>
                <input class="common__login__input  @error('error') is-invalid @enderror" type="number" placeholder="Phone Number" 
                name="phone" id="phone" value="{{ $user->phone }}" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="login__button" style="text-align: center">
                <button class="default__button">Update {{ $user->name }} Data</button>
            </div>
        </form>
    </div>
</div>
@endsection
