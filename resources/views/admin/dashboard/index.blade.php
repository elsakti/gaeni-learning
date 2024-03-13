@extends('admin.partials.main')

@section('content')
    <div class="col-xl-9 col-lg-9 col-md-12">
        <div class="dashboard__content__wraper">
            <div class="dashboard__section__title">
                <h4>Welcome Admin - Be Stronger</h4>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                    <div class="dashboard__single__counter">
                        <div class="counterarea__text__wraper">
                            <div class="counter__img">
                                <img src={{ asset("assets/img/counter/counter__1.png") }} alt="counter">
                            </div>
                            <div class="counter__content__wraper">
                                <div class="counter__number">
                                    <span class="counter">900</span>+

                                </div>
                                <p>Enrolled Courses</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                    <div class="dashboard__single__counter">
                        <div class="counterarea__text__wraper">
                            <div class="counter__img">
                                <img src={{ asset("assets/img/counter/counter__2.png") }} alt="counter">
                            </div>
                            <div class="counter__content__wraper">
                                <div class="counter__number">
                                    <span class="counter">500</span>+

                                </div>
                                <p>Active Courses</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                    <div class="dashboard__single__counter">
                        <div class="counterarea__text__wraper">
                            <div class="counter__img">
                                <img src={{ asset("assets/img/counter/counter__3.png") }} alt="counter">
                            </div>
                            <div class="counter__content__wraper">
                                <div class="counter__number">
                                    <span class="counter">300</span>k

                                </div>
                                <p>Complete Courses</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                    <div class="dashboard__single__counter">
                        <div class="counterarea__text__wraper">
                            <div class="counter__img">
                                <img src={{ asset("assets/img/counter/counter__4.png") }} alt="counter">
                            </div>
                            <div class="counter__content__wraper">
                                <div class="counter__number">
                                    <span class="counter">1500</span>+

                                </div>
                                <p>Total Courses</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                    <div class="dashboard__single__counter">
                        <div class="counterarea__text__wraper">
                            <div class="counter__img">
                                <img src={{ asset("assets/img/counter/counter__3.png") }} alt="counter">
                            </div>
                            <div class="counter__content__wraper">
                                <div class="counter__number">
                                    <span class="counter">30</span>k

                                </div>
                                <p>Total Students</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                    <div class="dashboard__single__counter">
                        <div class="counterarea__text__wraper">
                            <div class="counter__img">
                                <img src={{ asset("assets/img/counter/counter__4.png") }} alt="counter">
                            </div>
                            <div class="counter__content__wraper">
                                <div class="counter__number">
                                    <span class="counter">90,000</span>K+

                                </div>
                                <p>Total Earning</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection