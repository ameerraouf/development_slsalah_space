@extends('layouts.primary')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <form action="{{route('found-round-update', $round->id)}}" method="post">
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
                    <h4 class="mb-0">{{ __('Found Round') }}</h4>
                    <div class="card card-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="round_amount" class="form-label">{{ __('Found Round Amount') }}</label>
                                <input type="number" min="1" value="{{$round->round_amount}}" name="round_amount" class="form-control" id="round_amount">    
                            </div>

                            <div class="mt-3 col-lg-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="share_round" type="checkbox" {{$round->share_round? 'checked': null}} id="share_round">
                                    <label class="form-check-label" for="share_round">{{ __('Share Round') }}</label>
                                  </div>
                            </div>

                            <div class="mt-4 col-lg-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="share_plan" type="checkbox" {{$round->share_plan? 'checked': null}} id="share_plan">
                                    <label class="form-check-label" for="share_plan">{{ __('Share Plan') }}</label>
                                  </div>
                            </div>

                            <div class="mt-4 col-lg-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="share_profile" type="checkbox" {{$round->share_profile? 'checked': null}} id="share_profile">
                                    <label class="form-check-label" for="share_profile">{{ __('Share Profile') }}</label>
                                  </div>
                            </div>
                        </div>
                       

                     

                        <div class="col -lg-12 text-center  mt-4 ">

                            <button type="submit" name="button" class="btn btn-info m-0 ">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>
@endsection
@section('script')

@endsection
