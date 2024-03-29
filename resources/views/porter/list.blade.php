@extends('layouts.primary')
@section('content')

    <div class=" row">
        <div class="col">
            <h5 class="mb-2 text-secondary fw-bolder">
                {{__('Porter Five test')}}
            </h5>

        </div>
        <div class="col text-end">
            <a href="/new-porter" type="button" class="btn btn-info" style="text-transform:capitalize">
                {{__('New Porter Five Forces Model')}}
            </a>
        </div>
    </div>

    <div>
        <div class="row">
            @foreach($models as $model)
                <div class="col-lg-4 col-md-6 col-12 mt-lg-0 mb-4">
                    <div class="card mb-3 mt-lg-0 mt-4">
                        <div class="card-body pb-0">
                            <div class="row align-items-center mb-3">
                                <div class="col-9">
                                    <h5 class=" fw-bolder text-dark text-primary">
                                        <a href="/view-porter?id={{$model->id}}">{{$model->company_name}}</a>

                                    </h5>
                                </div>
                                <div class="col-3 text-end">
                                    <div class="dropstart">
                                        <a href="javascript:" class="text-secondary" id="dropdownMarketingCard"
                                           data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3"
                                            aria-labelledby="dropdownMarketingCard">
                                            <li><a class="dropdown-item border-radius-md"
                                                   href="/new-porter?id={{$model->id}}">{{__('Edit')}}</a></li>

                                            <li><a class="dropdown-item border-radius-md"
                                                   href="/view-porter?id={{$model->id}}">{{__('See Details')}}</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item border-radius-md text-danger delete-btn"
                                                   href="/delete/porter/{{$model->id}}">{{__('Delete')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h5 class="text-secondary text-sm">{{(\App\Supports\DateSupport::parse($model->updated_at))->format(config('app.date_time_format'))}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    <script>
         $('body').on('click', '.delete-btn', function(e) {
            e.preventDefault()
            var result = window.confirm("هل أنت متأكد من الحذف؟");
            let targetLink = $(this).attr('href')
            if (result) {
                window.location.href = targetLink;
            }

        })
    </script>
@endsection