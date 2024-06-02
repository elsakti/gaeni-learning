@if (!is_null($absence) && $absence->id !== null)
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" style="color: black">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="color: black">Add Absence</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form action="{{ route('student_attend') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="absence_id" value="{{ $absence->id }}">
              <input type="hidden" name="type" value="Permit">

              <label for="notes">Permit Reason</label><br>
              {{-- <input type="text" name="notes" id="notes"> --}}
              <textarea name="notes" id="notes" cols="30" rows="10"></textarea>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send</button>
              </div>
          </form>
          </div>
        </div>
      </div>
  </div>
@endif