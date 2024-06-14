@extends('student.partials.main')

@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title">
            <h4>{{ $course->name }} ABSENCES</h4>
        </div>
        <div class="row">
            <div class="tab-content tab__content__wrapper aos-init aos-animate" id="myTabContent" data-aos="fade-up">
                <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12">
                            @if (!is_null($absence) && $absence->id !== null)
                            <div class="gridarea__wraper">
                                <div class="gridarea__content">
                                    <div class="gridarea__list">
                                        <ul>
                                            <li>
                                                <i class="icofont-book-alt"></i> {{ $course->category->title }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="gridarea__heading">
                                        <h3 style="color: blue">{{ $course->name }}</h3>
                                    </div>
                                    <div class="gridarea__price">
                                        <h4>Active Absence</h4>
                                            @if($absence->status == true)
                                                <p>Opened At : {{ $absence->date }} - {{ $absence->open_time }} </p>
                                            @elseif ($absence->closed_time)
                                                <p>Closed At : {{ $absence->closed_time }}</p>
                                            @endif
                                        <form action="{{ route('student_attend') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="absence_id" value="{{ $absence->id ?? '' }}">
                                            <input type="hidden" name="notes" value="None">
                                            <input type="hidden" name="type" value="Attend">
                                            @if ($attended)
                                            <button type="submit" style="padding-top: 2%; padding-left: 38%; padding-right: 38%; background-color: #4c4c4c; color: #fff; border: none; border-radius: 0.5rem; cursor: not-allowed;" class="btn btn-success" disabled>
                                                Completed
                                            </button>
                                            @elseif($absence->status == true)
                                            <button type="submit" style="padding-top: 2%; padding-left: 43%; padding-right: 43%; background-color: #4CAF50; color: #fff; border: none; border-radius: 0.5rem; cursor: pointer;" class="btn btn-success">
                                                Attend
                                            </button>
                                            <button type="button" style="padding-top: -5%; padding-left: 43%; padding-right: 43%; background-color: #ff9800; color: #fff; border: none; border-radius: 0.5rem; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-warning">
                                                Permit
                                            </button>
                                            @elseif($absence->status == false && $absence->closed_time)
                                            <button type="submit" style="padding-top: 2%; padding-left: 42%; padding-right: 42%; background-color: #4c4c4c; color: #fff; border: none; border-radius: 0.5rem; cursor: not-allowed;" class="btn btn-success" disabled>
                                                Closed
                                            </button>
                                            @elseif ($absence->status == false)
                                            <button type="submit" style="padding-top: 2%; padding-left: 38%; padding-right: 38%; background-color: #4CAF50; color: #fff; border: none; border-radius: 0.5rem; cursor: pointer;" class="btn btn-success" disabled>
                                                Coming Soon
                                            </button>
                                            @endif
                                        </form>
                                    </div>
                                    <div class="gridarea__bottom">
                                        <a href="instructor-details.html">
                                            <div class="gridarea__small__img">
                                                <div class="gridarea__small__content">
                                                    <h6>Instructor: </h6>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="gridarea__star">
                                            {{ $course->instructor }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="gridarea__wraper">
                                <div class="gridarea__content">
                                    <div class="gridarea__list">
                                        <ul>
                                            <li>
                                                <i class="icofont-book-alt"></i> {{ $course->category->title }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="gridarea__heading">
                                        <h3 style="color: blue">{{ $course->name }}</h3>
                                    </div>
                                    <div class="gridarea__price">
                                        <p>Absences will added here</p>
                                    </div>
                                    <div class="gridarea__bottom">
                                        <a href="instructor-details.html">
                                            <div class="gridarea__small__img">
                                                <div class="gridarea__small__content">
                                                    <h6>Instructor: </h6>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="gridarea__star">
                                            {{ $course->instructor }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-xl-8 col-md-12 col-12">
                            <div class="gridarea__wraper">
                                <div class="gridarea__content">
                                    <div class="gridarea__list">
                                        <ul>
                                            <li>
                                                <i class="icofont-book-alt"></i> My Recent Attendances
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="dashboard__table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Time Attend</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($attendances as $attendance)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $attendance->absence->date }}</td>
                                                    <td>{{ $attendance->time_attend }}</td>
                                                    <td><span class="dashboard__td
                                                    @if ($attendance->type == 'Permit')
                                                        dashboard__td__2
                                                    @endif">{{ $attendance->type }}</span></td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <th scope="row"></th>
                                                    <td></td>
                                                    <td>Empty Attendances</td>
                                                    <td></td>
                                                </tr>

                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title">
            <h4>{{ $course->name }} TASKS</h4>
        </div>
        <div class="row">
            <div class="tab-content tab__content__wrapper aos-init aos-animate" id="myTabContent" data-aos="fade-up">
                <div class="tab-pane fade active show" id="projects__two" role="tabpanel" aria-labelledby="projects__two">
                    <div class="row">
                        @forelse ($tasks as $task)
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="gridarea__wraper">
                                <div class="gridarea__content">
                                    <div class="gridarea__list">
                                        <ul>
                                            <li>
                                                <i class="icofont-book-alt"></i> {{ Str::upper($task->status) }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="gridarea__price">
                                        <h4>{{ $task->title }}</h4>
                                        <p>{{ $task->description }}</p>
                                        <small>Due Date : {{ $task->open_date }} - {{ $task->closed_date }} </small><br><br>
                                    @if ($task->submitted)
                                    <div class="mb-3">
                                        <label class="col-form-label" for="file">Send Submission :</label>
                                        <input class="form-control" type="text" placeholder="Completed" disabled>
                                    </div>
                                    @else
                                    <form action="{{ route('student_submit') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if($task->status == 'pending')
                                            <div class="mb-3">
                                                <label class="col-form-label" for="file">Send Submission :</label>
                                                <input class="form-control" type="text" placeholder="Not yet opened" disabled>
                                            </div>
                                        @else
                                            <div class="mb-3">
                                                <label class="col-form-label" for="file">Send Submission :</label>
                                                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="task_id" id="task_id" value="{{ $task->id }}">
                                                <input type="hidden" name="time_submit" id="time_submit" value="{{ now()->format('Y-m-d h:i') }}">
                                            @if ($task->type == 'link')
                                                <input class="form-control" type="url" name="link" id="link" placeholder="Write your submission link here" required>
                                            @else
                                                <input class="form-control" type="file" name="file" id="file" required>
                                            @endif
                                            @if ($task->status == 'closed')
                                                <input type="hidden" name="status" id="status" value="late">
                                            @else
                                                <input type="hidden" name="status" id="status" value="on_time">
                                            @endif
                                            </div>
                                            <button type="submit" style="padding-top: 2%; padding-left: 46%; padding-right: 46%; background-color: #4CAF50; color: #fff; border: none; border-radius: 0.5rem; cursor: pointer;" class="btn btn-success">
                                                Send
                                            </button>
                                        @endif
                                    </form>
                                    @endif
                                    </div>
                                    <div class="gridarea__bottom">
                                        <a href="instructor-details.html">
                                            <div class="gridarea__small__img">
                                                <div class="gridarea__small__content">
                                                    <h6>Instructor: </h6>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="gridarea__star">
                                            {{ $course->instructor }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="gridarea__wraper">
                                <div class="gridarea__content">
                                    <div class="gridarea__list">
                                        <ul>
                                            <li>
                                                <i class="icofont-book-alt"></i> None
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="gridarea__price">
                                        <small>Your tasks will added here</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@include('student.course.permit')
