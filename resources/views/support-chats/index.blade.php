@extends('layouts.primary')
{{--<link rel="stylesheet" href="{{asset('audio/manage-audio.css')}}">--}}
<audio src="{{ asset('tones/notification.mp3') }}" id = 'notify' allow="autoplay"></audio>
@push('header_scripts')
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    const pusher = new Pusher("{{config('broadcasting.connections.pusher.key')}}", {cluster: 'eu'});

    const channel = pusher.subscribe('chat{{auth()->user()->id}}');
    channel.bind('sendMessage', function(data) {
        $.post("{{ route('support-chats.reciveInAdmin') }}", {
            _token: '{{ csrf_token() }}',
            message: data.message,

        }).done(function (res) {
            console.log(res);
            //$("#chat_bar").append(res);
        });
    });

    function send(sender) {
        if ($("#message_text").val() !== '') {

            $.ajax({
        
                url: "{{ route('support-chats.broadcastInAdmin') }}",
                method: "POST", 
                data: {
                    _token: '{{ csrf_token() }}',
                    message: $("#message_text").val(),
                    sender: sender
                }
            }).done(function (res) {
                console.log(res);
                $("#chat_bar").append(res);
                $("#message_text").val('');
            });
        }
    }


    </script>
@endpush
@section('content')
    <livewire:admin.support />
@endsection
