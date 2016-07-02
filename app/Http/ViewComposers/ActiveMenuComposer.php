<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ActiveMenuComposer{
    
    protected $request;
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    public function compose(View $view) {
        $routeAction = $this->request->route()->getAction();
        $vc_active_menu = null;
        
        if($this->request->route()->slug){
            
            $vc_active_menu = $this->request->route()->slug;
            
        }elseif(isset($routeAction['as'])){
            
            $row_as = explode('.',$routeAction['as']);
            if(is_array($row_as)){
                $vc_active_menu = $row_as[0];
            }
            
        }
        $view->with('vc_active_menu', $vc_active_menu);
        
    }
    
}