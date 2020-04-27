<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try{
            $superuser = User::create([
                'name' => 'Super User',
                'email' => 'superuser@bookapp.com',
                'password' => bcrypt('Superuser!123')
            ]);

            $superuser->assignRole('superuser');

            DB::commit();

        }catch(\Exception $e){
            DB::rollback();

            Log::critical('Failed to seed users. \n\nMessage: '. $e->getMessage() . '\nLine: ' .$e->getLine());

        }

    }
}
