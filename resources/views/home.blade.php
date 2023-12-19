@extends('layouts.admin_app')

@section('title')
{{ Auth::user()->name }} | Login System
@endsection

@push('content_header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ trans('global.dashboard') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">{{ trans('global.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ Auth::user()->name }}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endpush

@section('content')

<div class="container-fluid">
    <h5 class="mb-2 mt-4">គ្រប់គ្រង</h5>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <?php
                        $count = 0;
                        foreach($appointment as $row){
                            $count++;
                        }
                    ?>
                    <h3>{{$count}}</h3>

                    <p>New Appointment</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <?php
                        $count = 0;
                        foreach($doctor as $row){
                            $count++;
                        }
                    ?>
                    <h3>{{$count}}</h3>

                    <p>Doctors</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-nurse"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <?php
                        $count = 0;
                        foreach($patient as $row){
                            $count++;
                        }
                    ?>
                    <h3>{{$count}}</h3>

                    <p>Patient Appointment</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <?php
                        $count = 0;
                        foreach($contact as $row){
                            $count++;
                        }
                    ?>
                    <h3>{{$count}}</h3>

                    <p>Contact</p>
                </div>
                <div class="icon">
                    <i class="fas fa-address-book"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <h5 class="mb-2">សង្ខេបពត៌មាន</h5>
    <div class="row">
        {{-- <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Contact</span>
                    
                    <span class="info-box-number">{{$count}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div> --}}
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Service</span>
                    <?php
                        $count = 0;
                        foreach($service as $row){
                            $count++;
                        }
                    ?>
                    <span class="info-box-number">{{$count}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        {{-- <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Patients</span>
                    <?php
                        $count = 0;
                        foreach($patient as $row){
                            $count++;
                        }
                    ?>
                    <span class="info-box-number">{{$count}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div> --}}
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Testimonial</span>
                    <?php
                        $count = 0;
                        foreach($testimonial as $row){
                            $count++;
                        }
                    ?>
                    <span class="info-box-number">{{$count}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

    <!-- =========================================================== -->




</div>
@endsection

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
