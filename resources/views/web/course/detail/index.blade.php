@extends('web.partials.main')
@section('content')

@php
    use Carbon\Carbon;

    \Carbon\Carbon::setLocale('id');
    $start_at = \Carbon\Carbon::parse($course->start_at)->translatedFormat('d F Y');
    $end_at = \Carbon\Carbon::parse($course->end_at)->translatedFormat('d F Y');
    $start_time = Carbon::parse($course->start_time)->setTimezone('Asia/Jakarta')->translatedFormat('H:i');
    $end_time = Carbon::parse($course->end_time)->setTimezone('Asia/Jakarta')->translatedFormat('H:i');
@endphp

<div class="blogarea__2 sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="blogarae__img__2 course__details__img__2" data-aos="fade-up" >
                    <img src="{{ asset("storage/image/$course->image") }}" alt="{{ $course->name }}" style="width: 50%; display: block;
                    margin-left: auto;
                    margin-right: auto;">
                </div>
                <div class="blog__details__content__wraper">
                    <div class="course__button__wraper" data-aos="fade-up">
                        <div class="course__button">
                            <a>{{ $course->category->title }}</a>
                        </div>
                    </div>

                    <div class="course__details__paragraph" data-aos="fade-up">
                        <p>{{ $course->description }}</p>
                    </div>

                    <div class="course__details__paragraph" data-aos="fade-up">
                        <h3>Registration Form: </h3>
                        <a href="{{ $course->gform }}" target="_blank">{{ $course->gform }}</a>
                    </div>

                    <h4 class="sidebar__title" data-aos="fade-up">Course Details</h4>

                    <div class="course__details__wraper " data-aos="fade-up">
                        <ul>
                            <li>
                                Course Name : <span>{{ $course->name }}</span>
                            </li>
                            <li>
                                Course Start (Date) : <span>{{ $start_at }}</span>
                            </li>
                            <li>
                                Course End (Date) : <span>{{ $end_at }}</span>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                Instructor : <span>{{ $course->instructor }}</span>
                            </li>
                            <li>
                                Course Start (Time) : <span> {{ $start_time }} WIB </span>
                            </li>
                            <li>
                                Course End (Time) : <span> {{ $end_time }} WIB </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection