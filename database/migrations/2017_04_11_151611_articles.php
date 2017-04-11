<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function
        (Blueprint $table) {
            $table->increments('id');
            //count ie increment articles
            $table->string('title');
            $table->longText('body');
            $table->longText('image');
            // ref url not image, server has img dbs not good for large files
            $table->timestamps();
          });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles'); 
    }
}
