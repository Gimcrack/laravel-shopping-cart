<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartVariantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_variant', function (Blueprint $table) {
            $table->unsignedInteger('cart_id')->index();
            $table->unsignedInteger('variant_id')->nullable();
            $table->unsignedInteger('quantity');

            $table->unique(['cart_id', 'variant_id']);
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
        Schema::dropIfExists('cart_variant');
    }
}
