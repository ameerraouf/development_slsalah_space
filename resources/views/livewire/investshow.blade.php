    
<div class="invest-show">
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif
    @if ($catchError)
        <div class="alert alert-danger" id="success-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $catchError }}
        </div>
    @endif
    {{-- <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');"> --}}
    {{-- <div class="card min-height-250 " >
        <div class="container">
            <div class="row">
                <div class="col-md-7 mx-auto " style="position:relative ;">
                    @php $user = Auth::user(); @endphp
                    @if ($user->company->company_logo)
                        <img src="{{ PUBLIC_DIR }}/uploads/{{ $user->company->company_logo }}" 
                        class="w-20 border-radius-lg shadow-sm" style="position: absolute; right: 1045px;">
                    @endif
                    <h3 class="text-dark">العرض الاستثمارى </h3>
                </div>
            </div> 
        </div>
    </div> --}}
    <br>
    {{-- <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>{{ trans('form1') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>{{ trans('form2') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}">3</a>
                <p>{{ trans('form3') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-circle {{ $currentStep != 4 ? 'btn-default' : 'btn-success' }}" disabled="disabled">4</a>
                <p>{{ trans('form4') }}</p>
            </div>
        </div>
    </div> --}}

    @include('livewire.companydesc')
    @include('livewire.problem')
    @include('livewire.solve')
    @include('livewire.market')
    @include('livewire.products')
    @include('livewire.compatitive')
    @include('livewire.team')
    @include('livewire.competitors') 
    
    @include('livewire.marketplan') 
    @include('livewire.developplan') 
    @include('livewire.finincalplan') 
    @include('livewire.requireinvestment') 
    @include('livewire.thanku') 
</div>