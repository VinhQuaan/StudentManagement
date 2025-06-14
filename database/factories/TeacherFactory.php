<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'    => $this->faker->name(),
            'address' => $this->faker->address(),
            'mobile'  => $this->faker->phoneNumber(),
            'email'   => $this->faker->unique()->safeEmail(),
            'gender'  => $this->faker->randomElement(['Male', 'Female', 'Other']),
            'dob'     => $this->faker->date('Y-m-d', '2005-12-31'), // sinh trước 2006
            'department' => $this->faker->randomElement([
                'Mathematics',
                'Physics',
                'Chemistry',
                'Literature',
                'History',
                'Biology',
                'Information Technology'
            ]),
        ];
    }
}
