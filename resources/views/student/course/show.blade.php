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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@include('student.course.permit')