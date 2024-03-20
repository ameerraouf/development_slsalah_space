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
            console.log(res);
            //$("#chat_bar").append(res);
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


</script>
@endpush

@section('content')
    <livewire:admin.chat />

    {{-- <div class="box-chat">
        <div class="row">
            <div class="col-md-12">
                <div class="preview">
                    @if(!is_null($user))
                    <div class="card-header bg-primary rounded-0  p-1 d-flex align-items-center" style="height:45.19px;">
                        <div class="img">
                            @if($user->photo && file_exists(url('uploads/' . $user->photo)))
                            <img src="{{ url('uploads/' .  $user->photo) }}" alt="logo" width="50" height="50">
                            @else
                            <img src="{{ url('/'. env('DEFAULT_PHOTO')?? "") }}" alt="logo" width="50" height="50">
                            @endif
                        </div>
                        <h6 class="mb-0 text-white ms-3">
                            {{ $user->first_name . " " . $user->last_name }}
                        </h6>
    
                    </div>
                    <div class="card-body" id="chat_bar">
    
                        @foreach($messages as $message)
                        <div
                            class="d-flex w-100 @if($message->sended_by == 'investor') justify-content-start  @else justify-content-end  @endif">
                            <div class="d-flex p-2 mb-3 justify-content-start  @if($message->sended_by == 'investor') bg-primary @else bg-light text-dark @endif"
                                style="max-width:75%; width:fit-content; border-radius: 10px;" @if (!is_null($message->
                                file))
                                <a href="/download-attachment/{{ $message->file }}"
                                    target="_blank">{{ $message->message }}</a>
                                @else
                                <div class="w-100">
                                    <p class="lead mb-0" style="font-size:15px;">
                                        {{ $message->message }}
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div></div>
                                        <small
                                            style=" @if($message->sended_by == 'investor') color:#ffffff99;  @else color: #78787899; @endif">
                                            {{ $message->created_at->format('h:m A') }}
                                        </small>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <div class="d-flex align-items-center">
                            <div class="inp-file flex-fill">
                                <input type="text" id="message_text" class="form-control"
                                    placeholder="{{ __('website.chat.placeholder_message') }}">
                                <div class="inp">
                                    <input type="file" name="" id="">
                                    <i class="fa-solid fa-paperclip"></i>
                                </div>
                            </div>
                            <button onclick='send({{ $user->id }})' class='btn btn-primary m-0  px-3'
                                style="    margin-inline-start: 5px !important;" id='sendMessage'>
                                <i class="fa-solid fa-paper-plane" style="font-size:14px !important;"></i>
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
          
        </div>
      
    </div> --}}
@endsection
