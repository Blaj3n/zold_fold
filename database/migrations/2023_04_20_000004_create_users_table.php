<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique();
            $table->foreignId('osztaly_id')->references('osztaly_id')->on('bejegyzeseks');
            $table->timestamps();
        });

        User::create(['name' => 'Steve Jobs', 'password' => Hash::make('123456'), 'email' => 'minta1@gmail.com', 'osztaly_id' => 1]);
        User::create(['name' => 'Albert Einstein', 'password' => Hash::make('123456'), 'email' => 'minta2@gmail.com', 'osztaly_id' => 1]);
        User::create(['name' => 'Bill Gates', 'password' => Hash::make('123456'), 'email' => 'minta3@gmail.com', 'osztaly_id' => 2]);
        User::create(['name' => 'Mark Zuckerberg', 'password' => Hash::make('123456'), 'email' => 'minta4@gmail.com', 'osztaly_id' => 3]);
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
