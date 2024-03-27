<div class="box-chat">
    <div class="row">
        <div class="preview col-md-12">
            @if (!is_null($admin))
                <div class="card-header bg-primary rounded-0  p-1 d-flex align-items-center" style="height:45.19px;">
                    <div class="img">
                        @if ($admin->photo && file_exists(url('uploads/' . $admin->photo)))
                            <img src="{{ url('uploads/' . $admin->photo) }}" alt="logo" width="50"
                                height="50">
                        @else
                            <img src="{{ url('/' . env('DEFAULT_PHOTO') ?? '') }}" alt="logo" width="50"
                                height="50">
                        @endif
                    </div>
                    <h6 class="mb-0 text-white ms-3">
                        {{ $admin->first_name . ' ' . $admin->last_name }}
                    </h6>
                </div>
                <div class="card-body" id="chat_bar">
                    @foreach ($messages as $message)
                        <div
                            class="d-flex w-100 @if ($message->sender_type == 'investor') justify-content-start  @else justify-content-end @endif">
                            <div class="d-flex p-2 mb-3 justify-content-start @if ($message->sender_type == 'investor') bg-primary @else bg-light text-dark @endif"
                                style="max-width:75%; width:fit-content; border-radius: 10px;">
                                @if (!is_null($message->file))
                                    <a href="/download-attachment/{{ $message->file }}"
                                        target="_blank">{{ $message->message }}</a>
                                @else
                                    <div class="w-100">

                                        <p class="lead mb-0" style="font-size:15px;@if ($message->sender_type == 'investor') color:#ffffff99;  @else color: #78787899; @endif">

                                            {{ $message->message }}
                                        </p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div></div>
                                            <span
                                                style=" @if ($message->sender_type == 'investor') color:#ffffff99;  @else color: #78787899; @endif">
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
                            <input onkeypress="enterSend()" wire:model = 'message_text' type="text" id="message_text" class="form-control"
                                placeholder="{{ __('website.chat.placeholder_message') }}" >
                            <div class="inp">
                                <input type="file" name="file"  id="">
                                <i class="fa-solid fa-paperclip"></i>
                            </div>
                        </div>
                        <button  id = 'send_btn' onclick='send({{ $admin->id }})' class='btn btn-primary m-0  px-3'
                            style="margin-inline-start: 5px !important;" id='sendMessage'>
                            <i class="fa-solid fa-paper-plane" style="font-size:14px !important;"></i>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>