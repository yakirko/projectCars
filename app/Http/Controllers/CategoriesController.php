<?php

namespace App\Http\Controllers;

use App\Categorie;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryEditRequest;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    
    public function index()
    {
        $data['categories'] = Categorie::all()->toArray();
        return view('cms.categories', $data);
    }




   

    // ************add a new categorie  
    public function create()   //show the blade
    {
        return view('cms.add_category');
    }

   
    public function store(CategoryRequest $request)  //in the page - send the form to update 
    {
        Categorie::save_new($request);
        return redirect('cms/categories');
    }

    



// ************update  categorie
    public function edit($id)
    {
        $data['categories'] = Categorie::find($id)->toArray();
        return view('cms.edit_category', $data);

    }

    
    public function update(CategoryEditRequest $request, $id)   // ************edit in cms
    {
        Categorie::update_category($request , $id);
        return redirect('cms/categories');
    }




    // ************delete  categorie
    public function show($id)
    {
        $data['categories'] = Categorie::find($id);
        return view('cms.delete_category', $data);
    }

    
    public function destroy($id)
    {
        Categorie::delete_Category($id);
        return redirect('cms/categories');
    }


    // public function search($sign)
    // {
    //     $sign = Categorie::find()->first();
    //     return view('cms.categories', $sign); 
    // }
    
}
