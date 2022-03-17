<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\City;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $permission1 = Permission::create(['name' => 'manage area']);
        $permission2 = Permission::create(['name' => 'manage university']);
        $permission3 = Permission::create(['name' => 'manage city']);
        $permission4 = Permission::create(['name' => 'manage works']);
        $admin->syncPermissions([$permission1, $permission2, $permission3, $permission4]);
        $user = User::create([
            'name' => 'Ismael Contreras',
            'email' => 'contrerasismael0@gmail.com',
            'password' => Hash::make('admin1234'),
            'avatar' => 'https://res.cloudinary.com/dboafhu31/image/upload/v1644617674/e86brfr470ycahcxgbdv.jpg',
            'email_verified_at' => now(),
            'uid' => Uuid::uuid4(),

        ]);
        $user->assignRole('admin');
        $provinces = DB::table('moso_provincias.provincias')->get();
        foreach ($provinces as $province) {
            City::create([
                'name'=>$province->nombre,
                'country_code' =>'DO'
            ]);
        }
        $areas = file_get_contents(public_path("js/areas.json"));
        $areas = json_decode($areas, true)['data'];
        foreach ($areas as $area) {
            $area=(object)$area;
            Area::create([
                'career'=>$area->career,
                'area'=>$area->area,
            ]);
        }
    }
}
