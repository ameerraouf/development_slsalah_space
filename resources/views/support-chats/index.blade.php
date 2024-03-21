@extends('investor.layouts.index')
{{--<link rel="stylesheet" href="{{asset('audio/manage-audio.css')}}">--}}
<audio src="{{ asset('tones/notification.mp3') }}" id = 'notify' allow="autoplay"></audio>

@section('content')
    <livewire:investor.chat />
@endsection
