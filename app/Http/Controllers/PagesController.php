<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;
use App\Content;

class PagesController extends Controller
{
    public function home()
    {
        $data['title'] = "Home page";
        return view('content.home',$data);
    }


    public function content($url)
    {
        $data['content'] = Content::getAll($url);
        return view('content.content',$data);
    }

}