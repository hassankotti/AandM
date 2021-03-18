<?php

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->double('balance')->default(0.0);
            $table->double('user_role')->default(2);
            $table->string('img_path')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
<<<<<<< HEAD

=======
>>>>>>> 39edd6c54febd6103dd1da7d7f0b6276f1be85be
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
