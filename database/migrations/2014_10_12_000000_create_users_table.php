<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('email')->unique();
            $table->date('dob')->nullable(true);
            $table->bigInteger('contact')->nullable();
            $table->string('alt_contact')->nullable();
            $table->string('address')->nullable();
            $table->string('profile_pic')->nullable();
            $table->bigInteger('role_as')->comment('1 = Admin, 2 = HR, 3 = Team Leader, 4 = Users, 5 = Intern');
            $table->string('credits')->default(12);
            $table->bigInteger('salary')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
};
