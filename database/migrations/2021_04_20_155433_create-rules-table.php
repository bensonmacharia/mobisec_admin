<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('rules', function (Blueprint $table) {
            $table->bigIncrements('rule_id');
            $table->string('rule');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('added_by');
            $table->timestamps();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('rules');
    }

}
