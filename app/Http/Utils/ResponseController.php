<?php

namespace App\Http\Utils;

use App\Order;
use App\Product;
use Illuminate\Support\Str;

trait ResponseController
{
  public function SuksesWithData($result)
  {
    return response()
      ->json([
        "status" => true,
        "msg" => "Berhasil memuat permintaan !",
        "result" => $result
      ]);
  }

  public function SuksesEmpty()
  {
    return response()
      ->json([
        "status" => true,
        "msg" => "Tidak ada data !",
        "result" => []
      ]);
  }

  public function Sukses()
  {
    return response()
      ->json([
        "status" => true,
        "msg" => "Berhasil memuat permintaan !"
      ]);
  }

  public function Gagal()
  {
    return response()
      ->json([
        "status" => false,
        "msg" => "Gagal memuat permintaan !"
      ]);
  }

  public function GagalWithMsg($msg)
  {
    return response()
      ->json([
        "status" => false,
        "msg" => $msg
      ]);
  }

  public function No_Data()
  {
    return response()
      ->json([
        "status" => true,
        "msg" => 'Tidak ada data !'
      ]);
  }

  public function ErrorServer($log)
  {
    return response()
      ->json([
        "status" => false,
        "msg" => 'Terjadi keslahan pada server !',
        "log" => $log
      ]);
  }

  public function getImgName($file)
  {
    $img = [];
    if ($file !== null) {
      $img['img_name'] = Str::random(16) . round(microtime(true)) . '.' . $file->guessExtension();
      $img['img_file'] = $file;
      $img['exist'] = true;
    } else {
      $img['img_name'] = null;
      $img['img_file'] = null;
      $img['exist'] = false;
    }
    return $img;
  }

  public function getTrns()
  {
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return 'TRX-' . substr(str_shuffle(str_repeat($pool, 5)), 0, 14) . date("Y-m-d");
  }
}

trait QueryProduct
{
  public function getProductById($id)
  {
    try {
      $data = Product::where('id', $id)->first();
      if ($data) {
        return $data;
      }
    } catch (\Exception $e) {
      return $this->ErrorServer($e->getMessage());
    }
  }
}

trait QueryOrder
{
  public function getOrderJasa($id, $status)
  {
    try {
      $data = Order::join('users as c', 'orders.customer_id', '=', 'c.id')
        ->join('products as p', 'orders.product_id', '=', 'p.id')
        ->join('users as owner', 'p.idUser', '=', 'owner.id')
        ->select(
          '*',
          'p.plat as platMobil'
        )
        ->where([
          ['p.idUser', '=', $id],
          ['orders.status', '=', $status]
        ])
        ->get()->toArray();

      if ($data) {
        return $data;
      }
    } catch (\Exception $e) {
      return $this->ErrorServer($e->getMessage());
    }
  }
}
