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
                        @if($errors -> any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach($errors -> all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <h6 class="m-0 font-weight-bold text-primary">Update Admin Details</h6>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                @if(!empty(Auth::guard('admin')->user()->image))
                                    <a target="_blank" href="{{ url('admin/img/profile/'. Auth::guard('admin')->user()->image) }}" class="mt-3" id="admin_image">
                                        <img src="{{ url('admin/img/profile/'. Auth::guard('admin')->user()->image) }}" id="profileImg">
                                    </a>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('admin/update-admin-details') }}" name="updateAdminPassword" id="updateAdminPassword" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="email">Username / Email:</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{ Auth::guard('admin')->user()->email }}" disabled>
                                <small id="email" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="email">Type:</label>
                                <input type="type" name="type" class="form-control" id="type" aria-describedby="typeHelp" value="{{ Auth::guard('admin')->user()->type }}" disabled>
                                <small id="type" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="email">Name:</label>
                                <input type="name" name="name" class="form-control" id="name" aria-describedby="nameHelp" value="{{ Auth::guard('admin')->user()->name }}" required>
                                <small id="name" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="type">Mobile:</label>
                                <input type="text" name="mobile" class="form-control" id="mobile" aria-describedby="mobileHelp" value="{{ Auth::guard('admin')->user()->mobile }}" maxlength="10" minlength="10" mobile required>
                                <small id="type" class="form-text text-muted"></small>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="image">Image:</label>
                                    <input type="file" name="image" class="form-control border-0 mb-4" id="image">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

