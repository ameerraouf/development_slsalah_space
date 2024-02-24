<div class="d-flex w-100 justify-content-start ">
    <div class="d-flex w-50 p-1 text-white mb-2 justify-content-start rounded-start bg-primary" >
        @if (!is_null($message->file))
            <a href="/download-attachment/{{ $message->file }}" target="_blank">{{ $message->message }}</a>
        @else
            <div class="w-100">

                <p class="lead mb-0">

                    {{ $message->message }}
                </p>
                <div class="d-flex align-items-center justify-content-between">
                    <div></div>
                    <div>
                        {{ $message->created_at->format('h:m A') }}
                    </div>
                </div>
            </div>
        @endif    
    </div>
</div>