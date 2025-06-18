<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;

class CreateRandomUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $roles = ['student', 'teacher'];
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        for ($i = 1; $i <= 50; $i++) {
            $randomRole = $roles[array_rand($roles)];

            $name = $faker->name;
            $email = $faker->unique()->safeEmail;

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt('123456'), 
            ]);
            $user->assignRole($randomRole);
        }
    }
}
