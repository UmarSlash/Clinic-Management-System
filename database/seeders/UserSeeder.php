<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userDataDoctor = [
            [
                'name' => 'Zul',
                'email' => 'Zul@gmail.com',
                'gender' => 'male',
                'phone_no' => '01110094575',
                'specialty' => 'Dentist',
                'password' => 'testing123',
            ],
            [
                'name' => 'Hakim',
                'email' => 'Hakim@gmail.com',
                'gender' => 'male',
                'phone_no' => '01110094575',
                'specialty' => 'Psychologist',
                'password' => 'testing123',
            ],
            [
                'name' => 'Jamal',
                'email' => 'Jamal@gmail.com',
                'gender' => 'male',
                'phone_no' => '01110094575',
                'specialty' => 'Therapist',
                'password' => 'testing123',
            ],
        ];
        $userDataPatient = [
            [
                'ic' => '010203110123',
                'name' => 'Luqman',
                'email' => 'Luqman@gmail.com',
                'gender' => 'male',
                'phone_no' => '01110094575',
                'password' => 'testing123',
            ],
            [
                'ic' => '011023110123',
                'name' => 'Faliq',
                'email' => 'Faliq@gmail.com',
                'gender' => 'male',
                'phone_no' => '01110094575',
                'password' => 'testing123',
            ],
            [
                'ic' => '011110110123',
                'name' => 'Muss',
                'email' => 'Muss@gmail.com',
                'gender' => 'male',
                'phone_no' => '01110094575',
                'password' => 'testing123',
            ],
        ];
        $userDataStaff = [
            [
                'name' => 'Syahmi',
                'email' => 'Syahmi@gmail.com',
                'gender' => 'male',
                'phone_no' => '01110094575',
                'job' => 'Pharmacist',
                'password' => 'testing123',
            ],
            [
                'name' => 'Syazwan',
                'email' => 'Syazwan@gmail.com',
                'gender' => 'male',
                'phone_no' => '01110094575',
                'job' => 'Desk Helper',
                'password' => 'testing123',
            ],
            [
                'name' => 'Ridhuan',
                'email' => 'Ridhuan@gmail.com',
                'gender' => 'male',
                'phone_no' => '01110094575',
                'job' => 'Receptionist',
                'password' => 'testing123',
            ],
        ];

        // Insert the data into the user table using Eloquent
        foreach ($userDataDoctor as $data) {
            User::create($data)->assignRole(config('system.roles.doctor'));
        }
        // Insert the data into the user table using Eloquent
        foreach ($userDataPatient as $data) {
            User::create($data)->assignRole(config('system.roles.patient'));
        }
        // Insert the data into the user table using Eloquent
        foreach ($userDataStaff as $data) {
            User::create($data)->assignRole(config('system.roles.staff'));
        }
    }
}
