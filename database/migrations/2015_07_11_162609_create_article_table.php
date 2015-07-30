<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('articles', function($table) {
            $table->bigIncrements('id');
            $table->string('heading');
            $table->string('sub_heading');
            $table->text('body');
            $table->string('author');
            $table->string('slug')->unique();
            $table->boolean('importance')->default(0);
            $table->boolean('is_visible')->default(1);
            $table->string('source_url');
            $table->string('image_url');
            $table->string('type');
            $table->bigInteger('rating')->unsigned()->default(0);
            $table->dateTime('published_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('article');
    }

}
