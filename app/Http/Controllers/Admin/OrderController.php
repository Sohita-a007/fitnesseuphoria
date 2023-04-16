<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function order()
    {
        $order = Orders::all();
        $data = [];
        foreach ($order as $key => $value) {
            $data_product = $value->product;

            $array = json_decode($data_product, true);

            foreach ($array as $key => $array_value) {
                // dd($array_value['product_name']);
                $data[] = $array_value['product_name'];
            }
        }
        // dd($data);
        return view('admin.order.index', compact('order', 'data'));
    }
}
