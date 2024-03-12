<div class="col-md-12 mt-4" style="margin-right: 900px;">
    @php $user = Auth::user(); @endphp
    @if ($user->company && $user->company->company_logo)
        <img src="{{ PUBLIC_DIR }}/uploads/{{ $user->company->company_logo }}" 
        class="w-20 border-radius-lg shadow-sm " style="width: 100px !important;">
    @endif
</div>