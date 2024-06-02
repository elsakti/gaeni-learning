@extends('admin.partials.main')

@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title">
            <h4>{{ $course->name }} DETAIL</h4>
        </div>
        <div class="row">
            <div class="tab-content tab__content__wrapper aos-init aos-animate" id="myTabContent" data-aos="fade-up">
                <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                            <div class="gridarea__wraper">
                                <div class="gridarea__content">
                                    <div class="gridarea__heading">
                                        <h3>Users List</h3>
                                    </div>
                                    <div class="gridarea__price green__color">
                                        More Information! <br> <br>
                                        <a href="{{ route('admin_users_course', $course->id) }}" class="btn btn-success">Click Here!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                            <div class="gridarea__wraper">
                                <div class="gridarea__content">
                                    <div class="gridarea__heading">
                                        <h3>Absences List</h3>
                                    </div>
                                    <div class="gridarea__price green__color">
                                        More Information! <br> <br>
                                        <a href="{{ route('admin_absences_course', $course->id) }}" class="btn btn-success">Click Here!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection