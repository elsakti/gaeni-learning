
@extends('trainer.partials.main')

@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title">
            <a href="{{ url()->previous() }}" class="btn btn-secondary" >Back</a>
            <h4>GEMA LMS - {{ $course->name }} - {{ $course->users->count() }} Users</h4>
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
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td @if($user->hasRole('trainer')) {
                                        style="color: blue"
                                    }
                                    @endif>{{ $user->name }}</td>
                                    <td></td>
                                    <td>{{ $user->institute }}</td>
                                    <td>{{ $user->email }}</td>
                                    
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


