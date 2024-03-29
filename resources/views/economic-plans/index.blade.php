@extends('layouts.primary')
@section('head')
    <style>
        /* Style the form */
        #regForm {
            background-color: #ffffff;
            margin: 100px auto;
            padding: 40px;
            width: 70%;
            min-width: 300px;
        }

        /* Style the input fields */
        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        /* Mark the active step: */
        .step.active {
            opacity: 1;
        }

        button {
            background-color: #077ebf;
            color: #ffffff;
            outline: 0;
            padding: .5rem 1rem;
            border-radius: 14px;
            border: 0;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #077ebf;
        }

        /* HTML: <div class="loader"></div> */
        .loader {
        width: 120px;
        height: 20px;
        -webkit-mask: linear-gradient(90deg,#09008d 70%,#0000 0) left/20% 100%;
        background:
        linear-gradient(#0400ff 0 0) left -25% top 0 /20% 100% no-repeat
        #000000;
        animation: l7 1s infinite steps(6);
        }
        @keyframes l7 {
            100% {background-position: right -25% top 0}
        }
    </style>
@endsection
@section('content')
    <div class=" row">
        <div class="col">
            <h5 class="mb-2 text-secondary fw-bolder">
                {{ __('marketing_and_economic_plan') }}
            </h5>
        </div>
    </div>

    <div class="main-page-content">
        <form id="regForm" action="">
            <div class="alert alert-danger text-white d-none" id="error-alert">{{ __('All Fields Are Required') }}</div>
            <div class="alert alert-success text-white d-none" id="success-alert">تم إنشاء تحليل عن طريق الذكاء الاصطناعي و
                يمكنك مشاهدة كل تحليل بالمكان المخصص له</div>
            <div class="loader-text text-center d-none" style="font-weight: bolder; color:#000000">جاري معالجة البيانات الرجاء الانتظار قليلا. لا تقم بعمل تحديث للصفحه</div>
            <div class="loader-spinner spinner-border text-primary d-block d-none mb-3 mx-auto" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
            <div class="tab mb-3">
                {{ __('industry') }}
                <div class="">
                    <input type="radio"name="industry" id="industry-1" value="تكنولوجيا" style="width: auto;">
                    <label for="industry-1">{{ __('technology') }}</label><br>
                </div>
                <div class="">
                    <input type="radio"name="industry" id="industry-2" value="الرعاية الصحية" style="width: auto;">
                    <label for="industry-2">{{ __('health') }}</label><br>
                </div>
                <div class="">
                    <input type="radio"name="industry" id="industry-3" value="البيع بالتجزئة" style="width: auto;">
                    <label for="industry-3">{{ __('retail') }}</label><br>
                </div>
                <div class="">
                    <input type="radio"name="industry" id="industry-4" value="المالية" style="width: auto;">
                    <label for="industry-4">{{ __('finance') }}</label><br>
                </div>
            </div>

            <div class="tab mb-3">
                {{ __('business_size') }}
                <div class="">
                    <input type="radio"name="business_size" id="business_size-1" value="متناهي الصفر" style="width: auto;">
                    <label for="business_size-1">{{ __('micro') }}</label><br>
                </div>
                <div class="">
                    <input type="radio"name="business_size" id="business_size-2" value="صغير" style="width: auto;">
                    <label for="business_size-2">{{ __('small') }}</label><br>
                </div>
                <div class="">
                    <input type="radio"name="business_size" id="business_size-3" value="متوسط" style="width: auto;">
                    <label for="business_size-3">{{ __('medium') }}</label><br>
                </div>
                <div class="">
                    <input type="radio"name="business_size" id="business_size-4" value="كبير" style="width: auto;">
                    <label for="business_size-4">{{ __('large') }}</label><br>
                </div>
            </div>

            <div class="tab mb-3">
                {{ __('audience') }}
                <div class="">
                    <input type="radio" name="audience" id="audience-1" value="المستهلكون" style="width: auto;">
                    <label for="audience-1">{{ __('b2c') }}</label><br>
                </div>
                <div class="">
                    <input type="radio" name="audience" id="audience-2" value="الأعمال التجارية الأخرى" style="width: auto;">
                    <label for="audience-2">{{ __('b2b') }}</label><br>
                </div>
                <div class="">
                    <input type="radio" name="audience" id="audience-3" value="الحكومة والمؤسسات" style="width: auto;">
                    <label for="audience-3">{{ __('governate') }}</label><br>
                </div>
                <div class="">
                    {{-- Note: --}}
                    <input type="radio" name="audience" id="audience-4" value="المستهلكون والحكومة والمؤسسات والأعمال التجارية الأخرى" style="width: auto;">
                    <label for="audience-4">{{ __('all') }}</label><br>
                </div>
            </div>

            <div class="tab mb-3">
                {{ __('product_nature') }}
                <div class="">
                    <input type="radio" name="product_nature" id="product_nature-1" value="منتجات مادية" style="width: auto;">
                    <label for="product_nature-1">{{ __('Physical products') }}</label><br>
                </div>
                <div class="">
                    <input type="radio" name="product_nature" id="product_nature-2" value="منتجات رقمية" style="width: auto;">
                    <label for="product_nature-2">{{ __('Digital Products') }}</label><br>
                </div>
                <div class="">
                    <input type="radio" name="product_nature" id="product_nature-3" value="خدمات" style="width: auto;">
                    <label for="product_nature-3">{{ __('Services') }}</label><br>
                </div>
                <div class="">
                    <input type="radio" name="product_nature" id="product_nature-4" value="منتجات رقمية ومادية وخدمية"
                        style="width: auto;">
                    <label for="product_nature-4">{{ __('all') }}</label><br>
                </div>
            </div>

            <div class="tab mb-3">
                {{ __('Technology Focus') }}
                <div class="">
                    <input type="radio" name="tech_focus" id="tech_focus-1" value="الذكاء الاصطناعي" style="width: auto;">
                    <label for="tech_focus-1">{{ __('Ai') }}</label><br>
                </div>
                <div class="">
                    <input type="radio" name="tech_focus" id="tech_focus-2" value="الطاقة المتجددة" style="width: auto;">
                    <label for="tech_focus-2">{{ __('Renewable Energy') }}</label><br>
                </div>
                <div class="">
                    <input type="radio" name="tech_focus" id="tech_focus-3" value="التجارة الإلكترونية" style="width: auto;">
                    <label for="tech_focus-3">{{ __('Online Trading') }}</label><br>
                </div>
                <div class="">
                    <input type="radio" name="tech_focus" id="tech_focus-4" value="التكنولوجيا المالية" style="width: auto;">
                    <label for="tech_focus-4">{{ __('FinTech') }}</label><br>
                </div>
            </div>


            <div class="tab mb-3">
                {{ __('Market Position') }}
                <div class="">
                    <input type="radio" name="market_position" id="market_position-1" value="قيادة التكاليف (توفير أقل تكلفة)" style="width: auto;">
                    <label for="market_position-1">{{ __('Lowering The Cost') }}</label><br>
                </div>
                <div class="">
                    <input type="radio" name="market_position" id="market_position-2" value="التمايز (تقديم ميزات فريدة)" style="width: auto;">
                    <label for="market_position-2">{{ __('Special') }}</label><br>
                </div>
                <div class="">
                    <input type="radio" name="market_position" id="market_position-3" value="السوق المتخصصة (متخصصة في قطاع معين)" style="width: auto;">
                    <label for="market_position-3">{{ __('Special Market') }}</label><br>
                </div>
                <div class="">
                    <input type="radio" name="market_position" id="market_position-4" value="جميع الأسواق" style="width: auto;">
                    <label for="market_position-4">{{ __('all') }}</label><br>
                </div>
            </div>

            <div class="tab mb-3">
                {{ __('Geo Location') }}
                <div class="">
                    <input type="radio" name="location" id="location-1" value="المناطق الحضرية" style="width: auto;">
                    <label for="location-1">{{ __('Modern') }}</label><br>
                </div>
                <div class="">
                    <input type="radio" name="location" id="location-2" value="الضواحي" style="width: auto;">
                    <label for="location-2">{{ __('Suberns') }}</label><br>
                </div>
                <div class="">
                    <input type="radio" name="location" id="location-3" value="الريف" style="width: auto;">
                    <label for="location-3">{{ __('Country Side') }}</label><br>
                </div>
                <div class="">
                    <input type="radio" name="location" id="location-4" value="العالمية" style="width: auto;">
                    <label for="location-4">{{ __('Global') }}</label><br>
                </div>
            </div>

            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)"> {{ __('Previous_button') }}</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)"> {{ __('test') }}</button>
                    <button type="button" id = "submitBtn" class="submit-btn" style="display: none">
                        {{ __('submit') }}</button>
                </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>

        </form>
        <!-- /.MultiStep Form -->
    </div>
@endsection

@section('script')
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").style.display = "none";
                document.getElementById("submitBtn").style.display = "inline";
            } else {
                document.getElementById("nextBtn").innerHTML = "{{ __('Next_button_test') }}";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                // document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }


        // submitting the form 
        $('body').on('click', '.submit-btn', function(e) {
            $('#error-alert').addClass('d-none');
            $('#success-alert').addClass('d-none');
            $('.loader-spinner').removeClass('d-none');
            $('.loader-text').removeClass('d-none');
            $(this).prop('disabled', true)
            $(this).css({
                "opacity": "0.5"
            })
            let data = new FormData(regForm);
            $.ajax({
                method: "POST",
                url: "{{ route('economiccPlan.create') }}",
                data: data,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-Token': "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#success-alert').removeClass('d-none');
                    $('.loader-spinner').addClass('d-none');
                    $('.loader-text').addClass('d-none');
                    $('.submit-btn').css({"opacity": "1"})
                    $('.submit-btn').prop('disabled', false)
                },
                error: function(response) {
                    $('#error-alert').text(response.error);
                    $('#error-alert').removeClass('d-none');
                    $('.loader-spinner').addClass('d-none');
                    $('.loader-text').addClass('d-none');
                    $('.submit-btn').prop('disabled', false)
                    $('.submit-btn').css({"opacity": "1"})
                }
            })
        });
    </script>
@endsection
