@extends('layouts.master')

@section('css')
    <link href="{{ asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('main_title', 'Admins')
@section('header_title', 'Admins')
@section('subheader_title', 'Index')

@section('content')
    <div class="card mb-5 mb-xxl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">
                    {{ 'Admins' }}
                </span>
                <span class="text-muted fw-bold fs-7">
                    {{ 'There Is'}} {{ $admins ? $admins->count() : '0' }} {{ 'Admins' }}
                    <br>
                    {{ 'This Page Just For Test " Send Emails Functionality " ' }}
                </span>
            </h3>
            <!--end::Title-->

            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                 title="Click To Send Emails" disabled>

                <a href="{{ route('admin.send-emails') }}" class="btn btn-sm btn-light-primary">
                    <span class="svg-icon svg-icon-3">
                        <i class="fas fa-plus-square fs-3"></i>
                    </span>
                    Send Emails
                </a>
            </div>
        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive" id="table-data">
                <table class="table table-row-bordered gy-5" id="blogs">
                    <thead>
                    <tr class="fw-bold fs-6 text-muted text-center">
                        <th>
                            #
                        </th>
                        <th>
                            {{ 'name' }}
                        </th>
                        <th>
                            {{ 'email' }}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if( $admins )
                        @foreach( $admins as $i => $admin )
                            <tr class="text-center">
                                <td>
                                    {{ $i += 1 }}
                                </td>
                                <td>
                                    {{ $admin->name }}
                                </td>
                                <td>
                                    {{ $admin->email }}
                                </td>
                            </tr>
                        @endforeach
                    @endif


                    </tbody>
                </table>


            </div>
            <!--end::Body-->
        </div>
    </div>
@endsection
