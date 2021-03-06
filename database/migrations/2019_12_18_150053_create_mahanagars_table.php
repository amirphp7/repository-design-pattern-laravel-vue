<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahanagarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahanagars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('image')->nullable();
            $table->unsignedTinyInteger('area')->nullable();
            $table->unsignedSmallInteger('sort_id')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedSmallInteger('created_by')->nullable();
            $table->unsignedSmallInteger('updated_by')->nullable();
            $table->unsignedSmallInteger('deleted_by')->nullable();
            $table->string('created_ip',20)->nullable();
            $table->string('updated_ip',20)->nullable();
            $table->string('deleted_ip',20)->nullable();
            $table->unsignedTinyInteger('row_status')->nullable()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahanagars');
    }
}
