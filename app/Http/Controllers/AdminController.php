<?php

namespace App\Http\Controllers;

use App\Http\Utils\ResponseController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    use ResponseController;


    public function index()
    {
        $data = User::where([
            ['role', '=', 2],
            ['status', '=', 'on']
        ])->get()->toArray();
        return view('admin.index')->with(['data' => $data]);
    }

    public function getJasaRental()
    {
        $data = User::where('role', '=', 2)->paginate(7);
        return view('admin.jasa_rental')->with(['data' => $data]);
    }

    public function getCustomer()
    {
        $data = User::where('role', '=', 1)->paginate(7);
        return view('admin.customer')->with(['data' => $data]);
    }

    public function editJasa($id)
    {
        $data = User::where('id', $id)->first();
        return view('admin.edit.edit_jasa')->with(['data' => $data]);
    }

    public function updateJasaRental(Request $request, $id)
    {
        $data = $request->all();

        $newData = [
            'lati' => $data['lati'],
            'longi' => $data['longi']
        ];

        // return $newData;
        $update = User::where('id', $id)->update($newData);
        if ($update) {
            return redirect()->route('jasa')->with($this->SuksesAction(true, 'Data berhasil di perbarui !'));
        } else {
            return redirect()->route('jasa')->with($this->SuksesAction(false, 'Data gagal di perbarui !'));
        }
    }

    public function changeStatus($id, $status)
    {

        $update = User::where('id', $id)->update(['status' => $status]);
        if ($update) {
            return redirect()->route('jasa')->with($this->SuksesAction(true, 'Berhasil merubah status !'));
        } else {
            return redirect()->route('jasa')->with($this->SuksesAction(false, 'Gagal merubah status !'));
        }
    }

    public function resetPwd($id)
    {
        $newPwd = "12345678";
        $hash = Hash::make($newPwd);
        $reset = User::where('id', $id)->update(['password' => $hash]);

        if ($reset) {
            return redirect()->back()->with($this->SuksesAction(true, 'Password direset menjadi (12345678)'));
        } else {
            return redirect()->back()->with($this->SuksesAction(false, 'Gagal reset password !'));
        }
    }

    public function deleteUser($id)
    {
        $delete = User::where('id', $id)->delete();

        if ($delete) {
            return redirect()->back()->with($this->SuksesAction(true, 'Data pengguna berhasil dihapus !'));
        } else {
            return redirect()->back()->with($this->SuksesAction(true, 'Data pengguna gagal dihapus !'));
        }
    }
}
