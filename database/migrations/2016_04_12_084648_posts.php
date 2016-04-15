<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Posts
 *
 * @author  The scaffold-interface created at 2016-04-12 08:46:49pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('posts',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('title');
        
        $table->longText('content');
        
        /**
         * Foreignkeys section
         */
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('posts');
     }
}
