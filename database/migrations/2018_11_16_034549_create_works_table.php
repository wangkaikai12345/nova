<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->comment('作品组id');
            $table->string('title',255)->comment('作品标题');
            $table->string('author',255)->comment('作品作者');
            $table->string('cover',255)->comment('作品封面');
            $table->text('introduction')->comment('作品简介');
            $table->text('content')->comment('作品内容');
            $table->integer('views')->comment('浏览量');
            $table->integer('votes')->comment('投票数');
            $table->dateTime('end_time')->nullable()->comment('截止日期');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
