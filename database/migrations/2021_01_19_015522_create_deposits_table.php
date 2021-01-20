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
            $table->string('challan_amount',50);
            $table->string('release_amount',50);
            $table->string('release_date',50);
            $table->string('balance',100);
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
