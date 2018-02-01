<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups =[
            [
                'name' => 'user',
                'slug' => 'user',
            ],
            [
                'name' => 'editor',
                'slug' => 'editor',
            ],
            [
                'name' => 'admin',
                'slug' => 'admin',
            ]
        ];
        foreach ($groups as $key => $value){
            Group::create($value);
        }
    }
}
