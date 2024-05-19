@extends('admin.partials.main')
@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
  <div class="loginarea__wraper">
      <div class="login__heading">
          <h5 class="login__title">Edit {{$category->title}}</h5>
      </div>
      <form action="{{ route('categories.update', $category->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="login__form">
              <label class="form__label">Title</label>
              <input class="common__login__input  @error('error') is-invalid @enderror" type="text" placeholder="Title" 
              name="title" value="{{ $category->title }}" id="title" required>
              @error('title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="login__form">
              <label class="form__label">description</label>
              <textarea class="form-control" name="description" id="message-text">{{ isset($category->description) ? $category->description : ""; }}</textarea>
              @error('title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="login__button" style="text-align: center">
              <button class="default__button">Update {{ $category->title }}</button>
          </div>
      </form>
  </div>
</div>
@endsection