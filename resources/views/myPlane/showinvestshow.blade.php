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
    

    @livewire('show-invest-show')
@endsection
@section('script')
   {{-- @livewireScripts --}}
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <x-livewire-alert::scripts />
   @stack('js')
@endsection
