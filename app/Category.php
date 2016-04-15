<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use dogears\CrudDscaffold\Traits\GetAllDataTrait;
use dogears\CrudDscaffold\Traits\RelationManagerTrait;

class Category extends Model
{
    use RelationManagerTrait,GetAllDataTrait;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    } 

	//Mass Assignment
	protected $fillable = ['name'];
}