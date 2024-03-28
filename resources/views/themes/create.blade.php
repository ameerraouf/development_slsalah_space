@extends('layouts.super-admin-portal')
@section('head')
{{-- "caouecs/laravel-lang": "*", --}}
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('fileinput/css/fileinput.min.css') }}"> --}}
@endsection
@section('content')
    <div class=" row mb-2">
        <div class="col">
            <h5 class=" text-secondary fw-bolder">
                {{ __('ThemeSettings') }}
            </h5>
        </div>
    </div>
    <div class="row">
        {{-- <div class="col-12"> --}}
            <x-messages></x-messages>
           
            <div class="card card-body mb-4">

                <div class="card-body px-0 pt-0 pb-2 ">
                    <form class="form" action="{{ route('super-admin-themes.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label>{{ __('themename') }}</label>
                            <input type="text" class="form-control" name="name">
                            @error('themename')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        {{-- <div class="col-md-12">
                            <label> {{ __('themeimage') }}</label>
                            <div class="file-loading">
                                <input type="file" name="images[]" id="themeimages" class="file-input-overview" multiple="multiple" accept="image/*">
                                @error('images.*')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div> --}}
                        <div class="row">
                            {{-- <div class="col-md-3">
                                <label> {{ __('requireinvestment') }}</label>
                                <div class="">
                                    <input type="file" name="image1"   accept="image/*" class="form-control img1">
                                    <h6 class="form-text text-muted">{{ __('hint') }}</h6>
                                    @error('image1')<span class="text-danger">{{ $message }}</span>@enderror
                                    <img src="{{ asset('no-image.jpg') }}" alt="" class="img-thumbnail img-preview1" width="960px" height="540px">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label> {{ __('solve') }}</label>
                                <div class="">
                                    <input type="file" name="image2"   accept="image/*" class="form-control img2">
                                    <h6 class="form-text text-muted">{{ __('hint') }}</h6>
                                    @error('image2')<span class="text-danger">{{ $message }}</span>@enderror
                                    <img src="{{ asset('no-image.jpg') }}" alt="" class="img-thumbnail img-preview2" width="960px" height="540px">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label> {{ __('developplan') }}</label>
                                <div class="">
                                    <input type="file" name="image3"   accept="image/*" class="form-control img3">
                                    <h6 class="form-text text-muted">{{ __('hint') }}</h6>
                                    @error('image3')<span class="text-danger">{{ $message }}</span>@enderror
                                    <img src="{{ asset('no-image.jpg') }}" alt="" class="img-thumbnail img-preview3" width="960px" height="540px">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label> {{ __('marketplan') }}</label>
                                <div class="">
                                    <input type="file" name="image4"   accept="image/*" class="form-control img4">
                                    <h6 class="form-text text-muted">{{ __('hint') }}</h6>
                                    @error('image4')<span class="text-danger">{{ $message }}</span>@enderror
                                    <img src="{{ asset('no-image.jpg') }}" alt="" class="img-thumbnail img-preview4" width="960px" height="540px">
                                </div>
                            </div> --}}
                            <div class="col-md-3">
                                <label> {{ __('image') }}</label>
                                <div class="">
                                    <input type="file" name="image5"   accept="image/*" class="form-control img5">
                                    <h6 class="form-text text-muted">{{ __('hint') }}</h6>
                                    @error('image5')<span class="text-danger">{{ $message }}</span>@enderror
                                    <img src="{{ asset('no-image.jpg') }}" alt="" class="img-thumbnail img-preview5" width="960px" height="540px">
                                </div>
                            </div>
                           
                        </div>
                        
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> {{ __('save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        {{-- </div> --}}
    </div>
@endsection
@section('script')
{{-- <script src="{{ asset('fileinput/js/plugins/piexif.min.js') }}"></script>
<script src="{{ asset('fileinput/js/plugins/sortable.min.js') }}"></script>
<script src="{{ asset('fileinput/js/fileinput.min.js') }}"></script>
<script>
    $("#themeimage").fileinput({
    // theme: "bs5",
    maxFileCount: 16,
    // allowedFileTypes: ['pdf'],
    allowedFileExtensions: ['jpg', 'png', 'gif','jpeg','svg'],
    showCancel: true,
    showRemove: false,
    showUpload: false,
    overwriteInitial: false
});
</script> --}}
<script>
    $(".img1").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(".img-preview1").attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    $(".img2").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(".img-preview2").attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    $(".img3").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(".img-preview3").attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    $(".img4").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(".img-preview4").attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    $(".img5").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(".img-preview5").attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endsection
