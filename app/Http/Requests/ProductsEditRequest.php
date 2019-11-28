<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductsEditRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        return [
            'categorie_id' => 'required',
            'ptitle' => 'required|min:2|max:100',
            'article' => 'required|min:2',
            'purl' => 'required|min:2|max:100|regex:/^[a-z\d-]+$/',
            'price' => 'required|min:2|max:10',
        ];
    }
}