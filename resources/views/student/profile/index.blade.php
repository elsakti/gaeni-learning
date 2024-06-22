@extends('student.partials.main')

@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title">
            <h4>My Profile</h4>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="dashboard__form dashboard__form__margin">Student Full Name</div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="dashboard__form dashboard__form__margin">: {{ $user->name ? $user->name : 'None' }}</div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="dashboard__form dashboard__form__margin">Student Major</div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="dashboard__form dashboard__form__margin">: {{ $user->head ? $user->head : 'None' }}</div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="dashboard__form dashboard__form__margin">Student NISN/NRP/NIM</div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="dashboard__form dashboard__form__margin">: {{ $user->number ? $user->number : 'None' }}</div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="dashboard__form dashboard__form__margin">Student Institute/School</div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="dashboard__form dashboard__form__margin">: {{ $user->institute ? $user->institute : 'None' }}</div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="dashboard__form dashboard__form__margin">Student Phone Number</div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="dashboard__form dashboard__form__margin">: {{ $user->phone ? $user->phone : 'None' }}</div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="dashboard__form dashboard__form__margin">Student Email</div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="dashboard__form dashboard__form__margin">: {{ $user->email ? $user->email : 'None' }}</div>
            </div>
        </div>
    </div>

</div>
@endsection
