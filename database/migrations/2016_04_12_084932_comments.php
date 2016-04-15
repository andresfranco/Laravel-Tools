<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Comments
 *
 * @author  The scaffold-interface created at 2016-04-12 08:49:32pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('comments',function (Blueprint $table){

        $table->increments('id');
        
        $table->date('post_date');
        
        $table->longText('comment');
        
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
        Schema::drop('comments');
     }
}
