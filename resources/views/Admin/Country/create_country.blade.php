@extends('Admin.admin_layout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            
            <div class="row mt-2">
                <div class="col-lg-12">
                    <h4 class="page-title">Create Country</h4>
                </div>
            </div>
            <form action="{{ URL::to('admin/save-country') }}" method="post">
                @csrf
                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Country Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="country_name" value="{{ old('country_name') }}" placeholder="Enter Country Name" required>
                        </div>

                        @error('country_name')
                            <span class="text-danger">{{ $errors->first('country_name') }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Country Code <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="country_code" value="{{ old('country_code') }}" placeholder="Enter Country Code" required>

                            @error('country_code')
                                <span class="text-danger">{{ $errors->first('country_code') }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn" onclick="return confirm('Are you Sure to Add Country?')">Save Change</button>
                </div>
        </div>
        </form>
    </div>
@endsection
