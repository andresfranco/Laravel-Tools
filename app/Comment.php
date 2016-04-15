<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CommentController
 *
 * @author  The scaffold-interface created at 2016-04-12 08:49:32pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Comment extends Model
{

    public $timestamps = false;

    protected $table = 'comments';

	
}
