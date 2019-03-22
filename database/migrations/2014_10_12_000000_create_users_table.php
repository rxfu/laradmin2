<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username', 50)->comment('用户名');
            $table->string('password', 255)->comment('密码');
            $table->string('name')->comment('姓名');
            $table->string('email')->unique()->nullable()->comment('电子邮箱');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_enable')->default(true)->comment('是否启用，0-禁用，1-启用');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
