@extends('layouts.primary')
@section('content')
    <div class="row">
        <div class=" row">
            <div class="col">
                <h5 class=" text-secondary fw-bolder">
                    ابحث الآن
                </h5>
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            {{-- <div class="col">
                @if (auth()->user()->super_admin == 1)
                    <a href="{{ route('investors.import') }}" class="" style="background-color: #1e91bd; color: white; border: 2px solid white; border-radius: 5px; cursor: pointer;">استيراد من excel</a>
                @endif
            </div> --}}
        </div>
        <div class="col-12">
            <div class="card card-body mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="col-md-12 mx-auto">
                        <div class="row gx-2 gx-md-3 mb-3 mt-4">
                            <div class="col-md-2">
                                <select class="form-select filter-select" name="invest-amount" id="InvestAmount" aria-label="">
                                    <option value="">حجم الاستثمار</option>
                                    @foreach ($amounts as $amount)
                                        @if ($amount !== '')
                                            <option value="{{ $amount }}">{{ $amount }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-select filter-select" name="exist-number" id="ExitNumber" aria-label="">
                                    <option value="">عدد عمليات التخارج</option>
                                    @foreach ($number_of_exits as $number_of_exit)
                                        @if ($number_of_exit !== '')
                                            <option value="{{ $number_of_exit }}">{{ $number_of_exit }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-select filter-select" name="city" id="City" aria-label="">
                                    <option value="">المنطقة</option>
                                    @foreach ($cities as $city)
                                        @if ($city !== '')
                                            <option value="{{ $city }}">{{ $city }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-select filter-select" name="investor-type" id="InvestorType" aria-label="">
                                    <option value="">نوع المستثمر</option>
                                    @foreach ($investor_types as $investor_type)
                                        @if ($investor_type !== '' && $investor_type !== '—')
                                            <option value="{{ $investor_type }}">{{ $investor_type }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-select filter-select" name="invest-phase" id="InvestPhase" aria-label="">
                                    <option value="">مرحلة الاستثمار</option>
                                    @foreach ($investor_stages as $investor_stage)
                                        @if ($investor_stage !== '' && $investor_stage !== '—')
                                            <option value="{{ $investor_stage }}">{{ $investor_stage }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">        
                                <div class="input-group input-group-merge mb-3">
                                    <input type="text" name="company_name" class="form-control form-control-lg"
                                        id="searchJobCareers" placeholder="ابحث الآن"
                                        aria-label="Search business model">
                                </div>
                            </div> 
                            {{-- <div class="col-md-2">
                                <button type="submit"
                                    class="btn btn-block bg-purple-light text-purple shadow-none
                                btn-lg btn-rounded">
                                    <i class="fas fa-search"></i>
                                    {{ __('Search') }}</button>
                                <!-- End Select -->
                            </div> --}}
                        </div>
                    </div>
                    <div id="investors-table" class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">#</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('Name')}}</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">حجم الاستثمارات</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">عدد عمليات التخارج</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">المنطقة</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">نوع المستثمر</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">مرحلة الاستثمار</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">إضافة إلى المفضلة</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">قدم الآن</th>
                            </tr>
                            <tbody>
                                @foreach($investors as $investor)
                                <tr>
                                    <td class="text-center font-weight-bold opacity">{{$loop->index+1}}</td>
                                    <td class="text-center font-weight-bold opacity">{{$investor->name}}</td>
                                    <td class="text-center font-weight-bold opacity">{{$investor->number_of_investment ?? '-'}}</td>
                                    <td class="text-center font-weight-bold opacity">{{$investor->number_of_exits ?? '-'}}</td>
                                    <td class="text-center font-weight-bold opacity">{{$investor->location ?? '-'}}</td>
                                    <td class="text-center font-weight-bold opacity">{{$investor->investor_type ?? '-'}}</td>
                                    <td class="text-center font-weight-bold opacity">{{$investor->investor_stage ?? '-'}}</td>
                                    @if($investor->favorited == 1)
                                        <td class="text-center font-weight-bold opacity"><button class="remove-from-favorite-btn" data-investor-id="{{ $investor->id }}" style="background-color: #1e91bd; color: rgb(255, 255, 255); border: 2px solid rgb(255, 255, 255); border-radius: 5px; cursor: pointer;">حذف من المفضلة</button></td>
                                    @else
                                        <td class="text-center font-weight-bold opacity"><button class="add-to-favorite-btn" data-investor-id="{{ $investor->id }}" style="background-color: white; color: #1e91bd; border: 2px solid #1e91bd; border-radius: 5px; cursor: pointer;">إضافة إلى المفضلة</button></td>
                                    @endif
                                    <td class="text-center font-weight-bold opacity"><a href="{{$investor->linkedin ?? '#' }}"><img src="{{ asset('img/linkedin.png') }}" height="20px" width="20px" alt=""></a> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.filter-select').change(function() {
                console.log('changed');
                var amount = $('#InvestAmount').val();
                var ExitNumber = $('#ExitNumber').val();
                var InvestorType = $('#InvestorType').val();
                var InvestPhase = $('#InvestPhase').val();
                var city = $('#City').val();

                $.ajax({
                    url: '/investors/filter',
                    type: 'GET',
                    data: {
                        amount: amount,
                        city: city,
                        ExitNumber: ExitNumber,
                        InvestorType: InvestorType,
                        InvestPhase: InvestPhase,
                    },
                    success: function(response) {
                        $('#investors-table tbody').empty();

                        // Iterate over the received investors and populate the table
                        $.each(response.investors, function(index, investor) {
                            // Append a new row to the table body for each investor
                            $('#investors-table tbody').append(
                                '<tr>' +
                                    '<td class="text-center font-weight-bold opacity">' + (index+1) + '</td>' +
                                    '<td class="text-center font-weight-bold opacity">' + investor.name+'</td>' +
                                    '<td class="text-center font-weight-bold opacity">' + (investor.number_of_investment ?? '-')+'</td>' +
                                    '<td class="text-center font-weight-bold opacity">' + (investor.number_of_exits ?? '-')+'</td>' +
                                    '<td class="text-center font-weight-bold opacity">' + (investor.location ?? '-') + '</td>' +
                                    '<td class="text-center font-weight-bold opacity">' + (investor.investor_type ?? '-') + '</td>' +
                                    '<td class="text-center font-weight-bold opacity">' + (investor.investor_stage ?? '-') + '</td>' +
                                    '<td class="text-center font-weight-bold opacity">' + 
                                        (investor.favorited == 1 ? 
                                            '<button class="remove-from-favorite-btn" data-investor-id="' + (investor.id) + '" style="background-color: #1e91bd; color: rgb(255, 255, 255); border: 2px solid rgb(255, 255, 255); border-radius: 5px; cursor: pointer;">حذف من المفضلة</button>' : 
                                            '<button class="add-to-favorite-btn" data-investor-id="' + (investor.id) + '" style="background-color: white; color: #1e91bd; border: 2px solid #1e91bd; border-radius: 5px; cursor: pointer;">إضافة إلى المفضلة</button>'
                                        ) +
                                    '<td class="text-center font-weight-bold opacity"><a href="{{$investor->linkedin ?? '#' }}"><img src="{{ asset('img/linkedin.png') }}" height="20px" width="20px" alt=""></a> </td>' +
                                '</tr>'
                            );
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $(document).on('click','.add-to-favorite-btn',function() {
                var investorId = $(this).data('investor-id');
                console.log(investorId);
                $.ajax({
                    url: '/update-favorite/' + investorId,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        var investorId = response.investorId; // Assuming the response contains the investor ID
                        // Change the button's style based on the response
                        var $button = $('[data-investor-id="' + investorId + '"]');
                        if (response.favorited == 1) {
                            $button.css({
                                'background-color': '#1e91bd',
                                'color': '#ffffff',
                                'border-color': '#ffffff'
                            }).text('حذف من المفضلة');
                        } else {
                            $button.css({
                                'background-color': 'white',
                                'color': '#1e91bd',
                                'border-color': '#1e91bd'
                            }).text('إضافة إلى المفضلة');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error); // Handle errors
                    }
                });
            });

            $(document).on('click','.remove-from-favorite-btn',function() {
                var investorId = $(this).data('investor-id');
                console.log(investorId);
                $.ajax({
                    url: '/update-favorite/' + investorId,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        var investorId = response.investorId; // Assuming the response contains the investor ID
                        // Change the button's style based on the response
                        var $button = $('[data-investor-id="' + investorId + '"]');
                        if (response.favorited == 1) {
                            $button.css({
                                'background-color': '#1e91bd',
                                'color': '#ffffff',
                                'border-color': '#ffffff'
                            }).text('حذف من المفضلة');
                        } else {
                            $button.css({
                                'background-color': 'white',
                                'color': '#1e91bd',
                                'border-color': '#1e91bd'
                            }).text('إضافة إلى المفضلة');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error); // Handle errors
                    }
                });
            });

            $('#searchJobCareers').on('keyup', function() {
                var amount = $('#InvestAmount').val();
                var ExitNumber = $('#ExitNumber').val();
                var InvestorType = $('#InvestorType').val();
                var InvestPhase = $('#InvestPhase').val();
                var city = $('#City').val();
                var query = $(this).val();
                $.ajax({
                    url: '/investors/filter',
                    type: 'GET',
                    data: {
                        amount: amount,
                        city: city,
                        ExitNumber: ExitNumber,
                        InvestorType: InvestorType,
                        InvestPhase: InvestPhase,
                        query: query
                    },
                    success: function(response) {
                        $('#investors-table tbody').empty();

                        // Iterate over the received investors and populate the table
                        $.each(response.investors, function(index, investor) {
                            // Append a new row to the table body for each investor
                            $('#investors-table tbody').append(
                                '<tr>' +
                                    '<td class="text-center font-weight-bold opacity">' + (index+1) + '</td>' +
                                    '<td class="text-center font-weight-bold opacity">' + investor.name+'</td>' +
                                    '<td class="text-center font-weight-bold opacity">' + (investor.number_of_investment ?? '-')+'</td>' +
                                    '<td class="text-center font-weight-bold opacity">' + (investor.number_of_exits ?? '-')+'</td>' +
                                    '<td class="text-center font-weight-bold opacity">' + (investor.location ?? '-') + '</td>' +
                                    '<td class="text-center font-weight-bold opacity">' + (investor.investor_type ?? '-') + '</td>' +
                                    '<td class="text-center font-weight-bold opacity">' + (investor.investor_stage ?? '-') + '</td>' +
                                    '<td class="text-center font-weight-bold opacity">' + 
                                        (investor.favorited == 1 ? 
                                            '<button class="remove-from-favorite-btn" data-investor-id="' + (investor.id) + '" style="background-color: #1e91bd; color: rgb(255, 255, 255); border: 2px solid rgb(255, 255, 255); border-radius: 5px; cursor: pointer;">حذف من المفضلة</button>' : 
                                            '<button class="add-to-favorite-btn" data-investor-id="' + (investor.id) + '" style="background-color: white; color: #1e91bd; border: 2px solid #1e91bd; border-radius: 5px; cursor: pointer;">إضافة إلى المفضلة</button>'
                                        ) +
                                    '<td class="text-center font-weight-bold opacity"><a href="' + (investor.phase ?? '-') + '"><img src="{{ asset('img/linkedin.png') }}" height="20px" width="20px" alt=""></a> </td>' +
                                '</tr>'
                            );
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection


