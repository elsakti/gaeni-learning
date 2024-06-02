@extends('trainer.partials.main')

@section('content')
    <div class="col-xl-9 col-lg-9 col-md-12">
        <div class="dashboard__content__wraper">
            <div class="dashboard__section__title">
                <h4>Welcome {{ Auth::user()->name }}</h4>
            </div>
            <div class="row">
                <h1>Selamat Mengajar Semangat Belajar</h1>
            </div>
        </div>
    </div>
@endsection