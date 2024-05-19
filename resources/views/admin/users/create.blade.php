@extends('admin.partials.main')

@section('content')
    
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="loginarea__wraper">
        <div class="login__heading">
            <h5 class="login__title">Create New User</h5>
        </div>
        @if($errors->any())
        <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
        </div>
        @endif
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="login__form">
                <label class="form__label">Name</label>
                <input class="common__login__input  @error('error') is-invalid @enderror" type="text" placeholder="Name" 
                name="name" id="name" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="login__form">
                <label class="form__label">Email</label>
                <input class="common__login__input  @error('error') is-invalid @enderror" type="email" placeholder="Email" 
                name="email" id="email" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="login__form">
                <label class="form__label">Institute</label>
                <input class="common__login__input  @error('error') is-invalid @enderror" type="text" placeholder="Institute" 
                name="institute" id="institute" required>
                @error('institute')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="login__form">
                <label class="form__label">Phone</label>
                <input class="common__login__input  @error('error') is-invalid @enderror" type="number" placeholder="Phone Number" 
                name="phone" id="phone" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="login__form">
                <label class="form__label">Password</label>
                <input class="common__login__input  @error('error') is-invalid @enderror" type="password" placeholder="Password" 
                name="password" id="password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="login__button" style="text-align: center">
                <button class="default__button">Create User</button>
            </div>
        </form>
    </div>
</div>
@endsection
