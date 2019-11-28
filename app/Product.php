<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Cart;
use Session;
use Image;

class Product extends Model
{
    static public function getProducts($url){
        // $data['content'] = Product::where('url','=', $url)->get()->toArray();

        $pagi_jump = 3;
        $is_pagi = false;

        $products =  DB::table('products AS p') 
            -> join('categories AS c', 'c.id', '=', 'p.categorie_id')
            ->select('p.*','c.url','c.title')
            ->where('c.url', '=', $url);
            // dd($products);
            if($products->count() > $pagi_jump)
            {
                $data['products'] = $products->paginate($pagi_jump);
                $data['pagi_jump'] = true;
                return $data;
            }
            else
            {
             $data['products'] = $products->get()->toArray();
             $data['pagi_jump'] = $is_pagi;
             return $data;
            }

    }

    static public function getItem($purl){
         if  ($item = Product::where('purl', '=', $purl)->first()){

            $data['product'] = $item->toArray();
            return $data;
        }
        else
        {

            abort(404);
        }
    }
    // END getItem


    static public function addToCart($pid)
    {
        // dd($product->toArray());
        if(!empty($pid) && is_numeric($pid))
        {
            if($product = Product::find($pid) )
            {
                $product = $product->toArray();
                // dd('here');
                if(!Cart::get($pid))
                {
                    Cart::add($pid, $product['ptitle'], $product['price'], 1, []);
                    Session::flash('success_message',$product['ptitle'].' added to cart!');
                }
                else
                {
                    Session::flash('error_message',$product['ptitle'].' is already in the cart!');
                }
            }
        }
    }//END addToCart



    static public function updateCart($request)
    {
        if( !empty($request['pid']) && is_numeric($request['pid']) )
        {
            if( !empty($request['op']))
            {
                if( $product = Cart::get($request['pid']))
                {
                    $product = $product->toArray();

                    if($request['op'] == 'plus')
                    {
                        Cart::update($request['pid'], ['quantity' => 1]);
                        Session::flash('success_message','you updated the cart amount of products!');
                    }
                    elseif($request['op'] == 'minus')
                    {
                        Cart::update($request['pid'], ['quantity' => -1]);
                        Session::flash('error_message','you updated the cart amount of products!');
                    }
                
                }
            }

        }

        }

        


                                                             //***** Start Of CMS CRUD *****//



    
   static public function save_new($request)
   {

    $image_name = 'default_car_image.PNG';

    if( $request->hasFile('image') && $request->file('image')->isValid() )
    {
        $file = $request->file('image');

        $image_name = date('Y.m.d.H.i.s') . '-' . $file->getClientOriginalName();
        $request->file('image')->move(public_path(). '/images/' , $image_name);
        // שינוי גודל התמונה בעזרת פאקאג.

        $img = Image::make(public_path(). '/images/' . $image_name);
        $img->resize(200, null, function($constraint){
            $constraint->aspectratio();
        });
        $img->save();

    }



    $product = new Self();
    $product->categorie_id = $request['categorie_id'];
    $product->ptitle = $request['ptitle'];
    $product->purl = $request['purl'];
    $product->price = $request['price'];
    $product->article = $request['article'];
    $product->pimage = $image_name;

    $product->save();


    Session::flash('success_message',$request['ptitle'].' has been added!') ;
   }



   static public function update_product($request , $id)
   {

    $product = Self::find($id);
    $product->categorie_id = $request['categorie_id'];
    $product->ptitle = $request['ptitle'];
    $product->article = $request['article'];
    $product->purl = $request['purl'];
    $product->price = $request['price'];
    

    // $image_name =  'default_car_image.PNG'; 
    $file_exists = file_exists( public_path() . '/images/' . $product->image);

     if( ($file_exists || $request['image'] == null) && $request->hasFile('image') && $request->file('image')->isValid() )
     {
         $file = $request->file('image');

         
        //move image to images folder
         $image_name = date('Y.m.d.H.i.s') . '-' . $file->getClientOriginalName();
         $request->file('image')->move(public_path() . '/images/' , $image_name);


        //removes the older picture.
        if($product->image != "default_car_image.png" && $file_exists)
        {
            // dd($product->pimage);
            unlink(public_path() . '/images/' . $product->pimage);
        }

         // שינוי גודל התמונה הקיימת במידה וקיימת בעזרת פאקאג.
         $img = Image::make(public_path() . '/images/' . $image_name);
         $img->resize(200, null, function($constraint){
             $constraint->aspectRatio();
         });
         $img->save();


         $product->pimage = $image_name;
     }
      
           $product->save();


          Session::flash('success_message',$request['ptitle'].' has been added!') ;
   }


    static public function  delete_product($id)
    {
        $product = Self::find($id)->toArray();
        $image = public_path() . '/images/' . $product['pimage'];
        if(!empty($product['pimage']))
        {
            unlink($image);
        }

        Self::destroy($id);
    }

                                                            //********* End Of CMS CRUD ******//





}