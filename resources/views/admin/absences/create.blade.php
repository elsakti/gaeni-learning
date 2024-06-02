<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="color: black">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: black">Add Absence</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin_add_absence', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="course_id" class="col-form-label">Course Id</label>
              <input type="hidden" class="form-control" name="course_id" value="{{ $course->id }}">
              <input type="text" class="form-control" value="{{ $course->name }}" disabled>
            </div>
            <div class="mb-3">
              <label for="date" class="col-form-label">Date</label>
              <input type="date" class="form-control" name="date" id="date" value="{{ now()->format('Y-m-d') }}">
            </div>
            <div class="mb-3">
              <label for="date" class="col-form-label">Open Time</label>
              <input type="time" class="form-control" name="open_time" id="time" value="{{ now()->format('H:i:s') }}">
            </div>
            <div class="mb-3">
              <label for="status" class="col-form-label">Status</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="1" id="flexRadioDefault1" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                  Active
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="0" id="flexRadioDefault2" >
                <label class="form-check-label" for="flexRadioDefault2">
                  Non-Active
                </label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Absence</button>
            </div>
        </form>
        </div>
      </div>
    </div>
</div>