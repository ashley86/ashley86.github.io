<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductTableSeeder extends Seeder {

    private function randDate()
    {
        return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
    }

    public function run()
    {
        $date = $this->randDate();
        $start_date = $this->randDate();
        $end_date = $start_date->addDays(5);

        DB::table('products')->delete();

        for($i = 1; $i < 4; ++$i)
        {
            $rand = rand(0, 1);
            DB::table('products')->insert([
                'room_id' => rand(1,9),
                'arrived_date' => $start_date,
                'left_date' => $end_date,
                'price' => 132.35 * $i,
                'state' => 'free',
                'created_at' => $date,
                'updated_at' => $date
            ]);
        }
    }
}