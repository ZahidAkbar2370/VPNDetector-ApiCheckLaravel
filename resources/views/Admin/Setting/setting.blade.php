@extends('Admin.admin_layout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row mb-3">
                @if(Session::has("message"))
                    <span class="bg-info p-2 text-white mb-3">{{ Session::get("message") }}</span>
                @endif
            </div>
            
            <div class="row mt-2">
                <div class="col-lg-12">
                    <h4 class="page-title">Setting</h4>
                </div>
            </div>
            <form action="{{ URL::to('admin/save-setting') }}" method="post">
                @csrf
                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Redirect Website URL <span class="text-danger">*</span></label>
                            <input class="form-control" type="url" name="website_url" value="{{ $setting->website_url ?? old('website_url') }}" placeholder="Enter Website Url" required>
                        </div>

                        @error('website_url')
                            <span class="text-danger">{{ $errors->first('website_url') }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Advertisement URL <span class="text-danger">*</span></label>
                            <input class="form-control" type="url" name="advertisment_url" value="{{ $setting->advertisement_url ?? old('advertisment_url') }}" placeholder="Enter Advertisment Url" required>

                            @error('advertisment_url')
                                <span class="text-danger">{{ $errors->first('advertisment_url') }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn" onclick="return confirm('Are you Sure to Update Setting?')">Save Change</button>
                </div>
        </div>
        </form>
    </div>
@endsection
