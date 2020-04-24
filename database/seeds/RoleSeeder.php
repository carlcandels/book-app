<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
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

            Role::create(['name' => 'superuser']);
            Role::create(['name' => 'user']);

            DB::commit();

        }catch(\Exception $e){

            DB::rollback();

            Log::critical('Failed to seed roles. \n\nMessage: '. $e->getMessage() . '\nLine: ' .$e->getLine());
        }


        $this->call(UserSeeder::class);

    }
}
