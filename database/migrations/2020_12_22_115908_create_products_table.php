<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category_id');
            $table->string('img_path')->nullable();
            $table->string('details')->nullable();
            $table->integer('price');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('products');
    }
}
