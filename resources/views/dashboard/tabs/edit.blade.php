@extends('layouts.master')

@section('main_title', 'Create Tab')
@section('header_title', 'Create Tab')
@section('subheader_title', 'Create')

@section('content')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">
                    {{ 'Create Tab' }}
                </span>
            </h3>
        </div>
        <div class="card-body py-3">
            <form action="{{ route('tab.update', ['id' => $tab->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-12">
                        <div class="mb-10">
                            <label class="form-label">
                                {{ 'Title' }}
                            </label>
                            <input type="text" name="tab_name" class="form-control form-control-solid @error('tab_name') is-invalid @enderror" placeholder="Tab Name Here" value="{{ $tab->tab_name }}">
                            @error('tab_name')
                                <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="mb-10">
                            <!--begin::Input group-->
                            <div class="input-group input-group-solid">
                                <span class="input-group-text">{{ 'Description' }}</span>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" aria-label="{{ 'Description' }}" >
                                    {{ $tab->description }}
                                </textarea>
                            </div>
                            <!--end::Input group-->
                            @error('description')
                            <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary float-end w-md-25">Save</button>
            </form>
        </div>
    </div>

@endsection
