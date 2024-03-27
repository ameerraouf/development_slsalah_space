@extends('investor.layouts.index')
{{--<link rel="stylesheet" href="{{asset('audio/manage-audio.css')}}">--}}
<audio src="{{ asset('tones/notification.mp3') }}" id = 'notify' allow="autoplay"></audio>

@push('header_scripts')
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = false;

    const pusher = new Pusher("{{config('broadcasting.connections.pusher.key')}}", {cluster: 'eu'});

    const channel = pusher.subscribe('chat{{auth("investor")->user()->id}}');
    channel.bind('sendMessage', function(data) {
        $.post("{{ route('investor.chat.recive') }}", {
            _token: '{{ csrf_token() }}',
            message: data.message,

        }).done(function (res) {
            document.querySelector('#notify').play();
            $("#chat_bar").append(res);
        });
        $.post("{{ route('investor.chat.getCount') }}", {
            _token: '{{ csrf_token() }}',
            user_id: data.reciver_id,

        }).done(function (res) {
            $("#user_" + data.reciver_id).fadeIn();
            $("#user_" + data.reciver_id + " span").text(res);
        });
    });

    function send(user_id) {

        if ($("#message_text").val() !== '') {

            $.ajax({
        
                url: "{{ route('investor.chat.broadcast') }}",
                method: "POST", 
                data: {
                    _token: '{{ csrf_token() }}',
                    message: $("#message_text").val(),
                    user_id: user_id
                }
            }).done(function (res) {
                $("#chat_bar").append(res);
                $("#message_text").val('');
            });
        }
    }
    function enterSend() {

        if (event.key === "Enter") {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("send_btn").click();
        }
    }   


</script>
@endpush

@section('content')
    <livewire:investor.chat />
@endsection
