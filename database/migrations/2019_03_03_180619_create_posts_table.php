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
						$table->string('title');
						$table->string('slug');
						$table->text('content');
						$table->unsignedBigInteger('category_id')->nullable();
						$table->unsignedBigInteger('user_id')->nullable();
						$table->integer('status')->default(0);
						$table->integer('views')->default(0);
						$table->integer('is_featured')->default(0);
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
