@extends('layouts.master')

@section('css')
    <link href="{{ asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('main_title', 'Tabs')
@section('header_title', 'Tabs')
@section('subheader_title', 'Index')

@section('content')
    <div class="card mb-5 mb-xxl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">
                    {{ 'Tabs' }}
                </span>
                <span class="text-muted fw-bold fs-7">
                    {{ 'There Is'}} {{ $tabs ? $tabs->count() : '0' }} {{ 'Tabs' }}
                </span>
            </h3>
            <!--end::Title-->

            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                 title="Click To Add New Service" disabled>

                <a href="{{ route('tab.create') }}" class="btn btn-sm btn-light-primary">
                    <span class="svg-icon svg-icon-3">
                        <i class="fas fa-plus-square fs-3"></i>
                    </span>
                    Create Tab
                </a>
            </div>
        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive" id="table-data">
                @include('dashboard.tabs.table-data')
            </div>
            <!--end::Body-->
        </div>
    </div>
@endsection

@section('js')
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('dashboard/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <script src="{{ asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script>
        // Delete Functionality
        $(document).on('click', '.delete-icon' ,function (e){
            e.preventDefault();

            var id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('tab.delete') }}",
                type: "GET",
                data: {
                    id: id
                },
                success: function(data) {


                    Swal.fire({
                        title: 'Success',
                        text: 'Tab Successfully Deleted',
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: 'Done',
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });

                    $.ajax({
                        url: "{{ route('tab.index') }}",
                        type: 'GET',
                    }).done(function (data) {
                        $("#table-data").html(data);
                        $("#blogs").DataTable();
                    });

                    $('.modal-backdrop').remove();
                    $('#delete-'+id).modal('hide');
                },
                error: function(data) {
                    console.log(data);
                },
            });
        });
    </script>
@endsection
