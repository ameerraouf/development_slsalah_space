@extends('layouts.super-admin-portal')
@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('Name')}}</th>

                    <th></th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>
                        <div class="d-flex px-2">
                            <div>

                                <h4 class="mb-0">{{__('Bank/Cash Payment')}}</h4>
                            </div>

                        </div>
                    </td>
                    <td>
                    <span class="badge badge-dot me-4">
                    <i class="bg-info"></i>
                    </span>
                    </td>
                    <td class="float-end">

                        <a href="/configure-payment-gateway?api_name=bank" type="button" class="btn btn-info btn-md">
                            @if(!empty($payment_gateways['bank']->name))
                                {{__('Edit')}}
                            @else
                                {{__('Configure')}}
                            @endif
                        </a>

                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="d-flex px-2">
                            <div>

                                <svg xmlns="http://www.w3.org/2000/svg" height="80" width="120" xml:space="preserve"
                                     y="0" x="0" id="Layer_1" version="1.1" viewBox="-54 -37.45 468 224.7"><style
                                        id="style16" type="text/css">.st0 {
                                            fill-rule: evenodd;
                                            clip-rule: evenodd;
                                            fill: #32325d
                                        }</style>
                                    <g transform="translate(-54 -36)" id="g32">
                                        <path id="path18"
                                              d="M414 113.4c0-25.6-12.4-45.8-36.1-45.8-23.8 0-38.2 20.2-38.2 45.6 0 30.1 17 45.3 41.4 45.3 11.9 0 20.9-2.7 27.7-6.5v-20c-6.8 3.4-14.6 5.5-24.5 5.5-9.7 0-18.3-3.4-19.4-15.2h48.9c0-1.3.2-6.5.2-8.9zm-49.4-9.5c0-11.3 6.9-16 13.2-16 6.1 0 12.6 4.7 12.6 16z"
                                              class="st0"/>
                                        <path id="path20"
                                              d="M301.1 67.6c-9.8 0-16.1 4.6-19.6 7.8l-1.3-6.2h-22v116.6l25-5.3.1-28.3c3.6 2.6 8.9 6.3 17.7 6.3 17.9 0 34.2-14.4 34.2-46.1-.1-29-16.6-44.8-34.1-44.8zm-6 68.9c-5.9 0-9.4-2.1-11.8-4.7l-.1-37.1c2.6-2.9 6.2-4.9 11.9-4.9 9.1 0 15.4 10.2 15.4 23.3 0 13.4-6.2 23.4-15.4 23.4z"
                                              class="st0"/>
                                        <path id="polygon22" class="st0" d="M248.9 36l-25.1 5.3v20.4l25.1-5.4z"/>
                                        <path id="rect24" class="st0" d="M223.8 69.3h25.1v87.5h-25.1z"/>
                                        <path id="path26"
                                              d="M196.9 76.7l-1.6-7.4h-21.6v87.5h25V97.5c5.9-7.7 15.9-6.3 19-5.2v-23c-3.2-1.2-14.9-3.4-20.8 7.4z"
                                              class="st0"/>
                                        <path id="path28"
                                              d="M146.9 47.6l-24.4 5.2-.1 80.1c0 14.8 11.1 25.7 25.9 25.7 8.2 0 14.2-1.5 17.5-3.3V135c-3.2 1.3-19 5.9-19-8.9V90.6h19V69.3h-19z"
                                              class="st0"/>
                                        <path id="path30"
                                              d="M79.3 94.7c0-3.9 3.2-5.4 8.5-5.4 7.6 0 17.2 2.3 24.8 6.4V72.2c-8.3-3.3-16.5-4.6-24.8-4.6C67.5 67.6 54 78.2 54 95.9c0 27.6 38 23.2 38 35.1 0 4.6-4 6.1-9.6 6.1-8.3 0-18.9-3.4-27.3-8v23.8c9.3 4 18.7 5.7 27.3 5.7 20.8 0 35.1-10.3 35.1-28.2-.1-29.8-38.2-24.5-38.2-35.7z"
                                              class="st0"/>
                                    </g></svg>
                            </div>

                        </div>
                    </td>
                    <td>
                    <span class="badge badge-dot me-4">
                    <i class="bg-info"></i>
                    </span>
                    </td>
                    <td class="float-end">

                        <a href="/configure-payment-gateway?api_name=stripe" type="button" class="btn btn-info btn-md">
                            @if(!empty($payment_gateways['stripe']->public_key))
                                {{__('Edit')}}
                            @else
                                {{__('Configure')}}
                            @endif
                        </a>

                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex px-2">
                            <div>
                                <svg id="Capa_1" data-name="Capa 1" height="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 504 128.8"><defs><style>.cls-1{fill:#139ad6;}.cls-2{fill:#263b80;}.cls-3{fill:#232c65;}</style></defs><title>paypal</title><path class="cls-1" d="M389.6,33.6H362.4c-1.6,0-3.2,1.6-4,3.2l-11.2,70.4a2.12,2.12,0,0,0,2.4,2.4H364a2.12,2.12,0,0,0,2.4-2.4l3.2-20c0-1.6,1.6-3.2,4-3.2h8.8q27.6,0,31.2-26.4c1.6-7.2,0-13.6-3.2-17.6-4.8-4-12-6.4-20.8-6.4M392.8,60c-1.6,9.6-8.8,9.6-16,9.6H372l3.2-18.4c0-.8.8-1.6,2.4-1.6h1.6c4.8,0,9.6,0,12,3.2,1.6.8,1.6,3.2,1.6,7.2"/><path class="cls-2" d="M193.6,33.6H166.4c-1.6,0-3.2,1.6-4,3.2l-11.2,70.4a2.12,2.12,0,0,0,2.4,2.4h12.8c1.6,0,3.2-1.6,4-3.2l3.2-19.2c0-1.6,1.6-3.2,4-3.2h8.8q27.6,0,31.2-26.4c1.6-7.2,0-13.6-3.2-17.6-4.8-4-11.2-6.4-20.8-6.4M196.8,60c-1.6,9.6-8.8,9.6-16,9.6h-4L180,51.2c0-.8.8-1.6,2.4-1.6H184c4.8,0,9.6,0,12,3.2.8.8,1.6,3.2.8,7.2"/><path class="cls-2" d="M276,59.2H263.2c-.8,0-2.4.8-2.4,1.6l-.8,4-.8-1.6c-3.2-4-8.8-5.6-15.2-5.6-14.4,0-27.2,11.2-29.6,26.4a23.84,23.84,0,0,0,4.8,20c4,4.8,9.6,6.4,16.8,6.4,12,0,18.4-7.2,18.4-7.2l-.8,4a2.12,2.12,0,0,0,2.4,2.4h12c1.6,0,3.2-1.6,4-3.2l7.2-44.8c-.8-.8-2.4-2.4-3.2-2.4M257.6,84.8c-1.6,7.2-7.2,12.8-15.2,12.8a12.79,12.79,0,0,1-8.8-3.2q-2.4-3.6-2.4-9.6A14.65,14.65,0,0,1,245.6,72c4,0,6.4,1.6,8.8,3.2,2.4,2.4,3.2,6.4,3.2,9.6"/><path class="cls-1" d="M471.2,59.2H458.4c-.8,0-2.4.8-2.4,1.6l-.8,4-.8-1.6c-3.2-4-8.8-5.6-15.2-5.6-14.4,0-27.2,11.2-29.6,26.4a23.84,23.84,0,0,0,4.8,20c4,4.8,9.6,6.4,16.8,6.4,12,0,18.4-7.2,18.4-7.2l-.8,4a2.12,2.12,0,0,0,2.4,2.4h12c1.6,0,3.2-1.6,4-3.2l7.2-44.8c-.8-.8-1.6-2.4-3.2-2.4M452.8,84.8c-1.6,7.2-7.2,12.8-15.2,12.8a12.79,12.79,0,0,1-8.8-3.2q-2.4-3.6-2.4-9.6A14.65,14.65,0,0,1,440.8,72c4,0,6.4,1.6,8.8,3.2a9.18,9.18,0,0,1,3.2,9.6"/><path class="cls-2" d="M345.6,59.2H332a4.16,4.16,0,0,0-3.2,1.6L311.2,88l-8-25.6c-.8-1.6-1.6-2.4-4-2.4H286.4c-1.6,0-2.4,1.6-2.4,3.2l14.4,42.4-13.6,19.2c-.8,1.6,0,4,1.6,4h12.8a4.16,4.16,0,0,0,3.2-1.6l44-63.2c2.4-2.4.8-4.8-.8-4.8"/><path class="cls-1" d="M486.4,36l-11.2,72a2.12,2.12,0,0,0,2.4,2.4h11.2c1.6,0,3.2-1.6,4-3.2L504,36.8a2.12,2.12,0,0,0-2.4-2.4H488.8c-.8-.8-1.6,0-2.4,1.6"/><path class="cls-2" d="M92,9.6C86.4,3.2,76,0,61.6,0h-40C19.2,0,16.8,2.4,16,4.8L0,109.6c0,2.4,1.6,4,3.2,4H28l6.4-39.2V76c.8-2.4,3.2-4.8,5.6-4.8H52c23.2,0,40.8-9.6,46.4-36V32.8h0C99.2,22.4,97.6,16,92,9.6"/><path class="cls-1" d="M97.6,32.8h0v2.4c-5.6,27.2-23.2,36-46.4,36h-12c-2.4,0-4.8,2.4-5.6,4.8l-8,48.8a2.93,2.93,0,0,0,3.2,3.2H49.6c2.4,0,4.8-1.6,4.8-4v-.8l4-24.8V96.8c0-2.4,2.4-4,4.8-4h3.2c20,0,36-8,40-32,1.6-9.6.8-18.4-4-24a8.19,8.19,0,0,0-4.8-4"/><path class="cls-3" d="M92,30.4c-.8,0-1.6-.8-2.4-.8a2.94,2.94,0,0,1-2.4-.8C84,28,80.8,28,76.8,28H45.6a2.94,2.94,0,0,0-2.4.8,4.4,4.4,0,0,0-2.4,4L34.4,74.4V76c.8-2.4,3.2-4.8,5.6-4.8H52c23.2,0,40.8-9.6,46.4-36a2.94,2.94,0,0,1,.8-2.4c-1.6-.8-2.4-1.6-4-1.6-2.4-.8-2.4-.8-3.2-.8"/></svg>
                            </div>
                        </div>
                    </td>
                    <td>
                    <span class="badge badge-dot me-4">
                    <i class="bg-info"></i>
                    </span>
                    </td>
                    <td class="float-end">

                        <a href="/configure-payment-gateway?api_name=paypal" type="button" class="btn btn-info btn-md">
                            @if(!empty($payment_gateways['paypal']->username))
                                {{__('Edit')}}
                            @else
                                {{__('Configure')}}
                            @endif
                        </a>

                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex px-2">
                            <div>
                                <img src="{{ asset('img/clickpay.png') }}" width="200" height="50" />    
                            </div>
                        </div>
                    </td>
                    <td>
                    <span class="badge badge-dot me-4">
                    <i class="bg-info"></i>
                    </span>
                    </td>
                    <td class="float-end">

                        <a href="/configure-payment-gateway?api_name=paypal" type="button" class="btn btn-info btn-md">
                            @if(!empty($payment_gateways['paypal']->username))
                                {{__('Edit')}}
                            @else
                                {{__('Configure')}}
                            @endif
                        </a>

                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
