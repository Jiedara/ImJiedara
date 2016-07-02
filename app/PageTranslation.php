<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','slug','meta_title','meta_description','content'];
}
