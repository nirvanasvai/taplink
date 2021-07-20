<?php

namespace Database\Seeders;

use App\Models\Hr;
use App\Models\Image;
use App\Models\Line;
use App\Models\Link;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = [
            'url'=>\Faker\Provider\Image::image()
        ];
        for ($i=1; $i< 5;$i++){
            $hr = [
                'hr'=>$i
            ];
            Hr::query()->create($hr);
        }
        for ($i=1; $i< 15;$i++){
            $sort = [
                'sortable'=>$i
            ];
            Line::query()->create($sort);
        }
    }
}
