<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('inventory_number')->unique();
            $table->string('type');
            $table->integer('equipmentable_id');
            $table->string('equipmentable_type');
            $table->timestamps();
        });

        $users = User::all();

        foreach ($users as $key => $user) {
            $laptopNumber = 101 + $key;
            $monitorNumber = 201 + $key;
            $user->equipment()->createMany([
                [
                    'inventory_number' => "A{$laptopNumber}",
                    'type' => 'laptop'
                ],
                [
                    'inventory_number' => "A{$monitorNumber}",
                    'type' => 'monitor'
                ],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipments');
    }
}
