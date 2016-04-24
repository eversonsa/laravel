<?php

use Illuminate\Database\Seeder;

class CarrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carros = [
            0 => [
                'nome' => 'GOL',
                'placa' => 'POD-4125'
            ],
            1 => [
                'nome' => 'peugeot',
                'placa' => 'NPS9947'
            ]
        ];
        DB::table('carros')->insert($carros);
    }
}
