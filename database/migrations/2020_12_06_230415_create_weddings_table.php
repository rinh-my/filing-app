<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeddingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weddings', function (Blueprint $table) {
            // 符号なしBIGINT(整数型扱える範囲：最大数)
            $table->bigIncrements('id');
            $table->date('date');
            // TUNYINT(最小数)
            $table->tinyInteger('period_type');
            // 真偽値カラム
            $table->boolean('is_undecided');
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
        Schema::dropIfExists('weddings');
    }
}
