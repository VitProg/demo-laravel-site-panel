<?php


use \Illuminate\Support\Facades\DB;
use \App\User;


/**
 * Created by PhpStorm.
 * User: VitProg
 * Date: 23.09.2015
 * Time: 12:47
 */
class UserTableSeeder extends \Illuminate\Database\Seeder {

    public function run()
    {
        DB::table('users')->delete();

        /** @var User $admin */
        $admin = User::create(
            [
                'name' => 'admin',
                'password' => 'admin',
                'email' => 'foo@bar.com'
            ]
        );
        $admin->save();
    }

}