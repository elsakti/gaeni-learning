@extends('admin.partials.main')

@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="loginarea__wraper">
        <div class="login__heading">
            <h5 class="login__title">Update Submission Data</h5>
            </div>
        <form action="{{ route('admin_update_grade', $submission->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="container">
                <label for="status" class="col-form-label">Input Grade</label>
                <div class="row">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="grade" value="A" id="flexRadioDefault1" {{ $submission->grade == 'A' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault1">
                              A
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="grade" value="AB" id="flexRadioDefault2" {{ $submission->grade == 'AB' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault2">
                              AB
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="grade" value="B" id="flexRadioDefault3" {{ $submission->grade == 'B' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault3">
                              B
                            </label>
                          </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="grade" value="C" id="flexRadioDefault4" {{ $submission->grade == 'C' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault4">
                              C
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="grade" value="D" id="flexRadioDefault5" {{ $submission->grade == 'D' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault5">
                              D
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="grade" value="E" id="flexRadioDefault6" {{ $submission->grade == 'E' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault6">
                              E
                            </label>
                          </div>
                    </div>
                </div>
              </div><br>
              <div class="mb-3">
                <label for="feedback" class="col-form-label">Add Feedback (optional)</label><br>
                <textarea  name="feedback" id="feedback" cols="100" rows="3" placeholder="Add feedback">{{ $submission->feedback ? $submission->feedback : '' }}</textarea>
              </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

    </div>
</div>
@endsection
