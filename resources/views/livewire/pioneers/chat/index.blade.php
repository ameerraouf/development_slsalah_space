<div class="box-chat">
    <div class="row">
        <div class="preview col-md-8">
            @if (!is_null($investor))
                <div class="card-header bg-primary rounded-0  p-1 d-flex align-items-center" style="height:45.19px;">
                    <div class="img">
                        @if ($investor->photo && file_exists(url('uploads/' . $investor->photo)))
                            <img src="{{ url('uploads/' . $investor->photo) }}" alt="logo" width="50"
                                height="50">
                        @else
                            <img src="{{ url('/' . env('DEFAULT_PHOTO') ?? '') }}" alt="logo" width="50"
                                height="50">
                        @endif
                    </div>
                    <h6 class="mb-0 text-white ms-3">
                        {{ $investor->first_name . ' ' . $investor->last_name }}
                    </h6>
                </div>
                <div class="card-body" id="chat_bar">
                    @foreach ($messages as $message)
                        <div
                            class="d-flex w-100 @if ($message->sended_by == 'user') justify-content-start  @else justify-content-end @endif">
                            <div class="d-flex p-2 mb-3 justify-content-start @if ($message->sended_by == 'user') bg-primary @else bg-light text-dark @endif"
                                style="max-width:75%; width:fit-content; border-radius: 10px;">
                                @if (!is_null($message->file))
                                    <a href="/download-attachment/{{ $message->file }}"
                                        target="_blank">{{ $message->message }}</a>
                                @else
                                    <div class="w-100">

                                        <p class="lead mb-0" style="font-size:15px;@if ($message->sended_by == 'user') color:#ffffff99;  @else color: #78787899; @endif">

                                            {{ $message->message }}
                                        </p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div></div>
                                            <span
                                                style=" @if ($message->sended_by == 'user') color:#ffffff99;  @else color: #78787899; @endif">
                                                {{ $message->created_at->format('h:m A') }}
                                            </span>
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
                            <input onkeypress="enterSend()" type="text" id = "message_text" class="form-control" placeholder  = "{{ __('website.chat.placeholder_message') }}" >
                            <div class="inp" data-bs-toggle="modal" data-bs-target="#uploadsFiles">
                                <i class="fa-solid fa-paperclip"></i>
                            </div>
                        </div>
                        <button id = 'send_btn' onclick = 'send({{ $this->investor->id }})' class = 'btn btn-primary m-0  px-3' style="    margin-inline-start: 5px !important;" id = 'sendMessage'>
                            <i class="fa-solid fa-paper-plane" style="font-size:14px !important;"></i>
                        </button>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-4">
            <div class="chats">
                <div class="card-header bg-primary rounded-0  p-1 d-flex align-items-center justify-content-between">
                    <h6 class="mb-0 text-white">الرسائل</h6>
                </div>
                <div class="card-body">
                    <div class="search">
                        <input wire:model='search' type="search" class='form-control' name='search_chat'
                            placeholder="بحث عن رسالة">
                    </div>
                    @foreach ($chats as $chat)
                        <button class="btn btn-defualt w-100 d-block rounded-0"
                            wire:click="openChat({{ $chat->investor->id }})">
                            <div class="box p-2">
                                <div class="d-flex align-items-center">

                                    <div class="img">
                                        @if ($chat->investor->photo && file_exists(url('uploads/' . $chat->investor->photo)))
                                            <img src="{{ url('uploads/' . $chat->investor->photo) }}" alt="logo"
                                                width="50" height="50">
                                        @else
                                            <img src="{{ url('/' . env('DEFAULT_PHOTO') ?? '') }}" alt="logo"
                                                width="50" height="50">
                                        @endif
                                    </div>
                                    <div class="name ms-3">
                                        {{ $chat->investor->first_name . ' ' . $chat->investor->last_name }}
                                    </div>
                                    
                                    <div class="unreaded" @if($chat->pioneerUnreadMessages($chat->investor->id) <= 0) style = 'display:none' @endif id = 'user_{{ $chat->investor->id }}'>
                                        <span class="badge bg-success">{{ $chat->pioneerUnreadMessages($chat->investor->id) }}</span>
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