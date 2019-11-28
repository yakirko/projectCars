<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use App\Categorie;

use App\Http\Requests\ProductsRequest;
use App\Http\Requests\ProductsEditRequest;

use Illuminate\Http\Request;

class Cms_products_controller extends Controller
{
    
    public function index()
    {
        // $data['products'] = Product::all()->toArray();
        $query = 'SELECT c.title AS c_title, p.*
        FROM categories AS c, products AS p
        WHERE c.id = p.categorie_id
        ORDER BY c.title ASC';
        $data['products'] = DB::select($query);

        return view('cms.products', $data);
    }




   

    // ************add a new product  
    public function create()   //show the blade
    {
        $data['categories'] = Categorie::all()->toArray();
        return view('cms.add_product', $data);
    }

   
    public function store(ProductsRequest $request)  //in the page - send the form to update 
    {
        // dd($request->toArray());                //לא מגיע לכאן.
        Product::save_new($request);
        return redirect('cms/products');
    }

    



// ************update  products
    public function edit($id)
    {
        $data['products'] = Product::find($id)->toArray();
        $data['categories'] = Categorie::all()->toArray();
        // dd($data['products']);
        return view('cms.edit_product', $data);

    }

    
    public function update(ProductsEditRequest $request, $id)   // ************edit in cms
    {
        Product::update_product($request , $id);
        return redirect('cms/products');
    }





// ************delete  products
    public function show($id)
    {
        $data['products'] = Product::find($id);
        return view('cms.delete_product', $data);
    }

    
    public function destroy($id)
    {
        Product::delete_product($id);
        return redirect('cms/products');
    }

}
