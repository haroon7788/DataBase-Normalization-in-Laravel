<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_user_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_user_id');
            $table->foreign('group_user_id')->references('id')->on('group_users');
            $table->foreignId('group_type_id');
            $table->foreign('group_type_id')->references('id')->on('group_types');
            $table->tinyText('value');
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
        Schema::dropIfExists('group_user_data');
    }
}
