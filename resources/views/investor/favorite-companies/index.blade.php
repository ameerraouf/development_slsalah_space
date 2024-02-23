@extends('investor.layouts.index')
@section('content')

    <div class=" row">
        <div class="col">
            <h5 class="mb-2 text-secondary fw-bolder">
                الشركات المفضلة
            </h5>

        </div>
    </div>

    <div class="row">

        <div class="col-12">

            <div class="card card-body mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="cloudonex_table">
                            <div>
                                <form action="{{route('investor.favorite-companies.index')}}">
                                    <div class="my-2 d-flex flex-wrap justify-content-between">
                                    <div class="col-2">
                                        <label>مجال العمل  : </label>
                                        <select class="form-control" name="is_subscription_end">
                                            <option disabled selected> اختر</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label>حجم التمويل :من</label>
                                        <input type="number" name="from" class="form-control">
                                    </div>
                                    <div class="col-2">
                                        <label>حجم التمويل :إلى </label>
                                        <input type="number" name="to" class="form-control">
                                    </div>

                                    <div class="col-3">
                                        <button class="btn btn-primary">فلتر</button>
                                        <button type="button" class="btn btn-info" onclick="window.location.href='{{route('investor.opportunities.index')}}'">أعادة تعيين</button>
                                    </div>
                                    </div>
                                </form>

                            </div>
                            <hr>
                            <thead>

                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الشعار</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">اسم الشركة</th>
                                {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">نبذة عن الشركة</th> --}}
                                {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">مجال العمل</th> --}}
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">حجم  التمويل المطلوب</th>
                                {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">العرض الاستثماري</th> --}}
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تقيم الشركة</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تحكم</th>
                            </tr>

                            <tbody>
                            @foreach($opportunities as $key=> $workspace)
                                <tr>
                                    <td class="text-center">
                                        {{$key +1 }}
                                    </td>
                                    <td>
                                       <img src="{{PUBLIC_DIR}}/uploads/{{$workspace->pioneer->company?->company_logo}}" alt="" style="width:40px">
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $workspace->pioneer->company_name }}</p>                                    </td>
                                    {{-- <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{$workspace->pioneer->company->company_brief}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$workspace->pioneer->company->business_department}}</p>
                                    </td> --}}

                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$workspace->round_amount}}</p>
                                    </td>

                                    {{-- <td>
                                        <p class="text-xs font-weight-bold mb-0"></p>
                                    </td> --}}
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            @if($workspace->is_subscription_end == 0)
                                                <span class="badge badge-sm bg-success-light text-success">ساري</span>
                                            @else
                                                <span class="badge badge-sm bg-pink-light text-danger">منتهي</span>
                                            @endif
                                        </p>
                                    </td>

                                    <td>
{{--                                        @if($workspace->is_active == 0)--}}
{{--                                            <form action="{{route('admin.active_subscription', $workspace->id)}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                @method('post')--}}
{{--                                                <button type="submit" class="btn btn-primary">تفعيل الاشتراك</button>--}}
{{--                                            </form>--}}
{{--                                        @endif--}}
{{--                                            <a class="btn btn-info" href="{{route('admin.subscriptions.details', $workspace->id)}}">عرض التفاصيل</a>--}}
                                            <div class="d-flex">
                                                <a class="btn btn-info btn-sm {{in_array($workspace->id, $favorite_rounds)? 'btn-pink':'btn-def'}} m-2 p-2" onclick="roundFollow({{$workspace->id}})" id="{{$workspace->id}}" href="javascript:void(0)"><i class="fa fa-heart" style="font-size: 25px" title="إضافة للمفضلة" aria-hidden="true"></i></a>
                                                <a class="btn btn-info btn-sm m-2 p-2" href="{{route('investor.chat')}}"><i class="fa fa-comments-o" style="font-size: 25px" title="إضغط للمراسلة الان" aria-hidden="true"></i></a>    
                                            </div>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')

{{-- <script src="https://cdn.jsdelivr.net/combine/npm/snapsvg@0.5.1,npm/frappe-gantt@0.5.0/dist/frappe-gantt.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    <script>
        "use strict";
        $(document).ready(function () {
            $('#cloudonex_table').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Arabic.json'
                },
            });
         $('input[type="search"]').on('input', function() {
            var searchTerm = $(this).val().toLowerCase();
            var rowCount = 0;

            $('#cloudonex_table tbody tr').each(function(index) {
              var rowData = $(this).text().toLowerCase();
              if (rowData.includes(searchTerm) || searchTerm === '') {
                rowCount++;
                $(this).find('td:first-child').text(rowCount);
              }
            });

            console.log(rowCount);
          });
        });

        function roundFollow(round_id) {
            let el = document.getElementById(round_id); 

            $.ajax({
                type: "get",
                url: "{{route('investor.round.follow')}}",
                data: {'round_id':round_id},
                dataType: "json",
                success: function (response) {
                    if (response.value === 2) {
                        $('#'+round_id).removeClass('btn-pink');
                        $('#'+round_id).addClass('btn-def');
                        Toast.fire({
                            icon: 'success',
                            title: response.message
                        });
                    } else {
                        $('#'+round_id).removeClass('btn-def');
                        $('#'+round_id).addClass('btn-pink');
                        Toast.fire({
                            icon: 'success',
                            title: response.message
                        });
                    }
                }
            });
        }

    </script>



@endsection
