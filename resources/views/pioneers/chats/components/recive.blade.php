<div
class="d-flex w-100 justify-content-end ">
<div class="d-flex p-2 mb-3 justify-content-start bg-light text-dark"
    style="max-width:75%; width:fit-content; border-radius: 10px;">
    @if (!is_null($message['file']))
        <a href="/download-attachment/{{ $message['file'] }}"
            target="_blank">{{ $message['message'] }}</a>
    @else
        <div class="w-100">

            <p class="lead mb-0" style="font-size:15px;color:#EEE">

                {{ $message['message'] }}
            </p>
            <div class="d-flex align-items-center justify-content-between">
                <div></div>
                <span
                    style="color: #78787899; ">
                    {{ date('h:m A', strtotime($message['created_at'])) }}
                </span>
            </div>
        </div>
    @endif
</div>
</div>