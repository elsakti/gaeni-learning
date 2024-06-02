@extends('student.partials.main')

@section('content')
    <div class="col-xl-9 col-lg-9 col-md-12">
        <div class="dashboard__content__wraper">
            <div class="dashboard__section__title">
                <h1>Semangat Mengejar Mimpi, {{ Auth::user()->name }}</h1>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                    <div class="dashboard__single__counter">
                        <div class="counterarea__text__wraper">
                            <div class="counter__img">
                                <img src="{{ asset('assets/img/counter/counter__1.png') }}" alt="counter">
                            </div>
                            <div class="counter__content__wraper">
                                <div class="counter__number">
                                    <span class="counter">{{ Auth::user()->courses()->count() }}</span>
                                </div>
                                <p>Enrolled Courses</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection