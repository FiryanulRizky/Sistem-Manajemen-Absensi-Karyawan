<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\ImageManagerStatic as Image;
use App\Employee;
use App\Department;
use App\User;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function reset_password() {
        return view('auth.reset-password');
    }

    public function update_password(Request $request) {
        $user = User::findOrFail(Auth::user()->id);
        if(Hash::check($request->old_password,$user->password)===true) {
            $user->password = Hash::make($request->password);
            $request->session()->flash('success', 'Password Berhasil di Update');
            $user->save();
            // return view('auth.reset-password');
            return back();
        } else {
            $request->session()->flash('error', 'Password Salah');
            return back();
        }
    }

    public function adminProfile($admin_id) {
        $admin = Employee::findOrFail($admin_id);
        return view('admin.profile')->with('admin', $admin);
    }

    public function profile_edit($admin_id) {
        $data = [
            'admin' => Employee::findOrFail($admin_id),
            'departments' => Department::all(),
            'desgs' => ['Manajer', 'Asistent Manajer', 'Projek Manajer', 'Staff']
        ];
        Gate::authorize('admin-profile-access', intval($admin_id));
        return view('admin.profile-edit')->with($data);
    }

    public function profile_update(Request $request, $admin_id) {
        Gate::authorize('admin-profile-access', intval($admin_id));
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'photo' => 'image|nullable'
        ]);
        $admin = Employee::findOrFail($admin_id);
        $user_admin = User::find($admin->user_id);
        $user_admin->name = ''.$request->first_name.' '.$request->last_name.'';
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->dob = $request->dob;
        $admin->sex = $request->gender;
        $admin->join_date = $request->join_date;
        $admin->desg = $request->desg;
        $admin->department_id = $request->department_id;
        if ($request->hasFile('photo')) {
            // Deleting the old image
            if ($admin->photo != 'user.png') {
                $old_filepath = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'employee_photos'.DIRECTORY_SEPARATOR. $admin->photo);
                if(file_exists($old_filepath)) {
                    unlink($old_filepath);
                }    
            }
            // GET FILENAME
            $filename_ext = $request->file('photo')->getClientOriginalName();
            // GET FILENAME WITHOUT EXTENSION
            $filename = pathinfo($filename_ext, PATHINFO_FILENAME);
            // GET EXTENSION
            $ext = $request->file('photo')->getClientOriginalExtension();
            //FILNAME TO STORE
            $filename_store = $filename.'_'.time().'.'.$ext;
            // UPLOAD IMAGE
            // $path = $request->file('photo')->storeAs('public'.DIRECTORY_SEPARATOR.'employee_photos', $filename_store);
            // add new file name
            $image = $request->file('photo');
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(public_path(DIRECTORY_SEPARATOR.'storage/employee_photos/'.DIRECTORY_SEPARATOR.$filename_store));
            $admin->photo = $filename_store;
        }
        $admin->save();
        $user_admin->save();
        $request->session()->flash('success', 'Profil Anda Berhasil diupdate !');
        return back();
    }
}
