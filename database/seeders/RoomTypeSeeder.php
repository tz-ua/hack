<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Game room',
            'Сonference room',
            'Sport training room'
        ];

        foreach ($types as $type) {
            RoomType::firstOrCreate([
                'name' => $type
            ]);
        }
    }
}
