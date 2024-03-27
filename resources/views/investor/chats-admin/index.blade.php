@extends('investor.layouts.index')
<audio src="{{ asset('tones/notification.mp3') }}" id = 'notify' allow="autoplay"></audio>
@push('header_scripts')
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    const pusher = new Pusher("{{config('broadcasting.connections.pusher.key')}}", {cluster: 'eu'});

    const channel = pusher.subscribe('chat{{auth("investor")->user()->id}}');
    channel.bind('sendMessage', function(data) {
        $.post("{{ route('investor.chat.reciveAdmin') }}", {
            _token: '{{ csrf_token() }}',
            message: data.message,

        }).done(function (res) {
            $("#chat_bar").append(res);
        });
    });

    function send(reciver) {
        if ($("#message_text").val() !== '') {

            $.ajax({
        
                url: "{{ route('investor.chat.broadcastAdmin') }}",
                method: "POST", 
                data: {
                    _token: '{{ csrf_token() }}',
                    message: $("#message_text").val(),
                    reciver: reciver
                }
            }).done(function (res) {
                console.log(res);
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
    <livewire:admin.chat />

@endsection
