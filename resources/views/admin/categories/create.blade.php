<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="color: black">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: black">Add Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Title</label>
              <input type="text" class="form-control" name="title" id="recipient-name">
              @if ($errors->has('title'))
                  <span class="error">{{ $errors->first('title') }}</span>
              @endif
            </div>
            <div class="mb-3" >
              <label for="message-text" class="col-form-label" >Description</label>
              <textarea class="form-control" name="description" id="message-text"></textarea>
              @if ($errors->has('description'))
                  <span class="error">{{ $errors->first('description') }}</span>
              @endif
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Upload Category</button>
            </div>
        </form>
        </div>
      </div>
    </div>
</div>