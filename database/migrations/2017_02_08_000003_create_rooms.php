<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * version: 1.1
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('rooms')){
            Schema::create('rooms', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('userid');
                $table->string('roomname',25);
                $table->text('roomintro',25);
                $table->integer('category');
                $table->text('rtmpurl');
                $table->string('streamkey',255);
                $table->text('coverurl');
                $table->integer('isindex');
                $table->string('roomkey',255);
                $table->integer('cooperation');
                $table->string('otherroomkey',255);
                $table->string('created_at',255);
                $table->string('updated_at',255);
                $table->integer('guestChat');
            });
        }
        Schema::table('rooms',function ($table){
            $table->integer('openrtmp');
            $table->integer('openhls');
            $table->text('hlsurl');
            $table->integer('rtmpfirst');
        });
        \Illuminate\Support\Facades\DB::table('rooms')->update([
            'openrtmp' => 1,
            'openhls' => 0,
            'hlsurl' => "",
            'rtmpfirst' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms',function ($table){
            if(Schema::hasColumn('rooms','openrtmp'))
                $table->dropColumn('openrtmp');
            if(Schema::hasColumn('rooms','openhls'))
                $table->dropColumn('openhls');
            if(Schema::hasColumn('rooms','hlsurl'))
                $table->dropColumn('hlsurl');
            if(Schema::hasColumn('rooms','rtmpfirst'))
                $table->dropColumn('rtmpfirst');
        });
    }
}
