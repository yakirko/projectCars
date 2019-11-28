<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Cart;
use Session;
use App\Categorie;
use App\Product;
use App\Order;

class ShopController extends Controller
{
    static public function categories()
    {
        $data['content'] = Categorie::all()->toArray();
        //dd($data['content'] );
        return view('content.categories',$data);
    }

    static public function products($url)
    {

        $data['content'] = Product::getProducts($url);    
        // dd($data['content'] );
        return view('content.products',$data);
    }

    static public function item($curl, $purl)
    {
        //get item from DB
        $data = Product::getItem($purl);

        //
        $data['purl'] = $purl;
        $data['curl'] = $curl;

        //this is for the page title
        $data['content']['title'] = $data['product']['ptitle'];

        // dd($data);
        return view('content.item', $data);
    }

    public function addToCart(Request $request)
    {
      
        // Session::flash('success_message','this item has been added to cart!!');
        // dd(Cart::isEmpty());
        // dd($request->toArray());
        Product::addToCart($request['pid']);
    }

    static public function oils()
    {
        $data['content'] = Categorie::all()->toArray();
        //dd($data['content'] );
        return view('content.categories',$data);
    }

    static public function tiers()
    {
        $data['content'] = Categorie::all()->toArray();
        //dd($data['content'] );
        return view('content.categories',$data);
    }

    static public function tools()
    {
        $data['content'] = Categorie::all()->toArray();
        //dd($data['content'] );
        return view('content.categories',$data);
    }



    /*** END OF SHOP PAGES ***/



    /*** START OF CHECKOUT ***/

    public function checkout()
    {
        $cart = Cart::getContent()->toArray();
        sort($cart);
        $data['title'] = "Shop Checkout";
        $data['cart'] = $cart;
        // dd($cart);
        return view('content.checkout' , $data);
    }



    public function updateCart(Request $request)
    {
        // dd($request->toArray());
        Product::updateCart($request);        
        return redirect('shop/checkout');
    }


    public function removeItem(Request $request)
    {
        if(Cart::get($request['pid']))
        {
            Cart::remove($request['pid']);
            Session::flash('success_message','you removed this item from cart!');
        }
        return redirect('shop/checkout');
    }

    public function clearCart()
    {
            Cart::clear();
            return redirect('shop/checkout');       
    }

    public function orderNow()
    {
            if(Cart::isempty())
            {
                return redirect('shop/checkout');  
            }
            else
            {
                if(!Session::has('user_id'))
                {
                    $checkout_redirect = '?rd=shop/checkout';
                    return redirect('user/signin'.$checkout_redirect);
                }
                else
                {
                    Order::save_new();
                    return redirect('shop/categories'); 
                }
            }
    }

    /*** END CHECKOUT ***/

}
