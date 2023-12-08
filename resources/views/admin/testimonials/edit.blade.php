@extends('layouts.admin_app')
@push('styles')
<link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/daterangepicker/daterangepicker.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet"
  href="{{ asset('admin_assets') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet"
  href="{{ asset('admin_assets') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- BS Stepper -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/bs-stepper/css/bs-stepper.min.css">
<!-- dropzonejs -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/dropzone/min/dropzone.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/dist/css/adminlte.min.css">

@endpush
@push('content_header')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ trans('global.create') }} {{ trans('menu.testimonials') }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ trans('global.create') }} {{ trans('menu.testimonials') }}</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endpush

@section('content')

<form action="{{route('testimonial.update',$testimonial->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="row">
    <div class="col-md-8">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h4 class="float-left">{{ trans('global.create') }} {{ trans('menu.testimonials') }}</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <input name="name" class="form-control form-control-lg" type="text" placeholder="Name" value="{{$testimonial->name}}">
          <br>
          <div class="form-group">
            <label for="detail">Detail</label>
            <div class="input-group">
              <textarea style="width: 100%;" id="summernote" name="detail"
                class="form-control form-control-lg">{{$testimonial->detail}}</textarea>
            </div>
          </div>
          <br>
          <input name="profession" class="form-control form-control-lg" type="text" placeholder="Profession title" value="{{$testimonial->profession}}">
          <br>


        </div>
        <!-- /.card-body -->
      </div>
    </div>

    <div class="col-md-4">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h4 class="float-left">{{ trans('global.action') }} {{ trans('menu.testimonials') }}</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
                <img class="img-thumbnail" src="{{ url('storage/testimonial/'.$testimonial->photo) }}"
                    alt="{{ $testimonial->photo }}">
                <label for="upload_file">Upload Photo</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="hidden" name="old_image" value="{{ $testimonial->photo }}">
                        <input name="photo" type="file" class="custom-file-input" id="upload_file">
                        <label class="custom-file-label" for="upload_file">Choose Image</label>
                    </div>
                </div>
            </div>
          <div class="form-group">
            <label for="exampleInputFile">Status</label>
            <div class="input-group">
              <input type="checkbox" name="status" checked data-bootstrap-switch data-off-color="danger"
                data-on-color="success">


            </div>
          </div>
          <br>

          <input type="submit" class="btn btn-primary" value="Save">
          <a href="{{ route('testimonial.index') }}" class="btn btn-danger">Cancel</a>
        </div>
        <!-- /.card-body -->
      </div>
    </div>

  </div>
</form>

@endsection


@push('scripts')

<!-- Select2 -->
<script src="{{ asset('admin_assets') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('admin_assets') }}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="{{ asset('admin_assets') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="{{ asset('admin_assets') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('admin_assets') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin_assets') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Bootstrap Switch -->
<script src="{{ asset('admin_assets') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="{{ asset('admin_assets') }}/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="{{ asset('admin_assets') }}/plugins/dropzone/min/dropzone.min.js"></script>


<script>
  $(function () {    
      $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })
  
    })  
</script>
@endpush