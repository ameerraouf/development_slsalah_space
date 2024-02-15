@extends('layouts.primary')
@section('content')

    <div class=" row">
        <div class="col">
            <h5 class="mb-2 text-secondary fw-bolder">
                {{__('My Found Rounds')}}
            </h5>

        </div>
        <div class="col text-end">
            <a href="{{route('pioneer.found-round-add')}}" type="button" class="btn btn-info">
                {{__('Found Round')}}
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-body mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="cloudonex_table">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-start">{{__('Found Round Amount')}}</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{__('Created at')}}</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">{{__('Share Round')}}</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">{{__('Share Plan')}}</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">{{__('Share Profile')}}</th>
                                <th class="text-secondary text-center opacity-7">{{__('Actions')}}</th>
                            </tr>
                            <tbody>
                            @forelse($found_rounds as $round)
                                <tr>
                                    <td class="text-center">
                                        {{$loop->iteration}}
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">

                                            <div class="d-flex flex-column justify-content-center px-3">
                                                <h6 class="mb-0 text-sm"> {{$round->round_amount}} </h6>
                                                <p class="text-xs text-secondary mb-0"></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$round->created_at->format('Y-m-d')}}</p>
                                    </td>

                                    <td>
                                        <h6 class="mb-0  ">
                                            @if($round->share_round)
                                            <span class="badge bg-success-light mb-0  text-success">{{__('Share')}} </span>
                                            @else
                                                <span class="badge bg-pink-light text-danger mb-0 ms-3">{{__('Hide')}}</span>
                                            @endif

                                        </h6>
                                    </td>
                                    <td>
                                        <h6 class="mb-0  ">
                                            @if($round->share_plan)
                                            <span class="badge bg-success-light mb-0  text-success">{{__('Share')}} </span>
                                            @else
                                                <span class="badge bg-pink-light text-danger mb-0 ms-3">{{__('Hide')}}</span>
                                            @endif

                                        </h6>
                                    </td>
                                    <td>
                                        <h6 class="mb-0  ">
                                            @if($round->profile)
                                            <span class="badge bg-success-light mb-0  text-success">{{__('Share')}} </span>
                                            @else
                                                <span class="badge bg-pink-light text-danger mb-0 ms-3">{{__('Hide')}}</span>
                                            @endif

                                        </h6>
                                    </td>

                                    <td class="align-middle text-center">
                                        <div class="ms-auto">

                                            <a class="btn btn-link text-danger delete-btn text-gradient px-3 mb-0"
                                               href="{{route('pioneer.found-round-destroy', $round->id)}}"><i
                                                    class="far fa-trash-alt me-2"></i>{{__('Delete')}}</a>

                                            <a class="btn btn-link text-dark px-3 mb-0"
                                               href="{{route('pioneer.found-round-edit', $round->id)}}"><i
                                                    class="fas fa-pencil-alt text-dark me-2"
                                                    aria-hidden="true"></i>{{__('Edit')}}</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td>
                                    no data to show
                                </td>
                            </tr>

                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script>
        "use strict";
        $(document).ready(function () {
            $('body').on('click', '.delete-btn', function(e) {
                e.preventDefault()
                var result = window.confirm("هل أنت متأكد انك تريد الحذف ؟");
                let targetLink = $(this).attr('href')
                if (result) {
                    window.location.href = targetLink;
                }
             
            })
            $('#cloudonex_table').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Arabic.json'
                }
            });

        });
    </script>
@endsection
