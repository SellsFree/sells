<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('cat_slug')->nullable();
            $table->string('divi_slug')->nullable();
            $table->string('dist_slug')->nullable();
            $table->string('zone_slug')->nullable();
            $table->string('adtype')->nullable();
            $table->string('title');
            $table->string('pricetype')->nullable();
            $table->string('condition');
            $table->string('authenticity');
            $table->text('description');
            $table->string('image');
            $table->string('gimage')->nullable();
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('status')->nullable();
            $table->string('boss')->nullable();
            $table->string('feature')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
