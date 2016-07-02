<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Page;
use App;

class PagesViewComposer{

    public function compose(View $view) {
        $pages = Page::active()->translatedIn(App::getLocale())->get();
        $view->with('vc_pages', $pages);
    }
    
}