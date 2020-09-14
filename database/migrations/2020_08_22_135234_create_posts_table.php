<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->timestamps();
            $table->string('posttitle');
            $table->unsignedBigInteger('post_type_id');
            $table->foreign('post_type_id')
                ->on('post_types')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->string('coverPhoto')->nullable();
            $table->string('photo1')->nullable();
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
            $table->string('summary');
            $table->text('paragraph1')->nullable();
            $table->text('paragraph2')->nullable();
            $table->string('projectType')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('area')->nullable();
            $table->integer('likeCount')->default(0);
            $table->integer('commentCount')->default(0);
            $table->unsignedBigInteger('payment_scheme_id')->default(1);
            $table->foreign('payment_scheme_id')
                ->on('payment_schemes')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('restrict');
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
