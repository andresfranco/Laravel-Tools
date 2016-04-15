<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    public function categoryname($category)
    {
      return view('category.categoryname',['name'=>$category]);
    }
}
