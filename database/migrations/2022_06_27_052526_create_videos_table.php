<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            // id автора / пользователя
            $table->integer('user_id')->unsigned();
            $table->string('video_file');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('likes')->unsigned()->default(0);
            $table->integer('dislikes')->unsigned()->default(0);
            $table->string('category')->default('Без категории');
            /*
            unrestricted - без ограничений
            violation - нарушение
            shadow_ban - теневой бан
            ban - бан
            */
            $table->string('restrictions')->default('Без ограничений');
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
        Schema::dropIfExists('videos');
    }
}
