<div class="box-chat">
    <div class="row">
        <div class="col-md-8">
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
        {{-- <div class="col-md-4">
            <div class="chats">
                    <div class="card-header bg-primary rounded-0  p-1 d-flex align-items-center justify-content-between">
                        <h6 class="mb-0 text-white">الرسائل</h6>
                        <div class="badge " data-bs-toggle="modal" data-bs-target="#admins">
                            <i class="fa-solid fa-plus fa-2x text-white"></i>                        
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="search">
                            <input wire:model = 'search' type="search" class = 'form-control' name = 'search_chat' placeholder="بحث عن رسالة">
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
        </div> --}}
    </div>
    <!-- Modal -->
    {{-- <div class="modal fade" id="admins" tabindex="-1" aria-labelledby="admins" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="admins">{{ __('website.admins') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach($admins as $admin)
                    <div class="box p-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="user d-flex align-items-center ">

                                <div class="img">
                                    @if($admin->photo && file_exists(url('uploads/' . $admin->photo)))
                                    <img src="{{ url('uploads/' .  $admin->photo) }}" alt="logo" width="50" height="50">
                                    @else
                                    <img src="{{ url('/'. env('DEFAULT_PHOTO')?? "") }}" alt="logo" width="50"
                                        height="50">
                                    @endif
                                </div>
                                <div class="name ms-3">
                                    {{ $admin->first_name . " " . $admin->last_name }}
                                </div>
                            </div>
                            <div class="action">
                                <button class="btn btn-primary m-0" data-bs-dismiss="modal"
                                    wire:click='openChat({{ $admin->id }})'>{{ __('website.chat.send') }}</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}
</div>