@extends('frontend.layout')
@section('title', 'Home')
@section('content')

    <section class="min-vh-100">
        <div class="row my-6">
            <div class="col-md-7">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="text-center mx-auto">
                            <h1 class=" text-purple mb-4 mt-10">{{ __('“Play by the rules, but be ferocious.” ') }}</h1>
                            <h6 class="text-lead text-success">{{ __('– Phil Knight') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="container">
                    <div class=" card z-index-0 mt-5">
                        <div class="card-header text-start pt-4">
                            <h4>{{ __('SignUp') }}</h4>
                        </div>
                        <div class="card-body">
                            <form role="form text-left" method="post" action="/signup">
                                @if (session()->has('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert bg-pink-light text-danger">
                                        <ul class="list-unstyled">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <label>{{ __('First Name') }} <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <input name="first_name" class="form-control" type="text"
                                        placeholder="{{ __('First Name') }}" value="{{ old('first_name') }}"
                                        aria-describedby="email-addon">
                                </div>
                                <label>{{ __('Last Name') }} <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <input type="text" name="last_name" class="form-control"
                                        placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}"
                                        aria-describedby="email-addon">
                                </div>
                                <label>{{ __('Email') }} <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <input type="email" placeholder="{{ __('Email') }}" name="email"
                                        class="form-control" value="{{ old('email') }}" aria-label="Email"
                                        aria-describedby="email-addon">
                                </div>
                                <label>{{ __('Choose Password') }} <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="{{ __('Password') }}" aria-label="Password"
                                        aria-describedby="password-addon">
                                </div>
                                <label for="account_type">{{__('account_type')}} <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <select class="from-control" name="account_type" id="account_type">
                                        <option value="business_pioneer">{{__('business_pioneer')}}</option>
                                        <option value="investor">{{__('investor')}}</option>
                                    </select>
                                </div>
                                <div class="mb-3" id="company_count">
                                    <label>{{ __('company_count') }} <span class="text-danger">*</span></label>
                                    <input name="company_count" class="form-control" type="number" min="1"
                                        placeholder="" value="{{ old('company_count') }}"
                                        >
                                </div>
                                <div class="mb-3" id="investment_range">
                                    <label>{{ __('investment_range') }} <span class="text-danger">*</span></label>
                                    <div class="d-flex justify-content-around">
                                        <div class=" m-2">
                                            <input name="range_one" class="form-control" type="number" min="1"
                                            placeholder="{{__('from')}}" value="{{ old('range_noe') }}">
                                        </div>
                                        <div class="m-2">
                                            <input name="range_two" class="form-control" type="number" min="1"
                                            placeholder="{{__('to')}}" value="{{ old('range_two') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3" id="company_name">
                                    <label>{{ __('company_name') }} <span class="text-danger">*</span></label>
                                    <input name="company_name" class="form-control" type="text"
                                        placeholder="" value="{{ old('company_name') }}">
                                </div>
                                @if (!empty($super_settings['config_recaptcha_in_user_signup']))
                                    <div class="g-recaptcha" data-sitekey="{{ $super_settings['recaptcha_api_key'] }}">

                                    </div>
                                @endif
                                @csrf
                                <div class="text-start">
                                    <button type="submit" class="btn btn-info  my-4 mb-2">{{ __('Sign up') }}</button>
                                </div>
                                <p class="text-sm mt-3 mb-0">{{ __('Already have an account?') }} <a href="/login"
                                        class="text-dark font-weight-bolder">{{ __('Sign in') }}</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
    <script>
        jQuery(document).ready(function($) {
            // Initially hide the element
            $('#investment_range').hide();
            $('#company_count').hide();

            // Bind change event to the select dropdown
            $('#account_type').change(function() {
                // Check the selected option value
                var type = $(this).val();
                // Show or hide the element based on the selected option
                if (type === 'investor') {
                $('#investment_range').show();
                $('#company_count').show();
                $('#company_name').hide();
                } else {
                $('#company_name').show();
                $('#investment_range').hide();
                $('#company_count').hide();

                }
            });
        });

        (function() {
            "use strict";
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        })();
    </script>

@endsection
