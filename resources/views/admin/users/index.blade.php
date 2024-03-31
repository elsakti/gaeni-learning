
@extends('admin.partials.main')

@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title" >
            <h4>GEMA LMS - Users List</h4>
            <div class="dashboard__section__title2" style="justify-content: end">
                <a href="{{ route('admin_create_users') }}" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                      </svg>
                </a>
                <button type="button" class="btn btn-secondary disabled" id="addCourseModal" data-bs-toggle="modal" data-bs-target="#storeCourseModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5"/>
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                      </svg>
                </button>
            </div>
        </div>
        <div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-xl-12">
                    <div class="dashboard__table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="" id="select_all_ids"></th>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th></th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr id="users_ids{{ $user->id }}">
                                    <td><input type="checkbox" class="checkbox_ids" data-id="{{ $user->id }}">
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td></td>
                                    <td>{{ $user->email }}</td>
                                    
                                    <td>
                                            <a class="btn btn-warning" href="{{ route('admin_edit_users', ['id' => $user->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                            </svg></a>
                                        @if ($user->hasRole('student'))
                                            <a class="btn btn-secondary" href="{{ route('admin_assignTrainer_users', ['id' => $user->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Assign Trainer"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                                                <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5z"/>
                                            </svg></a>  
                                        @else
                                        
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
<div class="modal fade" id="storeCourseModal" tabindex="-1" aria-labelledby="storeCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="storeCourseModalLabel">Tambahkan Course</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin_addcourse_selected_users') }}" method="POST" id="addCourseForm">
            @csrf
            <div class="modal-body">
                <input type="hidden" id="user_ids" name="user_ids">
                <label for="course_id" class="form-label">Pilih Course:</label>
                <select name="course_id[]" id="course_id" class="form-select" multiple>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="addCourseToSelectedUsers">Simpan Perubahan</button>
            </div>
        </form>        
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {

    $('#select_all_ids').click(function(){
        $('.checkbox_ids').prop('checked', $(this).prop('checked'));
    });

    $('#addCourseToSelectedUsers').click(function(e){
        e.preventDefault();
        let user_ids = [];
        $('input.checkbox_ids:checked').each(function(){
            user_ids.push($(this).data('id'));
        });

        $('#user_ids').val(user_ids.join(','));

        if (user_ids.length > 0) {
            $('#addCourseForm').submit();
        }
    });

    $('.checkbox_ids').change(function() {
        if ($('.checkbox_ids:checked').length > 0) {
            $('#addCourseModal').removeClass('disabled');
        } else {
            $('#addCourseModal').addClass('disabled');
        }
    });
});

</script>
@endsection

