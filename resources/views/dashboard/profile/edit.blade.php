@extends('layouts.admin')
@section('title', __('admin/edit_shipping.edit_profile'))
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('admin/edit_shipping.home') </a>
                            </li>
                            <li class="breadcrumb-item"><a href=""> @lang('admin/edit_shipping.edit_profile') </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> @lang('admin/edit_shipping.edit_profile') </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="{{ route('update.profile') }}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf


                                        <input type="hidden" name="id" value="{{ $admin->id }}">

                                        <div class="form-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('admin/edit_shipping.name')</label>
                                                        <input type="text" value="{{ $admin->name }}" id="name"
                                                               class="form-control"
                                                               placeholder=" "
                                                               name="name">
                                                         @error("name")

                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> @lang('admin/edit_shipping.email') </label>
                                                        <input type="text" value="{{ $admin->email }}" id="name"
                                                               class="form-control"
                                                               placeholder=" "
                                                               name="email">
                                                         @error("email")

                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> @lang('admin/edit_shipping.password') </label>
                                                        <input type="password" value="" id="name"
                                                               class="form-control"
                                                               placeholder=" "
                                                               name="password">
                                                         @error("password")

                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> @lang('admin/edit_shipping.password_confirmation') </label>
                                                        <input type="password" value="" id="name"
                                                               class="form-control"
                                                               placeholder=" "
                                                               name="password_confirmation">
                                                         @error("password_confirmation")

                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                            </div>



                                        </div>


                                        <div class="form-actions">
                                           
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> @lang('admin/edit_shipping.update')
                                            </button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>


@endsection

