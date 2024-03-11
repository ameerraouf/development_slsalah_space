@extends('layouts.'.($layout ?? 'primary'))
@section('content')
    <style>
        .loader {
        width: 120px;
        height: 20px;
        -webkit-mask: linear-gradient(90deg,#09008d 70%,#0000 0) left/20% 100%;
        background:
        linear-gradient(#0400ff 0 0) left -25% top 0 /20% 100% no-repeat
        #000000;
        animation: l7 1s infinite steps(6);
        }
        @keyframes l7 {
            100% {background-position: right -25% top 0}
        }
    </style>
    <div class="row gx-4">
        <div class="col">
            <h5 class=" text-secondary fw-bolder">
                استيراد من ملف إكسيل
            </h5>
        </div>
    </div>
    <div class="row  mb-5">
        <div class="col-md-8 mt-lg-0 mt-4">
            <form enctype="multipart/form-data" action="{{ route('investors.import.Post') }}" method="POST">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card mt-4" id="basic-info">
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <div>
                                    <label for="file" class="form-label mt-4">تحميل ملف</label>
                                    <input class="form-control" name="file" required accept=".xls, .xlsx" type="file" id="file">
                                </div>
                            </div>
                        </div>
                        @csrf
                        <button id="loadButton" type="submit" class="btn btn-info btn-sm float-left mt-4 mb-0">
                            تحميل
                        </button>
                        <div class="loader-text d-none" style="font-weight: bolder; color:#000000">جاري معالجة البيانات الرجاء الانتظار قليلا. لا تقم بعمل تحديث للصفحه</div>
                        <div id="loader" class="loader d-none"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @section('script')
        <script>
        $('body').on('click', '#loadButton', function(e) {
            var fileInput = document.getElementById('file');
            if (fileInput.files.length === 0) {
                return; 
            }
            $('#loader').removeClass('d-none');
            $(this).css({
                "opacity": "0.5"
            });
            $('.loader-text').removeClass('d-none');
        });
        </script>
    @endsection
@endsection