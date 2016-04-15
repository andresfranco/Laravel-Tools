<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 */
class Article extends Model
{
    protected $table = 'articles';

    public $timestamps = true;

    protected $fillable = [
        'name','description'
    ];

    protected $guarded = [];

    public static $rules = array(
    'name' => 'required|min:5',
    'description'=>'required|min:5'
  );

        
}