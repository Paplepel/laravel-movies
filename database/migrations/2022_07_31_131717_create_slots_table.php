<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->time('time');
            $table->timestamps();
        });

        $data =  array(
            [
                'time' => '10:00:00',
            ],
            [
                'time' => '13:00:00',
            ],
            [
                'time' => '17:00:00',
            ],
            [
                'time' => '20:00:00',
            ],
        );
        foreach ($data as $item){
            $slot = new \App\Models\Slot();
            $slot->time =$item['time'];
            $slot->save();
        }
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slots');
    }
}
