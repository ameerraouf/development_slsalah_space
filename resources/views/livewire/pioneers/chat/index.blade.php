
<div>

    <div class="row">
        <div class="col-md-8">
            <div class="preview">
                @if(!is_null($investor))
                <div>
                    <div class="card rounded-0">
                        <div class="card-header d-flex align-items-center">
                            <div class="img">
                                @if($investor->photo && file_exists(url('uploads/' .  $investor->photo)))
                                    <img src="{{ url('uploads/' .  $investor->photo) }}" alt="logo" width="50" height="50">
                                @else
                                    <img src="{{ url('/'. env('DEFAULT_PHOTO')?? "") }}" alt="logo" width="50" height="50">
                                @endif
                            </div>
                            <div class="name ms-3">
                                {{ $investor->first_name . " " . $investor->last_name }}
                            </div>
                        </div>
                        <div class="card-body" id = "chat_bar">

                            @foreach($messages as $message)
                            <div class="d-flex w-100 @if($message->sended_by == 'user') justify-content-start  @else justify-content-end  @endif">
                                <div class="d-flex w-50 p-3 text-white  mb-2 justify-content-start  @if($message->sended_by == 'user')  rounded-start bg-primary @else rounded-end  bg-info @endif" >
                                    {{ $message->message }}
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="card-footer">
                            <div class="d-flex align-items-center">
                                <input type="text" id = "message_text" class="form-control" placeholder  = "{{ __('website.chat.placeholder_message') }}" >
                                <button onclick = 'send({{ $investor->id }})' class = 'btn btn-primary m-0 ms-3' id = 'sendMessage'>
                                    <i class="fa-solid fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif           
            </div>
        </div>
        <div class="col-md-4">
            <div class="chats">
                <div class="card rounded-0">
                    <div class="card-header bg-primary rounded-0  p-1 ">
                        <h4 class="text-white">{{__('website.messages')}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="search">
                            <input wire:model = 'search' type="search" class = 'form-control' name = 'search_chat' placeholder="{{ __('website.chat.search') }}">
                        </div>
                        @foreach($chats as $chat)
                        <button class="btn btn-defualt w-100 d-block rounded-0" wire:click = "openChat({{ $chat->investor->id }})">
                            <div class="box p-2">
                                <div class="d-flex align-items-center">
                    
                                    <div class="img">
                                        @if($chat->investor->photo && file_exists(url('uploads/' .  $chat->investor->photo)))
                                            <img src="{{ url('uploads/' .  $chat->investor->photo) }}" alt="logo" width="50" height="50">
                                        @else
                                            <img src="{{ url('/'. env('DEFAULT_PHOTO')?? "") }}" alt="logo" width="50" height="50">
                                        @endif
                                    </div>
                                    <div class="name ms-3">
                                        {{ $chat->investor->first_name . " " . $chat->investor->last_name }}
                                    </div>
                                </div>
                            </div>
                        </button>
                        @endforeach                    
                    </div>
                </div>
            </div>
        </div>
    </div>    

</div>

