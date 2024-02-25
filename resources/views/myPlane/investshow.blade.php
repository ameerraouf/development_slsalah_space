@extends('layouts.primary')
@section('head')
    <style>
        .canvasjs-chart-container,
        .canvasjs-chart-canvas {
            /*position: initial !important;*/
        }
    </style>
    @livewireStyles
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mx-auto text-center">
                    @if (!empty($user->photo))
                        <img src="{{ PUBLIC_DIR }}/uploads/{{ $user->photo }}" class="w-20 border-radius-lg shadow-sm">
                    @endif
                    <h3 class="text-dark">العرض الاستثمارى </h3>
                </div>
            </div> 

            <div class="row">
                <form action="{{ route('investshow.update') }}" method="post">
                    @csrf
                    @method('put')
                    <div class="col-md-12 mt-4">
                        <div class="align-self-center">
                            <div>
                                <label for="company_desc" class="form-label mt-3">{{ __('Company Desc') }}</label>
                                <textarea  cols="10" rows="5" name="company_desc" class="form-control">
                                    {!! old('company_desc'), $user->company?->company_description !!}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-info btn-sm float-left mt-4 mb-0">
                            {{ __('Update info') }}
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="row">
                <div class="col-md-12 mx-auto text-center">
                    <h3 class="text-dark">المشكله</h3>
                </div>
                @foreach($projects as $key => $project) 
                    <div class="col-md-4  mt-5">
                        <h3 class="text-dark">المشكله {{ $key+1 }}</h3>
                        <form action="{{ route('investshow.updateproject',$project->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <textarea name="summary" class="form-control" rows="4" id="editor">{{ $project->summary ?? (old('summary') ?? '') }}</textarea>
                            </div>
                            <div class="d-flex  mt-4">
                                <button type="submit" name="button" class="btn btn-info m-0 ">
                                    {{ __('Update info') }}
                                </button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div> 
    </div>  --}}
@livewire('investshow')


@endsection
@section('script')
    {{-- @livewireScripts --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
    @stack('js')
@endsection
