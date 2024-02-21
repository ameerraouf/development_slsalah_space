<div>
    <div class="row">
        <div class="col-md-8">
            <div class="preview">
                @if(!is_null($user))
                <div>
                    <div class="card rounded-0">
                        <div class="card-header d-flex align-items-center">
                            <div class="img">
                                @if($user->photo && file_exists(url('uploads/' .  $user->photo)))
                                    <img src="{{ url('uploads/' .  $user->photo) }}" alt="logo" width="50" height="50">
                                @else
                                    <img src="{{ url('/'. env('DEFAULT_PHOTO')?? "") }}" alt="logo" width="50" height="50">
                                @endif
                            </div>
                            <div class="name ms-3">
                                {{ $user->first_name . " " . $user->last_name }}
                            </div>
                        </div>
                        <div class="card-body" id = "chat_bar">

                            @foreach($messages as $message)
                            <div class="d-flex w-100 @if($message->sended_by == 'investor') justify-content-start  @else justify-content-end  @endif">
                                <div class="d-flex w-50 p-3 text-white  mb-2 justify-content-start  @if($message->sended_by == 'investor')  rounded-start bg-primary @else rounded-end  bg-info @endif" >
                                    @if ( $message->file !== '')
                                        <a href="/download-attachment/{{ $message->file }}" target="_blank">{{ $message->message }}</a>
                                    @else
                                        {{ $message->message }}
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="card-footer">
                            <div class="d-flex align-items-center">
                                <input type="text" id = "message_text" class="form-control" placeholder  = "{{ __('website.chat.placeholder_message') }}" >
                                <button onclick = 'send({{ $user->id }})' class = 'btn btn-primary m-0 ms-3' id = 'sendMessage'>
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
                    <div class="card-header bg-primary rounded-0  p-1 d-flex align-items-center justify-content-between">
                        <h4 class="text-white">{{__('website.messages')}}</h4>
                        <div class="badge " data-bs-toggle="modal" data-bs-target="#pioneers">
                            <i class="fa-solid fa-plus fa-2x text-white"></i>                        
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="search">
                            <input wire:model = 'search' type="search" class = 'form-control' name = 'search_chat' placeholder="{{ __('website.chat.search') }}">
                        </div>
                        @foreach($chats as $chat)
                        <button class="btn btn-defualt w-100 d-block rounded-0" wire:click = "openChat({{ $chat->user->id }})">
                            <div class="box p-2">
                                <div class="d-flex align-items-center">
                    
                                    <div class="img">
                                        @if($chat->user->photo && file_exists(url('uploads/' .  $chat->user->photo)))
                                            <img src="{{ url('uploads/' .  $chat->user->photo) }}" alt="logo" width="50" height="50">
                                        @else
                                            <img src="{{ url('/'. env('DEFAULT_PHOTO')?? "") }}" alt="logo" width="50" height="50">
                                        @endif
                                    </div>
                                    <div class="name ms-3">
                                        {{ $chat->user->first_name . " " . $chat->user->last_name }}
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
    <!-- Modal -->
    <div class="modal fade" id="pioneers" tabindex="-1" aria-labelledby="pioneers" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pioneers">{{ __('website.pioneers') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach($pioneers as $pioneer)
                    <div class="box p-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="user d-flex align-items-center ">

                                <div class="img">
                                    @if($pioneer->photo && file_exists(url('uploads/' .  $pioneer->photo)))
                                        <img src="{{ url('uploads/' .  $pioneer->photo) }}" alt="logo" width="50" height="50">
                                    @else
                                        <img src="{{ url('/'. env('DEFAULT_PHOTO')?? "") }}" alt="logo" width="50" height="50">
                                    @endif
                                </div>
                                <div class="name ms-3">
                                    {{ $pioneer->first_name . " " . $pioneer->last_name }}
                                </div>
                            </div>
                            <div class="action">
                                <button class="btn btn-primary m-0" data-bs-dismiss="modal" wire:click = 'openChat({{ $pioneer->id }})'>{{ __('website.chat.send') }}</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
