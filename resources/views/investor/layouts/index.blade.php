@php use App\Models\Chat; @endphp
@php use Illuminate\Support\Facades\Session; @endphp
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(!empty($super_settings['favicon']))

        <link rel="icon" type="image/png" href="{{PUBLIC_DIR}}/uploads/{{$super_settings['favicon']}}">
    @endif


    <title>سلسلة &#8211; منصة سلسلة لريادة الأعمال</title>


    <link id="pagestyle" href="{{PUBLIC_DIR}}/css/app.css?v=1128" rel="stylesheet"/>


    {{--    <link rel="stylesheet" href="frappe-gantt.css">--}}
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/npm/frappe-gantt@0.5.0/dist/frappe-gantt.css"/>

    {{-- START css file for change (direction|colors|font) --}}
    <link id="pagestyle" href="{{PUBLIC_DIR}}/css/custom.css" rel="stylesheet"/>
    {{-- END css file for change (direction|colors|font) --}}

    {{-- START css file for change color --}}
    <link id="pagestyle" href="{{PUBLIC_DIR}}/css/colors.css" rel="stylesheet"/>
    {{-- END css file for change color --}}

    {{-- START css file for fontawsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    {{-- END css file for fontawsome --}}

    @yield('head')

    <style>
        .nav-link {
            margin: 0px !important;
        }
    </style>
    @stack('header_scripts')
    @livewireStyles
</head>

<body class="g-sidenav-show  bg-gray-100" id="clx_body">
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0  fixed-left " id="sidenav-main">
    <div class="sidenav-header h-auto">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute right-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand text-center m-0 id='dash'" href="{{config('app.url')}}/dashboard">
            @if(!empty($super_settings['logo']))
                <img style="max-height: 80px" src="{{PUBLIC_DIR}}/uploads/{{$super_settings['logo']}}"
                    class="navbar-brand-img h-100" alt="...">
            @else
                <span class="ms-1 font-weight-bold"> {{config('app.name')}}</span>
            @endif
        </a>
    </div>
    <div class=" text-center">
        @if(!empty($user->photo))
            <a href="javascript:" class="avatar avatar-md rounded-circle border border-secondary">
                <img alt="" class="p-1" src="{{PUBLIC_DIR}}/uploads/{{$user->photo}}">
            </a>
        @else

            {{--            <div class="avatar avatar-md  rounded-circle bg-purple-light  border-radius-md p-2">--}}
            {{--                <h6 class="text-purple text-uppercase mt-1">{{$user->first_name[0]}}{{$user->last_name[0]}}</h6>--}}
            {{--            </div>--}}
            {{--            --}}
            <img src="{{url('/img/useravatar.png')}}" height="50" width="50">

        @endif
        <a href="/profile" class=" nav-link text-white font-weight-bold px-0">
            <span
                    class="d-sm-inline d-none ">@if (!empty($user))
                    {{$user->first_name}} {{$user->last_name}}
                @endif</span>
        </a>

    </div>
    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse  w-auto  d-print-none " id="sidenav-collapse-main">

        <ul class="navbar-nav px-0">
            <li class="nav-item">
                <a class="nav-link @if(request()->path() === 'investor') active @endif" id="abanoub"
                   href="/investor">

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="nav-link-text ms-3">{{ __('Dashboard') }}</span>
                </a>


            </li>


            <li class="nav-item">
                <a class="nav-link @if(request()->path() === 'investor/investment-opportunities') active @endif" id="abanoub"
                   href="{{ route("investor.opportunities.index") }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="nav-link-text ms-3">الفرص الاستثمارية
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if(request()->path() === 'investor/favorite-companies') active @endif" id="abanoub"
                   href="{{ route('investor.favorite-companies.index') }}">

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="nav-link-text ms-3">الشركات المفضلة</span>
                </a>


            </li>


            <li class="nav-item">
                <a class="nav-link @if(request()->path() === 'investor/my-investment-portofolio') active @endif" id="abanoub"
                   href="{{ route('investor.my-investment.portofolio') }}">

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="nav-link-text ms-3">محفظتي الاستثمارية</span>
                </a>


            </li>


            <li class="nav-item">
                {{-- <a class="nav-link @if(($selected_navigation ?? '') === 'dashboard') active @endif" id="abanoub"
                   href="{{ route('investor.news.index') }}">

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="nav-link-text ms-3">{{ __('Investment_news') }}</span>
                </a> --}}


            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->path() === 'investor/documents') active @endif" id="abanoub"
                   href="/investor/documents">

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="nav-link-text ms-3">الملفات</span>
                </a>


            </li>
            
            <li class="nav-item">
                <a class="nav-link @if(request()->path() === 'investor/chat') active @endif " href="{{route('investor.chat')}}">

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-database">
                        <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                        <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                        <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                    </svg>

                    <span class="nav-link-text ms-3">الرسائل</span>
                </a>
            </li>

            <li class="nav-item" wire:click='openChat({{ App\Models\User::where('super_admin', 1)->first()->id }})'>
                <a class="nav-link @if(request()->path() === 'investor/chatAdmin') active @endif " href="{{ route('investor.chatAdmin') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="nav-link-text ms-3">تواصل مع الادراة</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->path() === 'investor/profile') === 'userEdit') active @endif " href="/investor/profile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="nav-link-text ms-3">{{__('Profile')}}</span>
                </a>
            </li>
            <br />
            <li class="mb-4 ms-5">
                <a class="btn btn-info" type="button" href="/logout">
                    <span class="">{{__('Logout')}}</span>
                </a>
            </li>
        </ul>
    </div>

</aside>


<main class="main-content mt-1 border-radius-lg ">
    <!-- Navbar -->

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl d-print-none"
         navbar-scroll="true">
        <div class="container-fluid py-1 px-3 d-print-none">

            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                </div>
                <ul class=" justify-content-end">
                    <li class="nav-item d-xl-none pe-2 ps-3 d-flex align-items-center">
                        <a href="javascript:" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
                           aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                            aria-labelledby="dropdownMenuButton">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="/profile">
                                    <div class="d-flex py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">{{__('My Profile')}}</span>
                                            </h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item border-radius-md" href="/logout">
                                    <div class="d-flex py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-bolder mb-1">
                                                {{__('Logout')}}
                                            </h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->
    <div class="container-fluid ">
        @yield('content')
    </div>
</main>
<button class="btn-chat-live tog-active" data-active=".chat-live">
        <i class="fas fa-headset icon-btn"></i>
    </button>
    <div class="chat-live">
        <header class="header-chat">
            <img src="https://placehold.co/400" alt="" class="avatar">
            <h5 class="name">
                بوت ألي
            </h5>
            <span class="subtitle">
                يتم الرد خلال 5 دقائق
            </span>
        </header>
        <main class="content">
            <div class="item">
                <div class="msgs">
                    <div class="msg">
                        مرحبًا 👋! أنا هنا للإجابة على أسئلتك، وفريقنا متاح إذا كنت بحاجة إلى مساعدة إضافية.
                    </div>
                    <div class="msg">
                        كيف يمكنني مساعدتك؟
                    </div>
                </div>
                <img src="https://placehold.co/400" alt="" class="avatar">
            </div>
            <div class="item you">
                <div class="msgs">
                    <div class="msg">
                        مرحبا هل يمكنك مساعدتي؟
                    </div>
                </div>
            </div>
            <div class="item">
                    <div class="msgs">
                        <div class="msg">
                            بالطبع كيف تريدني أن أساعدك !
                        </div>
                    </div>
                <img src="https://placehold.co/400" alt="" class="avatar">
            </div>
            <div class="item you">
                <div class="msgs">
                    <div class="msg">
                        مرحبا هل يمكنك مساعدتي؟
                    </div>
                </div>
            </div>
            <div class="item">
                    <div class="msgs">
                        <div class="msg">
                        بالطبع كيف تريدني أن أساعدك !
                        </div>
                        <div class="msg">
                            بالطبع كيف تريدني أن أساعدك !
                        </div>
                        <div class="msg">
                            بالطبع كيف تريدني أن أساعدك !
                        </div>
                    </div>
                <img src="https://placehold.co/400" alt="" class="avatar">
            </div>
        </main>
        <form class="send">
            <input type="text" name="" id="">
            <div class="btns">
                <div class="btn-file">
                <i class="fas fa-paperclip"></i>
                    <input type="file" name="" id="">
                </div>
            <button type="submit" class="btn-submit">
                <i class="far fa-paper-plane fa-flip-horizontal"></i>
            </button>
            </div>
        </form>
    </div>
<!--   Core JS Files   -->
@livewireScripts
<script>
        if (document.querySelector(".tog-active")) {
    let togglesShow = document.querySelectorAll(".tog-active");
    togglesShow.forEach((e) => {
        e.addEventListener("click", (evt) => {
            let divActive = document.querySelector(
                e.getAttribute("data-active")
            );
            divActive.classList.toggle("active");
        });
    });
  }
    </script>
<script src="{{PUBLIC_DIR}}/js/app.js?v=99"></script>
<script src="{{PUBLIC_DIR}}/lib/tinymce/tinymce.min.js?v=57"></script>
<script>
    (function () {
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
<script src="https://cdn.jsdelivr.net/combine/npm/snapsvg@0.5.1,npm/frappe-gantt@0.5.0/dist/frappe-gantt.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })


    @if(Session::has('success'))
    Toast.fire({
        icon: 'success',
        title: '{!! Session::get('success') !!}'
    });
    @elseif(Session::has('error'))
    Toast.fire({
        icon: 'error',
        title: '{!! Session::get('error') !!}'
    });
    @endif

</script>

{{-- 
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>

    var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
        cluster: 'eu',
        encrypted: true
    });

    var channelCount = pusher.subscribe('user-count-chat');
    channelCount.bind('user-count-chat', function (data) {
        $('#user_chat_count').text(data.count)
    });

</script> --}}

@yield('script')
</body>

</html>

