<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =[
            [
                'name' => 'general_user',
                'display_name' => 'general_user',
                'description' => 'general_user'
            ],
            [
                'name' => 'editor',
                'display_name' => 'editor',
                'description' => 'editor'
            ],
            [
                'name' => 'admin',
                'display_name' => 'admin',
                'description' => 'admin'
            ]
        ];
        foreach ($roles as $key=>$value){
            Role::create($value);
        }
    }
}
