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
                @if($slug == "personal")
                    <!-- VENDOR'S PERSONAL DETAILS FORM -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Update Vendor Personal Details</h6>
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
                            <form method="post" action="{{ url('admin/update-vendor-details/personal') }}" name="updateAdminPassword" id="updateAdminPassword" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $vendorDetails['name'] }}">
                                            <small id="name" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name:</label>
                                            <input type="text" name="last_name" class="form-control" id="last_name" aria-describedby="last_nameHelp" value="{{ $vendorDetails['last_name'] }}">
                                            <small id="last_name" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Address:</label>
                                    <input type="text" name="address" class="form-control" id="address" aria-describedby="nameHelp" value="{{ $vendorDetails['address'] }}">
                                    <small id="address" class="form-text text-muted"></small>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-3">
                                        <div class="form-group">
                                            <label for="type">City:</label>
                                            <input type="text" name="city" class="form-control" id="city" aria-describedby="mobileHelp" value="{{ $vendorDetails['city'] }}">
                                            <small id="city" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-3">
                                        <div class="form-group">
                                            <label for="type">State:</label>
                                            <input type="text" name="state" class="form-control" id="state" aria-describedby="mobileHelp" value="{{ $vendorDetails['state'] }}">
                                            <small id="state" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-3">
                                        <div class="form-group">
                                            <label for="zip_code">ZIP Code:</label>
                                            <input type="text" name="zip_code" class="form-control" id="zip_code" aria-describedby="mobileHelp" value="{{ $vendorDetails['zip_code'] }}">
                                            <small id="zip_code" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-3">
                                        <div class="form-group">
                                            <label for="country">Country:</label>
                                            <input type="text" name="country" class="form-control" id="country" aria-describedby="mobileHelp" value="{{ $vendorDetails['country'] }}">
                                            <small id="country" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="type">Mobile:</label>
                                            <input type="text" name="mobile" class="form-control" id="mobile" aria-describedby="mobileHelp" value="{{ $vendorDetails['mobile'] }}" maxlength="10" minlength="10" mobile required>
                                            <small id="type" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="type">Email:</label>
                                            <input type="email" name="email" class="form-control" id="email" aria-describedby="mobileHelp" value="{{ $vendorDetails['email'] }}" >
                                            <small id="email" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="whatsapp">WhatsApp:</label>
                                            <input type="text" name="whatsapp" class="form-control" id="whatsapp" aria-describedby="mobileHelp" value="{{ $vendorDetails['whatsapp'] }}" maxlength="10" minlength="10" mobile required>
                                            <small id="whatsapp" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="facebook">Facebook:</label>
                                            <input type="text" name="facebook_page" class="form-control" id="facebook_page" aria-describedby="mobileHelp" value="{{ $vendorDetails['facebook_page'] }}">
                                            <small id="facebook_page" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <label for="image">Image:</label>
                                        <input type="file" name="image" class="form-control border-0 mb-4" id="image">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @elseif($slug == "business")
                    <!-- VENDOR'S BUSINESS DETAILS FORM -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Update Vendor Business Details</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ url('admin/update-vendor-details/business') }}" name="updateAdminPassword" id="updateAdminPassword" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Restaurant Name:</label>
                                    <input type="text" name="res_name" class="form-control" id="res_name" aria-describedby="emailHelp" value="{{ $vendorDetails['res_name'] }}">
                                    <small id="res_name" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="res_address">Address:</label>
                                    <input type="text" name="res_address" class="form-control" id="res_address" aria-describedby="res_addressHelp" value="{{ $vendorDetails['res_address'] }}">
                                    <small id="res_address" class="form-text text-muted"></small>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-3">
                                        <div class="form-group">
                                            <label for="res_city">City:</label>
                                            <input type="text" name="res_city" class="form-control" id="res_city" aria-describedby="res_cityHelp" value="{{ $vendorDetails['res_city'] }}">
                                            <small id="res_city" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-3">
                                        <div class="form-group">
                                            <label for="res_state">State:</label>
                                            <input type="text" name="res_state" class="form-control" id="res_state" aria-describedby="res_stateHelp" value="{{ $vendorDetails['res_state'] }}">
                                            <small id="res_state" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-3">
                                        <div class="form-group">
                                            <label for="res_zip">ZIP Code:</label>
                                            <input type="text" name="res_zip" class="form-control" id="res_zip" aria-describedby="res_zipHelp" value="{{ $vendorDetails['res_zip'] }}">
                                            <small id="res_zip" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-3">
                                        <div class="form-group">
                                            <label for="res_country">Country:</label>
                                            <input type="text" name="res_country" class="form-control" id="res_country" aria-describedby="res_countryHelp" value="{{ $vendorDetails['res_country'] }}">
                                            <small id="res_country" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="res_mobile">Mobile#:</label>
                                            <input type="text" name="res_mobile" class="form-control" id="res_mobile" aria-describedby="res_mobileHelp" value="{{ $vendorDetails['res_mobile'] }}">
                                            <small id="res_mobile" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="res_whatsapp">WhatsApp:</label>
                                            <input type="text" name="res_whatsapp" class="form-control" id="res_whatsapp" aria-describedby="res_whatsappHelp" value="{{ $vendorDetails['res_whatsapp'] }}">
                                            <small id="res_whatsapp" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="res_email">Email:</label>
                                            <input type="text" name="res_email" class="form-control" id="res_email" aria-describedby="res_emailHelp" value="{{ $vendorDetails['res_email'] }}">
                                            <small id="res_email" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="res_facebook">Facebook:</label>
                                            <input type="text" name="res_facebook" class="form-control" id="res_facebook" aria-describedby="res_facebookHelp" value="{{ $vendorDetails['res_facebook'] }}">
                                            <small id="res_facebook" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="res_website">Website:</label>
                                            <input type="text" name="res_website" class="form-control" id="res_website" aria-describedby="res_websiteHelp" value="{{ $vendorDetails['res_website'] }}">
                                            <small id="res_website" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="res_email">Address Proof:</label>
                                                    <select id="res_address_proof" name="res_address_proof" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="Driving License" @if($vendorDetails['res_address_proof'] == "Driving License") selected @endif>Driving License</option>
                                                        <option value="Passport" @if($vendorDetails['res_address_proof'] == "Passport") selected @endif>Passport</option>
                                                    </select>
                                                    <small id="res_email" class="form-text text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="business_licence_number">License Number:</label>
                                                    <input type="text" name="business_licence_number" class="form-control" id="business_licence_number" aria-describedby="business_licence_numberHelp" value="{{ $vendorDetails['business_licence_number'] }}">
                                                    <small id="business_licence_number" class="form-text text-muted"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <label for="address_proof_image">Address Image:</label>
                                        <input type="file" name="address_proof_image" class="form-control border-0 mb-4" id="address_proof_image">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        @if(!empty(Auth::guard('admin')->user()->image))
                                            <a target="_blank" href="{{ url('admin/img/proof/'. $vendorDetails['address_proof_image']) }}" class="mt-3" id="admin_image">
                                                <img src="{{ url('admin/img/proof/'. $vendorDetails['address_proof_image']) }}" id="resImg">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @elseif($slug == "bank")
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Update Vendors Bank Details</h6>
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
                @endif
            </div>
        </div>
    </div>
@endsection

