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
        Schema::create('products', function (Blueprint $table) {
            $table->id('pid');
            $table->string('ptitle',60);
            $table->string('pdes',250);
            $table->string('pimg');
            $table->float('pprice');
            $table->unsignedBigInteger('catid');
            $table->foreign('catid')->references('catid')->on('product_categs');
            
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
};
?>
