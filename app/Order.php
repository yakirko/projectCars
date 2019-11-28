<?php

namespace App;

use Cart, Session,  DB;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    static public function save_new()
    {
    
        $order = new Order();
        $order->user_id = Session::get('user_id');
        $order->data = serialize(Cart::getContent()->toArray());
        $order->total = Cart::getTotal();
        $order->save();

        Cart::clear();
        Session::flash('success_message','Your order has been successfully processed!');
    }


    static public function orders($id)
    {
        // // dd($id);
        // $data['orders'] = Order::all()->toArray();
        // $data['data'] = unserialize( $data['data']);
        // return $data['orders'];

    }
}
