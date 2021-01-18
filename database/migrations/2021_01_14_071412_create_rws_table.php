<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRwsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rws', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subdist_id')->constrained('subdistricts')->onUpdate('cascade')->onDelete('cascade');
            $table->string('rw_name');
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
        Schema::dropIfExists('rws');
    }
}
