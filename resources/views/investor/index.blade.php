@extends('investor.layouts.index')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card bg-purple-light">
            <div class="card-body">
                <div class="row">
                    <div class="">
                        <h4 class="fw-bolder">مرحبًا،</h4>
                        <h5 class="text-secondary fw-bolder d-sm-inline d-none">
                            {{Auth::guard('investor')->user()->first_name ?? ""}}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="col-md-12">
        <br>
        <br>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card bg-info">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold " style="color: #fff">
                                                المدى الاستثماري
                                            </p>

                                            <h5 class="mt-4" >
                                                <a href="/projects" style="color: #fff">
                                                    @auth('investor')
                                                        {{Auth::guard('investor')->user()->invest_from ?? ""}} <span>ريال</span>   -
                                                        {{Auth::guard('investor')->user()->invest_to ?? ""}}<span>ريال</span>
                                                    @endauth
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-purple-light text-center">
                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="text-purple feather feather-hard-drive mt-2"
                                            >
                                                <line x1="22" y1="12" x2="2" y2="12"></line>
                                                <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                                                <line x1="6" y1="16" x2="6.01" y2="16"></line>
                                                <line x1="10" y1="16" x2="10.01" y2="16"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card bg-info">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm text-white mb-0 text-capitalize font-weight-bold">
                                                حجم الاستثمار الحالي
                                            </p>
                                            <h5 class="mt-4">
                                                <a href="/notes" class="text-white">
                                                    50000,00
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-purple-light ms-auto text-center">
                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="text-purple feather feather-edit mt-2"
                                            >
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-gradient-dark">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-white text-capitalize font-weight-bold">
                                                عدد الشركات الحالية بالمحفظة
                                            </p>
                                            <h5 class="font-weight-bolder text-white mt-4">
                                                {{Auth::guard('investor')->user()->companies_count}}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-purple-light ms-auto text-center">
                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="text-purple feather feather-briefcase mt-2"
                                            >
                                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    </div>
</div>

<br>
<br>

<div class="col-12">

    <div class="card  mb-4">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0"> الصفحات</h6>
                </div>
            </div>
        </div>
        <br>

        <div class="card-body px-5 pt-2 pb-3">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card bg-info">
                        <div class="card-body p-3">
                            <a href="">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold " style="color: #fff">
                                                الفرص الاستثمارية
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-purple-light text-center">
                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="text-purple feather feather-hard-drive mt-2"
                                            >
                                                <line x1="22" y1="12" x2="2" y2="12"></line>
                                                <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                                                <line x1="6" y1="16" x2="6.01" y2="16"></line>
                                                <line x1="10" y1="16" x2="10.01" y2="16"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-info">
                        <div class="card-body p-3">
                            <a href="">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold " style="color: #fff">
                                                الشركات المفضلة
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-purple-light text-center">
                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="text-purple feather feather-hard-drive mt-2"
                                            >
                                                <line x1="22" y1="12" x2="2" y2="12"></line>
                                                <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                                                <line x1="6" y1="16" x2="6.01" y2="16"></line>
                                                <line x1="10" y1="16" x2="10.01" y2="16"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-info">
                        <div class="card-body p-3">
                            <a href="">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold " style="color: #fff">
                                                محفظتي الاستثمارية
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-purple-light text-center">
                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="text-purple feather feather-hard-drive mt-2"
                                            >
                                                <line x1="22" y1="12" x2="2" y2="12"></line>
                                                <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                                                <line x1="6" y1="16" x2="6.01" y2="16"></line>
                                                <line x1="10" y1="16" x2="10.01" y2="16"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-info">
                        <div class="card-body p-3">
                            <a href="">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold " style="color: #fff">
                                                الملفات 
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-purple-light text-center">
                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="text-purple feather feather-hard-drive mt-2"
                                            >
                                                <line x1="22" y1="12" x2="2" y2="12"></line>
                                                <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                                                <line x1="6" y1="16" x2="6.01" y2="16"></line>
                                                <line x1="10" y1="16" x2="10.01" y2="16"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-info">
                        <div class="card-body p-3">
                            <a href="">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold " style="color: #fff">
                                                الرسائل 
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-purple-light text-center">
                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="text-purple feather feather-hard-drive mt-2"
                                            >
                                                <line x1="22" y1="12" x2="2" y2="12"></line>
                                                <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                                                <line x1="6" y1="16" x2="6.01" y2="16"></line>
                                                <line x1="10" y1="16" x2="10.01" y2="16"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-info">
                        <div class="card-body p-3">
                            <a href="">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold " style="color: #fff">
                                                مراسلة الادارة
                                            </p>
                                        </div>
                                    </div> 
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-purple-light text-center">
                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="text-purple feather feather-hard-drive mt-2"
                                            >
                                                <line x1="22" y1="12" x2="2" y2="12"></line>
                                                <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                                                <line x1="6" y1="16" x2="6.01" y2="16"></line>
                                                <line x1="10" y1="16" x2="10.01" y2="16"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
    </div>
</div>


<br>
<br>
<div class="col-12">

    <div class="card  mb-4">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">أحدث الفرص الاستثمارية</h6>
                </div>
                <div class="col-6 text-end">
                    <a href="{{route('investor.opportunities.index')}}" class="btn btn-info btn-sm mb-0">عرض الكل</a>
                </div>
            </div>
        </div>
        <br>

        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="cloudonex_table">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الشعار</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">اسم الشركة</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">نبذة عن الشركة</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">مجال العمل</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">حجم  التمويل المطلوب</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">العرض الاستثماري</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تقييم الشركة</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الأجراء</th>
                    </tr>

                    <tbody>
                        @foreach ($rounds as $item)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$item->round_amount}}</td>
                            <td class="text-center">{{$item->pioneer->company_name}}</td>
                            <td class="text-center">{{$item->pioneer->company->company_brief}}</td>
                            <td class="text-center">{{$item->pioneer->company->business_department}}</td>
                            <td class="text-center">{{$item->round_amount}}</td>
                            <td class="text-center">عرض إستثماري!!</td>
                            <td class="text-center">!!</td>
                            <td class="text-center">!!</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection