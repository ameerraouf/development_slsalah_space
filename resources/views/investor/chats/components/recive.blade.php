<div class="d-flex w-100 justify-content-end ">
    <div class="d-flex w-50 p-1 text-white mb-2 justify-content-end rounded-end bg-info" >
        @if (!is_null($message['file']))
            <a href="/download-attachment/{{ $message['file'] }}" target="_blank">{{ $message->message }}</a>
        @else
            <div class="w-100">

                <p class="lead mb-0">

                    {{ $message['message'] }}
                </p>
                <div class="d-flex align-items-center justify-content-between">
                    <div></div>
                    <div>
                        {{ date('h:m A', strtotime($message['created_at'])) }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>