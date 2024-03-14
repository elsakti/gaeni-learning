@extends('admin.partials.main')

@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="container">
        <div class="row">
            <div class="dashboard__section__title">
                <h4>Add New Course</h4>
            </div>
            <div class="loginarea__wraper">
                <div class="login__heading">
                    <h5 class="login__title">Add Course Form</h5>
                </div>
                <form id="addcourse-form" action="{{ route('admin_store_courses') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Course Name & Course instructor area --}}
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label for="name" class="form__label">Course Name:</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="Course Name" required>
                                @if ($errors->has('name'))
                                <span class="error">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col">
                                <label for="instructor" class="form__label">Course instructor:</label>
                                <input class="form-control" type="text" name="instructor" id="instructor" placeholder="Instructor Name" required>
                                @if ($errors->has('instructor'))
                                <span class="error">{{ $errors->first('instructor') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- End Course Name & Course instructor area --}}

                    <br>

                    {{-- Category & Image area --}}
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label for="category_id" class="form__label">Category:</label>
                                <select name="category_id" id="category_id" class="form-select" aria-label="Default select example">
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">
                                        {{ $cat->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="error">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                            <div class="col">
                                <label for="image" class="form__label">Image:</label>
                                <input class="form-control" type="file" name="image" id="image"  required>
                                @if ($errors->has('image'))
                                    <span class="error">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- end Category & Image area --}}

                    <br>

                    {{-- time area --}}
                    <div class="container">
                        <div class="row">
                            <div class="col">   
                                <label for="start_time" class="form__label">Start Time:</label>
                                <input class="form-control" type="time" name="start_time" id="start_time" required>
                                @if ($errors->has('start_time'))
                                    <span class="error">{{ $errors->first('start_time') }}</span>
                                @endif
                            </div>
                            <div class="col">
                                <label for="end_time" class="form__label">End Time:</label>
                                <input class="form-control" type="time" name="end_time" id="end_time" required>
                                @if ($errors->has('end_time'))
                                    <span class="error">{{ $errors->first('end_time') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- end time area --}}
                    <br>
                    {{-- date area --}}
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label for="start_at" class="form__label">Start Date:</label>
                                <input class="form-control" type="date" name="start_at" id="start_at" required>
                                @if ($errors->has('start_at'))
                                    <span class="error">{{ $errors->first('start_at') }}</span>
                                @endif
                            </div>
                            <div class="col">
                                <label for="end_at" class="form__label">End Date:</label>
                                <input class="form-control" type="date" name="end_at" id="end_at" required>
                                @if ($errors->has('end_at'))
                                    <span class="error">{{ $errors->first('end_at') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- end date area --}}
                    <br>
                    
                    {{-- description area --}}
                    <label for="description">Description :</label>
                    <div class="form-floating">
                        <textarea class="form-control" name="description" placeholder="Description" id="floatingTextarea2" style="height: 100px" required></textarea>
                        <label for="floatingTextarea2" style="color: black">Description</label>
                        @if ($errors->has('description'))
                            <span class="error">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    {{-- end description area --}}

                    {{-- form area --}}
                    <Label for="gform">Google Form: (Optional)</Label>
                    <input type="text" class="form-control" type="url" name="gform" id="gform" >
                    @if ($errors->has('gform'))
                        <span class="error">{{ $errors->first('gform') }}</span>
                    @endif
                    {{-- end form area --}}

                    <div class="login__button" style="text-align: center">
                        <button type="submit" id="submit" class="default__button">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
