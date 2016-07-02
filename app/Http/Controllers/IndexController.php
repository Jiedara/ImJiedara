<?php
namespace App\Http\Controllers;

use App;
use Auth;
use Config;
use Meta;
use App\Page;
use Session;
use App\Http\Requests;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    
    public function lang()
    {        
        
        if(count(Config::get('languages')) > 1){
            return redirect(App::getLocale());
        }else{
            
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        
        //Meta::meta('title', 'You are at home');
        //Meta::meta('description', 'This is my home. Enjoy!');
        //Meta::meta('image', asset('img/intro03.png'));
        //Meta::meta('robots', 'noindex,nofollow');
        
        //echo App::getLocale();
        
        $pages = Page::active()->translatedIn(App::getLocale())->get();
        
        return view('index', compact('pages'));
    }
}