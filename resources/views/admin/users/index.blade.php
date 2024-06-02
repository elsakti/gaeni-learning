@extends('admin.partials.main')

@section('content')


<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title" >
            <h4>GEMA LMS - Users List</h4>
            <div class="dashboard__section__title2" style="justify-content: end">
                <a href="{{ route('users.create') }}" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                      </svg>
                </a>
                <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#assignCourseModal" data-bs-placement="top" title="Assign Course">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5"/>
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                    </svg>
                </a>
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
                                    <th>No</th>
                                    <th>Name</th>
                                    <th></th>
                                    <th>Institute</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td @if($user->hasRole('trainer')) {
                                        style="color: blue"
                                    }
                                    @endif>{{ $user->name }}</td>
                                    <td></td>
                                    <td>{{ $user->institute }}</td>
                                    <td>{{ $user->email }}</td>
                                    
                                    <td>
                                        <div class="btn-group dropstart">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    <a class="btn btn-primary" href="{{ route('users.show', $user->id ) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail User">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
                                                            <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                                            <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                                        </svg>
                                                    </a>
                                                    <a class="btn btn-warning" href="{{ route('users.edit', $user->id ) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                        </svg>
                                                    </a>
                                                    <a href="{{ route('admin_assign_trainer', $user->id) }}" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Assign Instructure" style="margin-top: 3%">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-up" viewBox="0 0 16 16">
                                                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                                            <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                                                        </svg>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete User" style="margin-top: 3%">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                            </svg>
                                                    </button>
                                                </form>
                                            </ul>
                                          </div>
                                            {{-- @if ($user->hasRole('student'))
                                                <a class="btn btn-secondary" href="{{ route('admin_assignTrainer_users', ['id' => $user->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Assign Trainer"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                                                    <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5z"/>
                                                </svg></a>  
                                            @else
                                            
                                            @endif --}}
                                    </td>
                                    <td></td>
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
<div class="modal fade" id="assignCourseModal" tabindex="-1" aria-labelledby="assignCourseModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="assignCourseModalLabel">Assign Course to Users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="assignCourseForm" method="POST" action="{{ route('assign_course_to_users') }}">
          @csrf
          <div class="mb-3">
            <label for="userSelect" class="form-label">Select Users</label>
            <select multiple class="form-select" id="userSelect" name="user_ids[]">
              @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="courseSelect" class="form-label">Select Course</label>
            <select class="form-select" id="courseSelect" name="course_id">
              @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
              @endforeach
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="assignCourseForm">Assign Course</button>
      </div>
    </div>
  </div>
</div>
@endsection
    

{{--
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
@endsection --}}

