<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;   
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class Mylogin extends Controller
{
    
    public function aksi_login(Request $request){
        $username = $request->input('email');
		$password = $request->input('password');
        // print_r($username); print_r($password);
        $test = Users::where('email', $username)->first();
		//print_r($test);
        if ($test) {
            $realpassword = $test->password;
            //print_r($realpassword);
            if(Hash::check($password,$realpassword)){
                //echo 'password cocok';
                $role = $test->role;
				//print_r($role); exit();
				switch($role){
					case 'admin':
						return redirect()->route('routeAdmin');
					break;
					case 'user':
						return redirect()->route('routePelanggan');
                    break;
				}
            } else {
				return view('toko.errors',['email','toko.errors']);
			}
        }
        else{
            return view('toko.errors',['email','toko.errors']);
        }
        
    }
}
