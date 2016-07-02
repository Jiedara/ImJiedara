<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Dimsav\Translatable\Translatable;
use App\Page;
use App\PageTranslation;
use App;
use Config;
use Session;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::get();
        return view('admin/pages/pages', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pages/page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->slug = Str::slug($request->slug);
        $this->validate($request, Page::$validateRules);
        
        $page = Page::create($request->all());
        $page->saveTranslation($request);

        Session::flash('success', 'La page a bien été enregistrée');
        
        return redirect(action('Admin\PageController@index',$page));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id); 
        $translation = $page->translate(App::getLocale());
        return view('admin/pages/page', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        
        //Page::$validateRules['slug'] = 'required|unique_with:page_translations,locale,'.$id;
        
        $page->initUniqueSlug();
        $this->validate($request, Page::$validateRules);
        
        $page->update($request->all());
        $page->saveTranslation($request);
        
        /*
        foreach($page->translatedAttributes as $attribute){
            if($request->{$attribute} != null)
                $page->translateOrNew(App::getLocale())->{$attribute} = $request->{$attribute};
        }
        $page->save();
        */
        
        Session::flash('success', 'La page a bien été enregistrée');
        
        return redirect(action('Admin\PageController@index',$page));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $page = Page::findOrFail($id); 
        $page->delete($request->all());
        $deletedTranslations = PageTranslation::where('page_id', $id)->delete();
        
        Session::flash('success', 'La page a bien été supprimée');
        
        return redirect(action('Admin\PageController@index'));
    }
}
