@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <div class="row mb-4" style="border-bottom: 3px solid #FFCC00">
            <div class="col-lg-12">
                <h5>Admin Settings</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        @if(Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error !</strong> {{Session::get('error_message')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                            @if(Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Error !</strong> {{Session::get('success_message')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Update Admin Password</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('admin/update-admin-password') }}" name="updateAdminPassword" id="updateAdminPassword">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email / Username:</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{ $adminDetails['email'] }}" disabled>
                                <small id="email" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="type">Admin Type:</label>
                                <input type="text" name="type" class="form-control" id="type" aria-describedby="typeHelp" value="{{ $adminDetails['type'] }}" disabled>
                                <small id="type" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="current_password">Current Password:</label>
                                <input type="password" name="current_password" class="form-control" id="current_password">
                                <small id="check_password" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password:</label>
                                <input type="password" name="new_password" class="form-control" id="new_password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password:</label>
                                <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
