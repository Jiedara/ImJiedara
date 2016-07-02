<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Dimsav\Translatable\Translatable;
use App\PageTranslation;
use App\Page;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::active()->whereTranslation('slug', $slug)->first();
        
        //dd($page->title);
        return view('index', compact('page'));
        //$page = Page::active()->where('slug', $slug)->firstOrFail();
        //dd($page->translate('en')->title);
        //return $page;
    }
}
