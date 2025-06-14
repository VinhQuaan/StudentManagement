<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Introduction to Programming',
                'Data Structures and Algorithms',
                'Web Development with Laravel',
                'Database Systems',
                'Machine Learning Basics',
                'Advanced Python Programming',
                'Cloud Computing Essentials',
                'Mobile App Development',
                'Software Engineering Principles',
                'Artificial Intelligence Fundamentals',
            ]),
            'code' => strtoupper($this->faker->unique()->bothify('CSE###')),
            'description' => $this->faker->randomElement([
                'This course provides fundamental programming skills for beginners.',
                'Learn how to design and analyze efficient data structures and algorithms.',
                'Explore full-stack web development using Laravel and modern tools.',
                'Understand relational databases, SQL, and normalization principles.',
                'A beginner-friendly introduction to machine learning techniques and tools.',
                'Master Python for automation, data science, and advanced application development.',
                'Gain hands-on experience with cloud platforms like AWS and Azure.',
                'Develop cross-platform mobile apps using Flutter and React Native.',
                'Study the software development life cycle and engineering best practices.',
                'Learn key concepts in AI, including search, planning, and neural networks.',
            ]),

            'duration' => $this->faker->numberBetween(4, 16), // weeks
            'credit' => $this->faker->numberBetween(2, 5),
        ];
    }
}
