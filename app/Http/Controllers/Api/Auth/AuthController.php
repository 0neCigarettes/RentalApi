<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Http\Utils\ResponseController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ResponseController;

    public function register(request $request)
    {
        try {

            function verify($key, $value)
            {
                return User::where($key, $value)->count();
            };

            if (verify('username', $request->username) > 0) {
                return $this->GagalWithMsg("Username sudah digunakan !");
            } else if (verify('email', $request->email) > 0) {
                return $this->GagalWithMsg("Email sudah digunakan !");
            } else {
                $req = $request->all();
                $req["password"] = Hash::make($request->password);

                $data = User::create($req);
                if ($data) {
                    return $this->Sukses();
                } else {
                    return $this->Gagal();
                }
            }
        } catch (\Exception $e) {
            return $this->ErrorServer($e->getMessage());
        }
    }

    public function login(request $request)
    {
        try {

            $req = $request->all();
            $getUser = User::where('username', $request->username)->first();
            if ($getUser) {
                $verify = Hash::check($req["password"], $getUser["password"]);
                if ($verify) {
                    return $this->SuksesWithData($getUser);
                } else {
                    return $this->GagalWithMsg("Password anda salah !");
                }
            } else {
                return $this->GagalWithMsg("Username anda tidak ditemukan !");
            }
        } catch (\Exception $e) {
            return $this->ErrorServer($e->getMessage());
        }
    }
}
