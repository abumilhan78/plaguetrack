<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCase2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case2s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained('countries')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('sembuh')->default(0);
            $table->integer('meninggal')->default(0);
            $table->integer('positif')->default(0);
            $table->integer('reaktif')->default(0);
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
        Schema::dropIfExists('case2s');
    }
}
