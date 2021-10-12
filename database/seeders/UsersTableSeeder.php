<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;
use DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        DB::table('admin_roles')->truncate();

        $adminRoles = Roles::where('name','admin')->first();
        $authorRoles = Roles::where('name','author')->first();
        $userRoles = Roles::where('name','user')->first();

        $admin = Admin::create([
			'admin_name' => 'admin',
			'admin_email' => 'admin@gmail.com',
			'admin_phone' => '0949418766',
			'admin_password' => md5('123456')	
        ]);
        $author = Admin::create([
			'admin_name' => 'Tiến Dũng Author',
			'admin_email' => 'dungnb27author@gmail.com',
			'admin_phone' => '0949418766',
			'admin_password' => md5('123456')	
        ]);
        $user = Admin::create([
			'admin_name' => 'Tiến Dũng User',
			'admin_email' => 'dungnb27user@gmail.com',
			'admin_phone' => '0949418766',
			'admin_password' => md5('123456')
        ]);

        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);

        // factory(App\Models\Admin::class, 20)->create();

        \App\Models\Admin::factory()->count(10)->create();

    }
}
