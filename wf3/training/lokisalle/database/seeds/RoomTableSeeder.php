<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoomTableSeeder extends Seeder {

    private function randDate()
    {
        return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
    }

    public function run()
    {
        $countries = ['france', 'espagne', 'allemagne'];
        $cities = ['paris', 'madrid', 'berlin'];
        $categories = ['reunion', 'bureau', 'formation'];
        $date = $this->randDate();

        DB::table('rooms')->delete();

        for($i = 1; $i < 10; ++$i)
        {
            $rand = rand(0, 2);
            DB::table('rooms')->insert([
                'title' => 'Titre ' . $i,
                'description' => 'Description ' . $i . ' : Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'country' => $countries[$rand],
                'city' => $cities[$rand],
                'address' => (15 + $i ) . 'avenue des fleurs',
                'postal_code' => '7500' . $i,
                'capacity' => 75 * $i,
                'category' => $categories[$rand],
                'created_at' => $date,
                'updated_at' => $date
            ]);
        }
    }
}