@extends('investor.layouts.index')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <form action="{{ route('investor.sharePost',$document->id) }}" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-lg-12 col-12 mx-auto">
                    <h4 class="mb-0">مشاركة ملف {{ $document->name }}</h4>
                    <div class="card card-body mt-4">
                        * قم بتحديد الشركات التي تريد مشاركة الملف معها
                        <div class="row">
                            @foreach ($opportunities as $opportunity)
                                <input type="hidden" name="path" value="{{ $document->path }}">
                                <div class="mt-3 col-lg-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="selected_opportunities[]" value="{{ $opportunity->pioneer->id }}" type="checkbox" id="{{ $opportunity->pioneer->id }}">
                                        <label class="form-check-label" for="share_round">{{ $opportunity->pioneer->company_name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col -lg-12 text-center  mt-4 ">
                            <button type="submit" class="btn btn-info m-0 ">
                                مشاركة
                            </button>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>


    @endsection



