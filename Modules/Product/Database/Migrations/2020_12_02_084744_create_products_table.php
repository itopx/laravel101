<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
//            $table->engine = 'MyISAM';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->longText('detail')->nullable();
            $table->string('url')->nullable();
            $table->string('target')->nullable();
            $table->float('price')->nullable();
            $table->float('sale_price')->nullable();
            $table->integer('status')->default(0);
            $table->integer('qty')->default(0);
            $table->integer('view')->default(50);
            $table->string('cover')->nullable();
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
        Schema::dropIfExists('products');
    }
}
