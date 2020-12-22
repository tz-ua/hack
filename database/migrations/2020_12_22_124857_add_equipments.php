<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEquipments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $users = User::all();

        foreach ($users as $key => $user) {
            $tableNumber = 301 + $key;
            $chairNumber = 401 + $key;
            $user->equipment()->createMany([
                [
                    'inventory_number' => "A{$tableNumber}",
                    'type' => 'table'
                ],
                [
                    'inventory_number' => "A{$chairNumber}",
                    'type' => 'chair'
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
        //
    }
}
