<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB:: table('admins')->insert(array(
            'name' =>'Lorena Duran',
            'email'=>'administrador@gmail.com',
            'password'=>\Hash::make('admin01'),
            'telefono'=>'71858873',
            'avatar' =>'admin_default.png',
            'active' =>'1',
        	));
    }
}
