<?php

use App\Models\Bejegyzesek;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBejegyzeseksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bejegyzeseks', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tevekenyseg_id")->references('tevekenyseg_id')->on('tevekenysegs');
            $table->foreignId("osztaly_id")->references('osztaly_id')->on('users');
            $table->integer("allapot");
            $table->timestamps();
        });

        Bejegyzesek::create(['tevekenyseg_id' => 1,'osztaly_id' => 1, 'allapot' => "0"]);
        Bejegyzesek::create(['tevekenyseg_id' => 2,'osztaly_id' => 2, 'allapot' => "1"]);
        Bejegyzesek::create(['tevekenyseg_id' => 3,'osztaly_id' => 3, 'allapot' => "1"]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bejegyzeseks');
    }
}
