<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::disableForeignKeyConstraints();
         Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name", 120);
            $table->string("email", 50)->nullable();
            $table->string("mobile", 50)->nullable();
            $table->integer("age");
            $table->enum("gender", ["male", "female", "others"]);
            $table->text("address_info");
            $table->unsignedBigInteger('auteur_id');
            $table->foreign('auteur_id')
            ->references('id')
            ->on('auteurs')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent();
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
