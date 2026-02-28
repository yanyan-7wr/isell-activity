<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('students')->insert([
                'studentID' => '2026-'. str_pad($i + 1, 4, '0', STR_PAD_LEFT),
                'first_name'     => $faker->firstName,
                'middle_name'    => $faker->optional()->firstName,
                'last_name'      => $faker->lastName,
                'email'          => $faker->unique()->safeEmail(),
                'phone_number'   => $faker->optional()->phoneNumber,
                'course'         => $faker->randomElement([
                'BSIT',
                'BSCS',
                'BSENC',

                ]),
                'year_level'     => $faker->numberBetween(1, 4),
                'gpa'            => $faker->randomFloat(2, 1.00, 4.00),
                'birth_date'     => $faker->date(),
                'gender'         => $faker->randomElement(['Male', 'Female', 'Other']),
                'status'         => $faker->randomElement(['Active', 'Inactive', 'Graduated']),
                'created_at'     => now(),
                'updated_at'     => now(),


            ]);
        }
    }
}
