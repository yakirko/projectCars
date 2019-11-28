<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    static public function getAll($url)
    {
        //dd("from controller - ".$url);
        $menu = Menu::where('url', '=', $url)->first()->toArray();
        $data['title'] = $menu['title'];
        $data['content'] = Content::where('menu_id', '=', $menu['id'])->get()->toArray();
        return ($data);
    }
}
