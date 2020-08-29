@extends('layouts.login')
@section('title', 'تغيير كلمه المرور')
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <section class="flexbox-container">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="col-md-4 col-10 box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header border-0">
                            <div class="card-title text-center">
                                <div class="p-1">
                                    <img src="assets/front/images/logo.png" alt="LOGO"/>

                                </div>
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                <span>الدخول للوحة التحكم </span>
                            </h6>
                        </div>


                        <!-- begin alert error section-->
                        @include('dashboard.includes.alerts.errors')
                        <!-- end alert  error section-->

                        <div class="card-content">
                            <div class="card-body">
                                @include('dashboard.includes.alerts.success')
                                <form class="form-horizontal form-simple" action="{{ route('admin.post.forgot') }}" method="post"
                                      novalidate>
                                      @csrf
                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                        <input type="text" name="email"
                                               class="form-control form-control-lg input-lg"
                                               value="" id="email" placeholder="أدخل البريد الالكتروني ">
                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
                                        </div>

                                        @error('email')

                                        <span class="text-danger">{{ $message }} </span>
                                        @enderror

                                    </fieldset>
                                    <button type="submit" class="btn btn-info btn-lg btn-block"><i
                                            class="ft-unlock"></i>
                                            استعاده كلمه مرور جديده
                                    </button>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-12 text-center text-md-left">
                                                <a href="{{ route('admin.login') }}">دخول</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
