<?php

namespace App;

use DB, Cart, Session , Image;

use Illuminate\Database\Eloquent\Model;


class Categorie extends Model
{
    
   static public function save_new($request)
   {

    $image_name =  'default_car_image.PNG'; 

    if( $request->hasFile('image') && $request->file('image')->isValid() )
    {
        $file = $request->file('image');

        $image_name = date('Y.m.d.H.i.s') . '-' . $file->getClientOriginalName();
        $request->file('image') ->move(public_path(). '/images/' , $image_name);
        // שינוי גודל התמונה בעזרת פאקאג.
        $img = Image::make(public_path(). '/images/' . $image_name);
        $img->resize(200, null, function($constraint){
            $constraint->aspectratio();
        });
        $img->save();

    }

    $category = new Categorie();
    $category->title = $request['title'];
    $category->description = $request['description'];
    $category->url = $request['url'];
    $category->image = $image_name;
    $category->save();


     Session::flash('success_message',$request['title'].' has been added!') ;
   }



   static public function update_category($request , $id)
   {

    $category = Categorie::find($id);
    $file_exists = file_exists( public_path() . '/images/' . $category->image);
    // dd(public_path() . '/images/' . $category->image);

    //  dd($request['image']);

    $category->title = $request['title'];
    $category->description = $request['description'];
    $category->url = $request['url'];
    
    dd($$request->hasFile('image'));
    // dd($$request->file('image')->isValid());
    //dd($request->hasFile('image'));
    //  dd(( ($file_exists || $request['image'] ==null) && $request->hasFile('image') && $request->file('image')->isValid() ));
     if( ($file_exists || $request['image'] ==null) && $request->hasFile('image') && $request->file('image')->isValid() )
     {

            
         $file = $request->file('image');
         dd($file);
         
        //move images to images folder
         $image_name = date('Y.m.d.H.i.s') . '-' . $file->getClientOriginalName();
         $request->file('image') ->move(public_path(). '/images/' , $image_name);
            dd($request);

        //remove old picture.
        if( $category->image != "default_car_image.png" && $file_exists)
        {
            unlink(public_path() . '/images/' . $category->image);
        }

         // שינוי גודל התמונה הקיימת במידה וקיימת בעזרת פאקאג.
         $img = Image::make(public_path(). '/images/' , $image_name);
         $img->resize(200, null, function($constraint){
             $constraint->aspectratio();
         });
         $img->save();


         $category->image = $image_name;
     }
      
           $category->save();


          Session::flash('success_message',$request['title'].' has been added!') ;
   }



   static public function  delete_Category($id)
   {
       $category = Self::find($id)->toArray();

       $image_path = public_path() . '/images/' ;

       //delete category image
       if(!empty($category['image']))
       {
           unlink($image_path.$category['image']);
       }

       //delete category row from the DB
       Self::destroy($id);

     $query = "SELECT pimage,id FROM products WHERE categorie_id = {$id}";
     $all_cat_images = DB::select($query);
       

     if (!empty($all_cat_images))
     {
        foreach($all_cat_images as $image)
        {
            unlink($image_path.$image->pimage);
            Product::destroy($image->id);
        }
     }

     Session::flash('success_message','All Sub Categories Have Been Deleted!!') ;

   }

}
