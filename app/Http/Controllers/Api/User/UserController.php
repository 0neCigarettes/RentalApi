<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Utils\QueryProduct;
use App\Http\Utils\ResponseController;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ResponseController;
    use QueryProduct;

    public function GetAllJasa()
    {
        try {
            $data = User::where([['role', '=', 2], ['status', '=', 'on']])->get();
            if (count($data) > 0) {
                return $this->SuksesWithData($data);
            } else {
                return $this->SuksesEmpty();
            }
        } catch (\Exception $e) {
            return $this->ErrorServer($e->getMessage());
        }
    }

    public function getProductJasa($id)
    {
        try {
            $data = Product::where('idUser', $id)->get()->toArray();
            if (count($data) > 0) {
                return $this->SuksesWithData($data);
            } else {
                return $this->SuksesEmpty();
            }
        } catch (\Exception $e) {
            return $this->ErrorServer($e->getMessage());
        }
    }

    public function userOrder(request $request)
    {
        try {
            // $req = $request->All();
            $product = $this->getProductById($request->product_id);

            $dataOrder = [
                'order_id' => $this->getTrns(),
                'customer_id' => $request->customer_id,
                'product_id' => strval($product->id),
                'namaMobil' => $product->namaMobil,
                'plat' => $product->plat,
                'harga' => $product->harga,
                'img' => $product->img,
                'status' => 1
            ];
            // return $dataOrder;

            $input = Order::create($dataOrder);
            if ($input) {
                return $this->Sukses();
            } else {
                return $this->GagalWithMsg('Pemesanan gagal !');
            }
        } catch (\Exception $e) {
            return $this->ErrorServer($e->getMessage());
        }
    }

    public function getMyOrder($id)
    {
        try {
            $myOrder = Order::join('products as p', 'orders.product_id', '=', 'p.id')
                ->join('users as jasa', 'p.idUser', '=', 'jasa.id')
                ->select(
                    'jasa.id as idJasa',
                    'jasa.fullname as namaJasa',
                    'jasa.address as alamatjasa',
                    'jasa.phone as phoneJasa',
                    'orders.id',
                    'orders.order_id',
                    'orders.product_id',
                    'orders.customer_id',
                    'orders.namaMobil',
                    'orders.plat',
                    'orders.harga',
                    'orders.img',
                    'orders.created_at as tgl_order',
                    'orders.status'
                )->Where([
                    ['orders.customer_id', '=', $id],
                    ['orders.status', '<>', 3]
                ])
                ->get()->toArray();
            if (count($myOrder) > 0) {
                return $this->SuksesWithData($myOrder);
            } else {
                return $this->SuksesEmpty();
            }
        } catch (\Exception $e) {
            return $this->ErrorServer($e->getMessage());
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            $req = $request->All();
            $data = json_decode($req['data']);
            $img = $this->getImgName($request->file('img'));

            $newData = [
                'fullname' => $data->fullname,
                'email' => $data->email,
                'phone' => $data->phone,
                'address' => $data->address
            ];
            if ($img['exist']) {
                $newData['profilephoto'] = $img['img_name'];
                $img['img_file']->move('statics/img', $img['img_name']);
            }

            $update = User::where('id', $data->id)->update($newData);
            if ($update) {
                $profile = User::where('id', $data->id)->first();
                return $this->SuksesWithData($profile);
            } else {
                return $this->GagalWithMsg("Gagal update profile");
            }
        } catch (\Exception $e) {
            $this->ErrorServer($e->getMessage());
        }
    }
}
