@extends('layouts.admin')
@section('title', 'اضافه علامه')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href="">  العلامات </a>
                            </li>
                            <li class="breadcrumb-item active">اضافه علامه
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
                                <h4 class="card-title" id="basic-layout-form"> اضافه علامه </h4>
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
                                    <form class="form" action="{{ route('store.tags')}}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                        {{-- <div class="form-group">
                                            <div class="text-center">
                                                <img
                                                    src=""
                                                    alt="صوره القسم"
                                                    class="rounded-circle"
                                                    style="width:100px;height:100px"
                                                >

                                            </div>

                                        </div> --}}




                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> بيانات  العلامه </h4>


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  اسم العلامه </label>
                                                        <input type="text" value="" id="name"
                                                               class="form-control"
                                                               placeholder=" "
                                                               name="name">
                                                         @error("name")

                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  اسم العلامه بالرابط </label>
                                                        <input type="text" value="" id="name"
                                                               class="form-control"
                                                               placeholder=" "
                                                               name="slug">
                                                         @error("slug")

                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>


                                            </div>


                                        </div>


                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> اضافه
                                            </button>
                                        </div>
                                    </form>
                                {{-- tabs for other languages --}}


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

