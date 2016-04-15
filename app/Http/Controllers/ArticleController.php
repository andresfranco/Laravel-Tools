<?php
namespace App\Http\Controllers;
use Input;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Response;
use App\Models\Article;
use Redirect;

class ArticleController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()

  {
     
        $query = DB::table('articles'); 
        $filter = \DataFilter::source($query);
        $filter->add('name','Name', 'text');
        $filter->add('description','Description', 'text');
        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();
      
        $grid = \DataGrid::source($filter);
        $grid->attributes(array("class"=>"table table-striped"));
        $grid->add('name','Name',true);
        $grid->add('description','Description',true);
        $grid->add('{{ link_to_route("articles.edit","Editar",["id"=>$id] ,array("class" => "btn btn-default"))}}','');
        $grid->add('{!! Form::open([
            "method" => "DELETE",
            "route" => ["articles.destroy",$id]
        ]) !!}
            {!! Form::submit("Delete", ["class" => "btn btn-danger"]) !!}
        {!! Form::close() !!}','');
        $grid->link('/articles/create',"New Article", "TR");
        $grid->orderBy('id','desc');
        $grid->paginate(2);

        return  view('article.index', compact('filter','grid'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
     return view('article.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
 public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Article::$rules);

        if ($validation->passes())
        {
            Article::create($input);

            return Redirect::route('articles.index');
        }

        return Redirect::route('articles.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
       
     $articles = Article::find($id);
      if (is_null($articles))
        {
            return Redirect::route('articles.index');
        }
    return view('article.edit',['articles'=>$articles]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
   $input = Input::all();
        $validation = Validator::make($input, Article::$rules);
        if ($validation->passes())
        {
            $articles = Article::find($id);
            $articles ->update($input);
            return Redirect::route('articles.index');
        }
return Redirect::route('articles.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    Article::find($id)->delete();
    return Redirect::route('articles.index');
  }
}
