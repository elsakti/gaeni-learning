
@extends('trainer.partials.main')

@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title">
            <a href="{{ url()->previous() }}" class="btn btn-secondary" >Back</a>
            <h3>{{ $absence->date }} - Attendance List</h3>         
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
                                    <th>Attend Time</th>
                                    <th>Status</th>
                                    <th>Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendances as $attendance)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $attendance->user->name }}</td>
                                    <td>{{ $attendance->time_attend }}</td>
                                    <td>{{ $attendance->type }}</td>
                                    <td>{{ $attendance->notes }}</td>
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


