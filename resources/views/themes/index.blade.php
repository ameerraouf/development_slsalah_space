@extends('layouts.super-admin-portal')
@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class=" row mb-2">
        <div class="col">
            <h5 class=" text-secondary fw-bolder">
                {{ __('ThemeSettings') }}
            </h5>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <x-messages></x-messages>
            <a href="{{ route('super-admin-themes.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('create')</a>
            @if (session('deleteSuccess'))
            <div class="alert alert-success text-white">
                <i class="far fa-check-circle"></i> تم حذف مساحة العمل بنجاح
            </div>
            @endif
            <div class="card card-body mb-4">

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="cloudonex_table">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('Name') }}</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        {{ __('Created_at') }}</th>
                                   
                                    {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('Status') }}</th> --}}

                                    <th class=" text-uppercase text-secondary text-xxs opacity-7">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class = "target-table">
                                @foreach ($themes as $theme)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $theme->name }} </h6>
                                                    <p class="text-xs text-secondary mb-0"></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $theme->created_at->format('Y-m-d')}}
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('super-admin-themes.edit', $theme->id) }}" class="btn btn-warning btn-sm" title="@lang('site.edit')">
                                                <i class="fa fa-edit"></i> 
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm delete" data-bs-toggle="modal" data-bs-target="#delete{{ $theme->id }}" title="@lang('site.delete')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        {{-- modal delete --}}
                                            <div class="modal fade" id="delete{{ $theme->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">delete theme</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('super-admin-themes.destroy', $theme->id) }}" method="POST">
                                                            <div class="modal-body">
                                                                @csrf
                                                                @method('DELETE')
                                                                are you sure to delete this theme ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                                                <button type="submit" class="btn btn-primary">نعم</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- end modal delete --}}
                                      
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
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <script>
        "use strict";
        $(document).ready(function() {

            $('body').on('click', '.delete-btn', function(e) {
                e.preventDefault()
                var result = window.confirm("هل أنت متأكد انك تريد الحذف؟");
                let targetLink = $(this).attr('href')
                if (result) {
                    window.location.href = targetLink;
                }

            })
            if ($('.admin-wokspace-row').length > 0) {
                $('.target-table').prepend($('.admin-wokspace-row').prop('outerHTML'))
                $('.admin-wokspace-row')[1].remove()

            }
            $('#cloudonex_table').DataTable({
                searching: true,
                ordering: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Arabic.json'
                }
            });

        });
    </script>
@endsection
