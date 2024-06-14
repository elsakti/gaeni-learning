@extends('admin.partials.main')

@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="loginarea__wraper">
        <div class="login__heading">
            <h5 class="login__title">Update {{ $user->name }} Courses</h5>
        </div>
        <form action="{{ route('course_assign_to_user', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="login__form">
                <label class="form__label">Courses</label>
                <input type="hidden" name="user_id" value="{{ $user->id }}" >
                <select multiple class="form-select" id="coursesSelect" name="course_ids[]">
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
                @error('name')
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
