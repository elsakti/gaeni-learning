<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="color: black">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: black">Add {{ $course->name }} Task</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin_add_task',$course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="course_id" class="col-form-label">Course Name</label>
              <input type="hidden" class="form-control" name="course_id" value="{{ $course->id }}">
              <input type="text" class="form-control" value="{{ $course->name }}" disabled>
            </div>
            <div class="mb-3">
              <label for="title" class="col-form-label">Title</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="Add Task Title">
            </div>
            <div class="mb-3">
              <label for="description" class="col-form-label">Description</label>
              <textarea name="description" id="description" cols="50" rows="5" placeholder="Add Description"></textarea>
            </div>
            <div class="mb-3">
              <label for="open_date" class="col-form-label">Open Date</label>
              <input type="date" class="form-control" name="open_date" id="open_date" value="{{ now()->format('Y-m-d') }}">
            </div>
            <div class="mb-3">
              <label for="closed_date" class="col-form-label">Closed Date</label>
              <input type="date" class="form-control" name="closed_date" id="closed_date" value="{{ now()->format('Y-m-d') }}">
            </div>
            <div class="mb-3">
              <label for="status" class="col-form-label">Status</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="opened" id="flexRadioDefault1" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                  Active
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="pending" id="flexRadioDefault2" >
                <label class="form-check-label" for="flexRadioDefault2">
                  Pending
                </label>
              </div>
            </div>
            <div class="mb-3">
              <label for="status" class="col-form-label">Submissions Type</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="type" value="link" id="flexRadioDefault1" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                  Link
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="type" value="pdf" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                  Pdf
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="type" value="zip" id="flexRadioDefault3">
                <label class="form-check-label" for="flexRadioDefault3">
                  Zip
                </label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Task</button>
            </div>
        </form>
        </div>
      </div>
    </div>
</div>
