@extends('layouts.master')

@section('main_title', 'Settings')
@section('header_title', 'Settings')
@section('subheader_title', 'Edit')

@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@endsection

@section('content')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">
                    {{ 'Edit Settings' }}
                </span>
            </h3>
        </div>
        <div class="card-body py-3">
            <form action="{{ route('setting.update', ['id' => $setting->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Website Logo --}}
                <div class="row mb-3">
                    <label for="formFile" class="form-label">Website Logo</label>
                    <input class="form-control" type="file" name="website_logo" id="formFile">
                    @error('website_logo')
                        <div class="alert text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Address --}}
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="mb-10">
                            <label class="form-label">
                                {{ 'Address' }}
                            </label>
                            <input type="text" name="address" class="form-control form-control-solid @error('address') is-invalid @enderror" placeholder="Address Here" value="{{ $setting->address }}">
                            @error('address')
                            <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="formFile" class="form-label">Address Icon</label>
                        <input class="form-control" type="file" name="address_icon" id="formFile">
                        @error('address_icon')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                {{-- Contact --}}
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="mb-10">
                            <label class="form-label">
                                {{ 'Contact Phone' }}
                            </label>
                            <input type="text" name="contact_phone" class="form-control form-control-solid @error('contact_phone') is-invalid @enderror" placeholder="Contact Phone Here" value="{{ $setting->contact_phone }}">
                            @error('contact_phone')
                            <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-10">
                            <label class="form-label">
                                {{ 'Contact Email' }}
                            </label>
                            <input type="email" name="contact_email" class="form-control form-control-solid @error('contact_email') is-invalid @enderror" placeholder="Contact Email Here" value="{{ $setting->contact_email }}">
                            @error('contact_email')
                                <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="formFile" class="form-label">Contact Icon</label>
                        <input class="form-control" type="file" name="contact_icon" id="formFile">
                        @error('contact_icon')
                        <div class="alert text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                {{-- Services --}}
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="mb-10">
                            <label class="form-label">
                                {{ 'Service Title' }}
                            </label>
                            <input type="text" name="service_title" class="form-control form-control-solid @error('service_title') is-invalid @enderror" placeholder="Contact Phone Here" value="{{ $setting->service_title }}">
                            @error('service_title')
                            <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-10">
                            <!--begin::Input group-->
                            <div class="input-group input-group-solid">
                                <span class="input-group-text">{{ 'Service Description' }}</span>
                                <textarea class="form-control @error('service_description') is-invalid @enderror" name="service_description" aria-label="{{ 'service_description' }}" >
                                    {{ $setting->service_description }}
                                </textarea>
                            </div>
                            <!--end::Input group-->
                            @error('service_description')
                            <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Work --}}
                <div class="row mb-3">
                    <div class="col-4">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Work From</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input class="form-control" name="work_from" type="time"/>
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Work To</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input class="form-control" name="work_to" type="time"/>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="formFile" class="form-label">Work Icon</label>
                        <input class="form-control" type="file" name="work_icon" id="formFile">
                        @error('work_icon')
                        <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Services --}}
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="mb-10">
                            <label class="form-label">
                                {{ 'Blog Title' }}
                            </label>
                            <input type="text" name="blog_title" class="form-control form-control-solid @error('blog_title') is-invalid @enderror" placeholder="Blog title Here" value="{{ $setting->blog_title }}">
                            @error('blog_title')
                            <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-10">
                            <!--begin::Input group-->
                            <div class="input-group input-group-solid">
                                <span class="input-group-text">{{ 'Blog Description' }}</span>
                                <textarea class="form-control @error('blog_description') is-invalid @enderror" name="blog_description" aria-label="{{ 'blog_description' }}" >
                                    {{ $setting->blog_description }}
                                </textarea>
                            </div>
                            <!--end::Input group-->
                            @error('blog_description')
                            <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Contact Us --}}
                <div class="row">
                    <div class="col-6">
                        <div class="mb-10">
                            <label class="form-label">
                                {{ 'Contact Us Title' }}
                            </label>
                            <input type="text" name="contact_us_title" class="form-control form-control-solid @error('contact_us_title') is-invalid @enderror" placeholder="contact us title Here" value="{{ $setting->contact_us_title }}">
                            @error('contact_us_title')
                            <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-10">
                            <label class="form-label">
                                {{ 'Contact Us Sub Title' }}
                            </label>
                            <input type="text" name="contact_us_subtitle" class="form-control form-control-solid @error('contact_us_subtitle') is-invalid @enderror" placeholder="contact us sub title Here" value="{{ $setting->contact_us_subtitle }}">
                            @error('contact_us_subtitle')
                            <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-10">
                            <!--begin::Input group-->
                            <div class="input-group input-group-solid">
                                <span class="input-group-text">{{ 'Contact Us Description' }}</span>
                                <textarea class="form-control @error('contact_us_description') is-invalid @enderror" name="contact_us_description" aria-label="{{ 'contact_us_description' }}" >
                                    {{ $setting->contact_us_description }}
                                </textarea>
                            </div>
                            <!--end::Input group-->
                            @error('contact_us_description')
                            <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="row">
                    <div class="col-12">
                        <div class="mb-10">
                            <!--begin::Input group-->
                            <div class="input-group input-group-solid">
                                <span class="input-group-text">{{ 'Footer Title' }}</span>
                                <textarea class="form-control @error('footer_description') is-invalid @enderror" name="footer_title" aria-label="{{ 'footer_title' }}" >
                                    {{ $setting->footer_title }}
                                </textarea>
                            </div>
                            <!--end::Input group-->
                            @error('footer_title')
                            <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


{{--                <div class="row">--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="mb-10">--}}
{{--                            <label class="form-label">--}}
{{--                                {{ 'Title' }}--}}
{{--                            </label>--}}
{{--                            <input type="text" name="tab_name" class="form-control form-control-solid @error('tab_name') is-invalid @enderror" placeholder="Tab Name Here" value="{{ $tab->tab_name }}">--}}
{{--                            @error('tab_name')--}}
{{--                            <div class="alert text-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row">--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="mb-10">--}}
{{--                            <!--begin::Input group-->--}}
{{--                            <div class="input-group input-group-solid">--}}
{{--                                <span class="input-group-text">{{ 'Description' }}</span>--}}
{{--                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" aria-label="{{ 'Description' }}" >--}}
{{--                                    {{ $tab->description }}--}}
{{--                                </textarea>--}}
{{--                            </div>--}}
{{--                            <!--end::Input group-->--}}
{{--                            @error('description')--}}
{{--                            <div class="alert text-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


                <button type="submit" class="btn btn-primary float-end w-md-25">Save</button>
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script>
        // Class definition
        $('#kt_timepicker_1, #kt_timepicker_2').timepicker();

    </script>
@endsection
