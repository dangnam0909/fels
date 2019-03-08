<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable()->change();
            $table->string('avatar')->default('default.jpg')->change();
            $table->date('date_of_birthday')->nullable()->change();
            $table->string('provider_user_id')->nullable()->change();
            $table->string('provider')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('gender')->change();
            $table->text('avatar')->change();
            $table->date('date_of_birthday')->change();
            $table->text('provider_user_id')->change();
            $table->text('provider')->change();
        });
    }
}
