@if ($currentStep != 17)
    <div style="display: none" class="row setup-content" id="step-5">
@endif
<div class="card min-height-250 p-3" >
    <div class="container">
                <h3 class="text-dark text-center mb-3">{{ __('thanku') }}</h3>
                <div class="row g-3">
                    <div class="col-md-12 row g-3 row-cols-1 row-cols-sm-2 row-cols-md-3">
                        <div class="col">
                            <label for="email">البريد الالكترونى: </label>
                            <input type="email" wire:model="email" class="form-control" placeholder="email">
                            @error("email")
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                        <label for="email">الهاتف</label>
                            <input type="tel" wire:model="phone" class="form-control" placeholder="phone">
                            @error("phone")
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                        <label for="website_url">رابط الموقع </label>
                            <input type="text" wire:model="website_url" class="form-control" placeholder="website_url">
                            @error("website_url")
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class=" card min-height-250" style="background-image: url('{{ display_file($image5)}}');" >
                            <div class="container p-4">
                                <div class="row">
                                    @include('livewire.logo')
                                    <div class="col-md-12 mx-auto text-center">
                                        <h3 class="text-dark">شكرا لكم</h3>
                                        <h5 class="text-dark">هل عندك اى استفسار؟</h5>
                                    </div>
                                    {{-- <div class="col-md-12">
                                            <img src="{{ asset('13.png') }}" alt="" style="width: 600px;">
                                    </div> --}}
                                    <div class="col-md-">
                                        <label for="email">البريد الالكترونى: </label>
                                        <p>{{ $email }}</p>
                                        <br>
                                        <label for="email">الهاتف</label>
                                        <p>{{ $phone }}</p>
                                        <br>
                                        <label for="website_url">رابط الموقع </label>
                                        <p>{{ $website_url }}</p>
                                        <br>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 justify-content-center mt-3">
                    <button class="btn btn-warning mt-0" type="button" wire:click="back(16)">
                        {{ trans('Back') }}
                    </button>
                        <button class="btn btn-primary mt-0" type="button" wire:click="thankuSubmit">{{ __('save') }}</button>
                </div>
            </div>
</div>
    </div>