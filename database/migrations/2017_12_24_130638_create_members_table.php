<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inviter_id');  //邀请人
            $table->string('unionid');
            $table->string('openid');
            $table->string('nickname');
            $table->tinyInteger('subscribe');  //0未关注 1已关注 2已取关
            $table->tinyInteger('sex');  //0未知 1男 2女
            $table->integer('credit1'); //积分
            $table->decimal('credit2'); //余额
            $table->string('headimgurl');
            $table->timestamps();
            $table->unique('unionid', 'openid');
            $table->index(['inviter_id', 'unionid', 'openid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
