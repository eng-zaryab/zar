<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\VendorsBusinessDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;



class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    // UPDATE ADMIN PASSWORD
    public function updateAdminPassword(Request $request){
        //echo "<pre>", print_r(Auth::guard('admin')->user()); die;
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>", print_r($data); die;
            // CHECK IF THE CURRENT PASSWORD IS MATCHING WITH THE DATABASE PASSWORD
            if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
                // CHECK IF THE NEW PASSWORD IS MATCHING WITH CONFIRM PASSWORD
                if($data['confirm_password'] == $data['new_password']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message', 'Password Updated Successfully');
                }else{
                    return redirect()->back()->with('error_message', 'New Password Does Not Match With Confirm Password');
                }
            }else{
                return redirect()->back()->with('error_message', 'Your current password is incorrect');
            }
        }
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
    }

    // UPDATE ADMIN DETAILS
    public function updateAdminDetails(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            // DATA VALIDATION
            $rules = [
                'name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'mobile' => 'required|numeric',
            ];
            $customMessage = [
                'name.required' => 'Name is required ...',
                'name.regex' => 'Name must be alphabets ...',
                'last_name.regex' => 'Last name must be alphabets ...',
                'mobile.required' => 'Mobile number is required ...',
                'mobile.numeric' => 'Mobile must be 10 digits ...',
            ];
            $validator = Validator::make($request->all(), $rules, $customMessage);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // UPLOADING PROFILE PHOTOS TO THE DATABASE
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // Get the current user's profile photo
                    $currentImage = Admin::where('id', Auth::guard('admin')->user()->id)->first()->image;

                    // Image path
                    $image_path = 'admin/img/profile/';

                    // Generate a unique file name for the new image
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extension;

                    // Move the uploaded file to the destination directory
                    $success = $image_tmp->move($image_path, $imageName);

                    // Check if the user already has a profile image and delete it
                    if (!empty($currentImage) && file_exists($image_path . $currentImage)) {
                        unlink($image_path . $currentImage);
                    }

                    // Update the database with the new image name
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['image' => $imageName]);
                }
            }
            // UPDATE ADMIN DETAILS
            Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $data['name'],'mobile' => $data['mobile']]);
            return redirect()->back()->with('success_message', 'Admin Details updated successfully');
        }
        return view('admin.settings.update_admin_details');
    }

    // CHECK ADMIN PASSWORD
    public function checkAdminPassword(Request $request){
        $data = $request->all();
        //echo "<pre>", print_r($data); die;
        if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
            return "true";
        }else{
            return "false";
        }
    }

    //////////////////////////////////////////////////////////////// VENDOR FUNCTIONS STARTS HERE //////////////////////////////////////////////////////////////////
    // UPDATE VENDOR DETAILS
    public function updateVendorDetails($slug, Request $request,){
        if($slug == "personal") {
            if ($request->isMethod('post')) {
                $data = $request->all();
                //echo "<pre>", print_r($data); die;

                // DATA VALIDATION
                $rules = [
                    'name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                    'last_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                    'address' => 'required',
                    'city' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                    'state' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                    'zip_code' => 'required|numeric',
                    'country' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                    'mobile' => 'required|numeric',
                    'email' => 'required',
                ];
                $customMessage = [
                    'name.required' => 'Name is required ...',
                    'name.regex' => 'Name must be alphabets ...',
                    'last_name.required' => 'Last name is required ...',
                    'lst_name.regex' => 'Last name must be alphabets ...',
                    'address.required' => 'Address is required ...',
                    'city.required' => 'City is required ...',
                    'city.regex' => 'City must be alphabets ...',
                    'state.required' => 'State is required ...',
                    'state.regex' => 'State must be alphabets ...',
                    'zip_code.required' => 'ZipCode is required ...',
                    'zip_code.regex' => 'ZipCode must be in digits ...',
                    'country.required' => 'Country is required ...',
                    'country.regex' => 'Country must be alphabets ...',
                    'mobile.required' => 'Mobile is required ...',
                    'mobile.numeric' => 'Mobile must be 10 digits ...',
                    'email.required' => 'Email is required ...',
                ];
                $validator = Validator::make($request->all(), $rules, $customMessage);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // UPDATE VENDOR DETAILS
                // UPLOADING PROFILE PHOTOS TO THE DATABASE
                if ($request->hasFile('image')) {
                    $image_tmp = $request->file('image');
                    if ($image_tmp->isValid()) {
                        // Get the current user's profile photo
                        $currentImage = Admin::where('id', Auth::guard('admin')->user()->id)->first()->image;

                        // Image path
                        $image_path = 'admin/img/profile/';

                        // Generate a unique file name for the new image
                        $extension = $image_tmp->getClientOriginalExtension();
                        $imageName = rand(111,99999).'.'.$extension;

                        // Move the uploaded file to the destination directory
                        $success = $image_tmp->move($image_path, $imageName);

                        // Check if the user already has a profile image and delete it
                        if (!empty($currentImage) && file_exists($image_path . $currentImage)) {
                            unlink($image_path . $currentImage);
                        }

                        // Update the database with the new image name
                        Admin::where('id', Auth::guard('admin')->user()->id)->update(['image' => $imageName]);
                    }
                }
                // UPDATE IN ADMIN TABLE
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $data['name'], 'mobile' => $data['mobile']]);
                // UPDATE IN VENDOR TABLE
                Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->update([
                    'name' => $data['name'],
                    'last_name' => $data['last_name'],
                    'address' => $data['address'],
                    'city' => $data['city'],
                    'state' => $data['state'],
                    'zip_code' => $data['zip_code'],
                    'country' => $data['country'],
                    'mobile' => $data['mobile'],
                    'email' => $data['email'],
                    'whatsapp' => $data['whatsapp'],
                    'facebook_page' => $data['facebook_page']
                ]);
                return redirect()->back()->with('success_message', 'Vendor Details updated successfully');
            }
            $vendorDetails = Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        } elseif ($slug == "business") {
            if ($request->isMethod('post')) {
                $data = $request->all();
                //echo "<pre>", print_r($data); die;

                // DATA VALIDATION
                $rules = [
                    'res_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                    'res_address' => 'required',
                    'res_city' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                    'res_state' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                    'res_zip' => 'required|numeric',
                    'res_country' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                    'res_mobile' => 'required|numeric',
                    'res_email' => 'required',
                    'res_address_proof' => 'required',
                    'address_proof_image' => 'required',
                    'business_licence_number' => 'required',
                ];
                $customMessage = [
                    'res_name.required' => 'Restaurant name is required ...',
                    'res_name.regex' => 'Restaurant name must be alphabets ...',
                    'res_address.required' => 'Address is required ...',
                    'res_city.required' => 'City is required ...',
                    'res_city.regex' => 'City must be alphabets ...',
                    'res_state.required' => 'State is required ...',
                    'res_state.regex' => 'State must be alphabets ...',
                    'res_zip.required' => 'ZipCode is required ...',
                    'res_zip.regex' => 'ZipCode must be in digits ...',
                    'res_country.required' => 'Country is required ...',
                    'res_country.regex' => 'Country must be alphabets ...',
                    'res_mobile.required' => 'Mobile is required ...',
                    'res_mobile.numeric' => 'Mobile must be 10 digits ...',
                    'email.required' => 'Email is required ...',
                    'res_address_proof.required' => 'Address proof is required ...',
                    'address_proof_image.required' => 'Address proof image is required ...',
                    'business_licence_number.required' => 'Business license number is required ...',
                ];
                $validator = Validator::make($request->all(), $rules, $customMessage);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // UPDATE VENDOR DETAILS
                // UPLOADING PROFILE PHOTOS TO THE DATABASE
                if ($request->hasFile('address_proof_image')) {
                    $image_tmp = $request->file('address_proof_image');
                    if ($image_tmp->isValid()) {
                        // Get the current user's profile photo
                        $currentImage = VendorsBusinessDetail::where('id', Auth::guard('admin')->user()->vendor_id)->first()->address_proof_image;

                        // Image path
                        $image_path = 'admin/img/proof/';

                        // Generate a unique file name for the new image
                        $extension = $image_tmp->getClientOriginalExtension();
                        $imageName = rand(111,99999).'.'.$extension;

                        // Move the uploaded file to the destination directory
                        $success = $image_tmp->move($image_path, $imageName);

                        // Check if the user already has a profile image and delete it
                        if (!empty($currentImage) && file_exists($image_path . $currentImage)) {
                            unlink($image_path . $currentImage);
                        }
                    }
                }


                // UPDATE IN VENDOR TABLE
                VendorsBusinessDetail::where('id', Auth::guard('admin')->user()->vendor_id)->update([
                    'res_name' => $data['res_name'],
                    'res_address' => $data['res_address'],
                    'res_city' => $data['res_city'],
                    'res_state' => $data['res_state'],
                    'res_zip' => $data['res_zip'],
                    'res_country' => $data['res_country'],
                    'res_mobile' => $data['res_mobile'],
                    'res_email' => $data['res_email'],
                    'res_website' => $data['res_website'],
                    'res_facebook' => $data['res_facebook'],
                    'res_whatsapp' => $data['res_whatsapp'],
                    'res_address_proof' => $data['res_address_proof'],
                    'address_proof_image' => $imageName,
                    'business_licence_number' => $data['business_licence_number'],
                ]);
                return redirect()->back()->with('success_message', 'Vendor Business Details updated successfully');
            }
            $vendorDetails = VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        } elseif ($slug == "bank") {

        }
        return view('admin.settings.update_vendor_details')->with(compact('slug', 'vendorDetails'));
    }

    // ADMIN LOGIN ROUTE
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'email' => 'required',
                'password' => 'required',
            ];

            $customMessage = [
                'email.required' => 'Email is required...',
                'password.required' => 'Password is required...',
            ];

            $validator = Validator::make($request->all(), $rules, $customMessage);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->with('error_message', 'Invalid Credentials');
            }
        }

        return view('admin.login');
    }


    // ADMIN LOGOUT
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
