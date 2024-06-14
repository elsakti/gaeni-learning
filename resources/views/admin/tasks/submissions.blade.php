
@extends('admin.partials.main')

@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title">
            <a href="{{ url()->previous() }}" class="btn btn-secondary" >Back</a>
            <h3>{{ $task->title }} - Submissions List</h3>
        </div>

        <div class="row">
            <div class="row">
                <div class="col-xl-12">
                    <div class="dashboard__table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Student Name</th>
                                    <th>Submit Time</th>
                                    <th>Status</th>
                                    <th>Link/file</th>
                                    <th>Grade</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($submissions as $submission)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $submission->user->name }}</td>
                                    <td>{{ $submission->time_submit }}</td>
                                    <td>{{ $submission->status }}</td>
                                    @if ($task->type == 'link')
                                    <td> <a style="color: blue" href="{{ $submission->file }}" target="_blank">Check Here</a> </td>
                                    @else
                                    <td> <a href="{{ asset("storage/tasks/submissions/$submission->file") }}" target="_blank" rel="noopener noreferrer">Check Here</a> </td>
                                    @endif
                                    <td>{{ $submission->grade ? $submission->grade : 'None' }}</td>
                                    <td>
                                        <form action="{{ route('admin_delete_submission', $submission->id ) }}" method="POST">
                                            <a href="{{ route('admin_edit_submission', $submission->id) }}" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Grade">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                </svg>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove submission">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                </svg>
                                            </button>
                                        </form>
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


