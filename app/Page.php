<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Config;
use App\PageTranslation;
use App;

class Page extends Model
{
    use \Dimsav\Translatable\Translatable;
    
	protected $table = 'pages';
	protected $guarded = ['id'];
    
    protected $fillable = ['active'];
    public $translatedAttributes = ['title','slug','meta_title','meta_description','content'];
    
    public static $validateRules = [
        'title'=> 'required|max:255',
        'slug'=> 'required|unique_with:page_translations,locale'
    ];
    
    protected $with = ['translations'];
    
    public function scopeActive($query){ //Mot clé "scope" obligatoire
        return $query->where('active', true);        
    }
    
    //Récupère le premier titre connu si il n'existe pas dans la langue affichée
    public function getTitleExist() 
    {
        if($this->title != ''){
            return $this->title;
        }else{
            foreach(Config::get('languages') as $lang => $language){
                $row = json_decode($this->translate($lang), true);
                if($row['title'] != ''){
                    $title = $row['title'].' ('.$lang.')';
                    break;
                }
            }
            return $title;
        }
    }
    
    public function initUniqueSlug(){
        $this->translateOrNew(App::getLocale())->slug = uniqid();
        $this->save();
    }
    
    public function saveTranslation($request){
        foreach($this->translatedAttributes as $attribute){
            if($request->{$attribute} != null)
                $this->translateOrNew(App::getLocale())->{$attribute} = $request->{$attribute};
        }
        $this->save();
    }
    
}
