@extends('layouts.master')

@section('css')
    <link href="{{ asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('main_title', 'Contacts')
@section('header_title', 'Contacts')
@section('subheader_title', 'Index')

@section('content')
    <div class="card mb-5 mb-xxl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">
                    {{ 'Contacts' }}
                </span>
                <span class="text-muted fw-bold fs-7">
                    {{ 'There Is'}} {{ $contacts ? $contacts->count() : '0' }} {{ 'Contacts' }}
                </span>
            </h3>
            <!--end::Title-->
        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive" id="table-data">
                @include('dashboard.contact_us.table-data')
            </div>
            <!--end::Body-->
        </div>
    </div>
@endsection

@section('js')
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
                url: "{{ route('contact-us.delete') }}",
                type: "GET",
                data: {
                    id: id
                },
                success: function(data) {
                    // $('#delete-'+id).modal('hide');

                    Swal.fire({
                        title: 'Success',
                        text: 'Contact Successfully Deleted',
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: 'Done',
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });

                    $.ajax({
                        url: "{{ route('contact-us.fetch') }}",
                        type: 'GET',
                    }).done(function (data) {
                        $("#table-data").html(data);
                        $("#services").DataTable();
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
