<?php

namespace App\Http\Controllers\Api\JasaRental;

use App\Http\Controllers\Controller;
use App\Http\Utils\QueryOrder;
use App\Http\Utils\QueryProduct;
use App\Http\Utils\ResponseController;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class AdminRentalController extends Controller
{
    use ResponseController;
    use QueryProduct;
    use QueryOrder;

    public function getProduct($owner_id)
    {
        try {
            $data = Product::Where('idUser', $owner_id)->get();
            if (count($data) > 0) {
                return $this->SuksesWithData($data);
            } else {
                return $this->SuksesEmpty();
            }
        } catch (\Exception $e) {
            return $this->ErrorServer($e->getMessage());
        }
    }

    public function addProduct(request $request)
    {
        try {
            $req = $request->All();
            $data = json_decode($req['data']);
            $img = $this->getImgName($request->file('img'));

            $newData = [
                'idUser' => $data->idUser,
                'namaMobil' => $data->namaMobil,
                'plat' => $data->plat,
                'harga' => $data->harga,
                'img' => $img['img_name']
            ];
            $data = Product::create($newData);
            if ($data) {
                if ($img['exist']) {
                    $img['img_file']->move('statics/img', $img['img_name']);
                }
                return $this->Sukses();
            } else {
                return $this->Gagal();
            }
        } catch (\Exception $e) {
            return $this->ErrorServer($e->getMessage());
        }
    }

    public function updateProduct(request $request)
    {
        try {

            $req = $request->All();
            $data = json_decode($req['data']);
            $img = $this->getImgName($request->file('img'));

            $newData = [
                'namaMobil' => $data->namaMobil,
                'plat' => $data->plat,
                'harga' => $data->harga,
                'updated_at' => now()
            ];

            if ($img['exist']) {
                $newData['img'] = $img['img_name'];
                $img['img_file']->move('statics/img', $img['img_name']);
            }

            $save = Product::where('id', $data->id)->update($newData);
            if ($save) {
                return $this->Sukses();
            } else {
                return $this->Gagal();
            }
        } catch (\Exception $e) {
            return $this->ErrorServer($e->getMessage());
        }
    }

    public function deleteProduct($product_id)
    {
        try {
            $delete = Product::where('id', $product_id)->delete($product_id);
            if ($delete) {
                return $this->Sukses();
            } else {
                return $this->Gagal();
            }
        } catch (\Exception $e) {
            return $this->ErrorServer($e->getMessage());
        }
    }

    public function orderByJasa($id)
    {
        try {
            $data = Order::join('users as c', 'orders.customer_id', '=', 'c.id')
                ->join('products as p', 'orders.product_id', '=', 'p.id')
                ->join('users as owner', 'p.idUser', '=', 'owner.id')
                ->select(
                    'orders.id',
                    'orders.order_id',
                    'orders.namaMobil',
                    'orders.harga',
                    'orders.plat',
                    'orders.img as imgMobil',
                    'orders.status',
                    'c.fullname as namaPelanggan',
                    'c.address as alamatPelanggan',
                    'c.phone as phonePelanggan',
                    'c.profilephoto as imgPelanggan'
                )
                ->where([
                    ['p.idUser', '=', $id],
                    ['orders.status', '<>', 3]
                ])
                ->get()->toArray();

            if (count($data) > 0) {
                return $this->SuksesWithData($data);
            } else {
                return $this->SuksesEmpty();
            }
        } catch (\Exception $e) {
            return $this->ErrorServer($e->getMessage());
        }
    }

    public function changeStatus($id, $key)
    {
        try {
            $change = Order::where('id', $id)->update(['status' => $key]);
            if ($change) {
                return $this->Sukses();
            } else {
                return $this->Gagal();
            }
        } catch (\Exception $e) {
            return $this->ErrorServer($e->getMessage());
        }
    }
}
