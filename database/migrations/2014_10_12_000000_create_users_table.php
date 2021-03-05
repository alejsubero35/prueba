<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email', 191)->unique();
            $table->string('password');
            $table->string('telephone');
            $table->string('nationality');
            $table->string('identity_document');
            $table->string('civil_status');
            $table->string('home_address');
            $table->integer('role_id');
            $table->integer('country_id');
            $table->integer('user_creator_id');
            $table->integer('user_deleted_id');
            $table->integer('user_updated_id');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
