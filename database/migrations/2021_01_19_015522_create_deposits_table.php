<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->string('particulars',150);
            $table->string('department',50);
            $table->string('challan_number',50);
            $table->string('create_date',50);
            $table->integer('challan_amount');
            $table->integer('release_amount')->default(0);
            $table->string('release_date',50)->default("NULL");
            $table->integer('carry')->default(0);
            $table->integer('balance')->default(0);
            $table->unsignedBigInteger('department_id');
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
        Schema::dropIfExists('deposits');
    }
}
