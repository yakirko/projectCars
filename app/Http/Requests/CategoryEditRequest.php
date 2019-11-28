<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoryEditRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        return [
            'title' => 'required|min:2|max:100',
            'url' => 'required|min:2|max:100|regex:/^[a-z\d-]+$/',
            'description' => 'required|min:2',
            'image' => 'image|max:5242880',
        ];
    }
}
