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
                

                <div class="col-sm-4 col-3">
                    <h4 class="page-title"> Country List</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="{{ url('admin/create-country') }}" class="btn btn btn-primary btn-rounded float-right"><i
                            class="fa fa-plus"></i> Add Country</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-border table-striped custom-table datatable mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 3%;">ID</th>
                                    <th style="width: 10%;">Country Name</th>
                                    <th style="width: 10%;">Country Code</th>
                                    <th style="width: 10%;">Status</th>
                                    <th style="width: 5%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($countries))
                                    @foreach ($countries as $key => $country )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $country->country_name }}</td>
                                            <td>{{ $country->country_code }}</td>
                                            <td><span class="text-uppercase p-2  @if($country->status == 'blocked')  bg-danger @else bg-success @endif">{{ $country->status }}</span></td>
                                            <td class="">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ url('admin/delete-country/'.$country->id) }}" onclick="return confirm('Do you want to Delete This Country?')"><i class="fa fa-trash-o m-r-5"></i>
                                                            Delete</a>

                                                            @if($country->status == "blocked")
                                                                <a class="dropdown-item" href="{{ url('admin/approved-country/'.$country->id) }}" onclick="return confirm('Do you want to Approved This Country?')"><i class="fa fa-thumbs-up m-r-5"></i>
                                                                    Approve Country</a>
                                                            @else
                                                                <a class="dropdown-item" href="{{ url('admin/blocked-country/'.$country->id) }}" onclick="return confirm('Do you want to Blocked This Country?')"><i class="fa fa-thumbs-down m-r-5"></i>
                                                                    Block Country</a>
                                                            @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
