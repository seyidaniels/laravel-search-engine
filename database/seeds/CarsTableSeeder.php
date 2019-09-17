<?php

use Illuminate\Database\Seeder;


use App\Car;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Loads Json Data
        $this->getCarsJSON();
    }

    protected function getCarsJSON () {
        // Read JSON file
        $cars =file_get_contents(base_path() .'/storage/app/cars.json');

        foreach (json_decode($cars) as $car) {
            $car = (array) $car;
            Car::create($car);
        }
      
    }
}
