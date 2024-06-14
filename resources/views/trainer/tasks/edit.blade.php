@extends('trainer.partials.main')

@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="loginarea__wraper">
        <div class="login__heading">
            <h5 class="login__title">Update {{ $task->title }} Data</h5>
        </div>
        <form action="{{ route('trainer_update_task', $task->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="login__form">
                <label for="course_id" class="col-form-label">Course Name</label>
                <input type="hidden" class="form-control" name="course_id" value="{{ $course->id }}">
                <input type="text" class="form-control" value="{{ $course->name }}" disabled>
            </div>
            <div class="login__form">
                <label class="form__label">Task Title</label>
                <input class="common__login__input  @error('error') is-invalid @enderror" type="text" placeholder="Task Title"
                name="title" id="title" value="{{ $task->title }}" required>
            </div>
            <div class="login__form">
                <label for="description" class="col-form-label">Description</label>
                <textarea name="description" id="description" cols="50" rows="5" placeholder="Add Description">{{ $task->description }}</textarea>
            </div>
            <div class="login__form">
                <label for="open_date" class="col-form-label">Open Date</label>
              <input type="date" class="form-control" name="open_date" id="open_date" value="{{ $task->open_date }}">
            </div>
            <div class="login__form">
                <label for="closed_date" class="col-form-label">Closed Date</label>
              <input type="date" class="form-control" name="closed_date" id="closed_date" value="{{ $task->closed_date }}">
            </div>
            <div class="login__form">
                <label for="status" class="col-form-label">Status</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="opened" id="flexRadioDefault1"
                @if ($task->status == 'opened')
                    checked
                @endif>
                <label class="form-check-label" for="flexRadioDefault1">
                  Active
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="pending" id="flexRadioDefault2"
                @if ( $task->status == 'pending' )
                    checked
                @endif>
                <label class="form-check-label" for="flexRadioDefault2">
                  Pending
                </label>
              </div>
            </div>
            <div class="login__form">
                <label for="status" class="col-form-label">Submissions Type</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="type" value="link" id="flexRadioDefault1"
                @if ( $task->type == 'link' )
                    checked
                @endif>
                <label class="form-check-label" for="flexRadioDefault1">
                  Link
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="type" value="pdf" id="flexRadioDefault2"
                @if ( $task->type == 'pdf' )
                    checked
                @endif>
                <label class="form-check-label" for="flexRadioDefault2">
                  Pdf
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="type" value="zip" id="flexRadioDefault3"
                @if ( $task->type == 'zip' )
                    checked
                @endif >
                <label class="form-check-label" for="flexRadioDefault3">
                  Zip
                </label>
              </div>
            </div>

            <div class="login__button" style="text-align: center">
                <button class="default__button">Update {{ $task->title }} Data</button>
            </div>
        </form>
    </div>
</div>
@endsection
