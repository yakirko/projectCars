<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;
use App\Categorie;

use Illuminate\Http\Request;

class CmsOrders extends Controller
{

    public function index()
    {
        $allOrders['orders'] = Order::all()->toArray();
        // dd($allOrders);
        $test = [];
        foreach($allOrders['orders'] as $key=>$value){
            $allOrders[$key] = unserialize($value['data']);
        }
        // dd($allOrders);
        // dd($test);
        // $data['orders'] = unserialize($data['data']);
        
        return view('cms.orders')
            ->with('allOrders', $allOrders['orders'])  
            ->with('test', $test);  
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
