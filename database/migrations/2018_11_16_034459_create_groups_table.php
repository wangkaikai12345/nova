<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255)->comment('作品组标题');
            $table->string('author', 255)->comment('作品组作者');
            $table->string('cover', 255)->comment('作品组封面');
            $table->integer('views')->default(0)->comment('浏览量');
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
        Schema::dropIfExists('groups');
    }
}
