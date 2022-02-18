<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\GroupType;
use App\Models\GroupUser;
use App\Models\GroupUserData;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Group::truncate();
        // GroupType::truncate();
        // GroupData::truncate();

        // Groups
        Group::create([
            'name' => 'Medical Group'
        ]);
        Group::create([
            'name' => 'Computer Group'
        ]);
        Group::create([
            'name' => 'Gaming Group'
        ]);
        Group::create([
            'name' => 'Laravel Group'
        ]);
        Group::create([
            'name' => 'WordPress Group'
        ]);
        // Group::create([
        //     'name' => 'Sports Group'
        // ]);


        // Groups Types
        GroupType::create([
            'group_id' => 1,
            'name'     => 'Doctor Name'
        ]);
        GroupType::create([
            'group_id' => 1,
            'name'     => 'Medical Degree'
        ]);
        GroupType::create([
            'group_id' => 1,
            'name'     => 'Medical Specialization'
        ]);
        GroupType::create([
            'group_id' => 2,
            'name'     => 'Student Name'
        ]);
        GroupType::create([
            'group_id' => 2,
            'name'     => 'Gender'
        ]);
        GroupType::create([
            'group_id' => 2,
            'name'     => 'Graduation'
        ]);
        GroupType::create([
            'group_id' => 3,
            'name'     => 'Player Name'
        ]);
        GroupType::create([
            'group_id' => 3,
            'name'     => 'Game Name'
        ]);
        GroupType::create([
            'group_id' => 3,
            'name'     => 'Player Level'
        ]);
        GroupType::create([
            'group_id' => 4,
            'name'     => 'Team Name'
        ]);
        GroupType::create([
            'group_id' => 4,
            'name'     => 'Projects'
        ]);


        // Users
        User::create([
            'name'     => 'ZeeBoy',
            'email'    => 'zeeboy@gmail.com',
            'password' => 'admin'
        ]);
        User::create([
            'name'     => 'Haroon',
            'email'    => 'haroon@gmail.com',
            'password' => 'admin'
        ]);


        // Group Users
        GroupUser::create([
            'user_id'  => 2,
            'group_id' => 2
        ]);
        GroupUser::create([
            'user_id'  => 1,
            'group_id' => 3
        ]);
        GroupUser::create([
            'user_id'  => 2,
            'group_id' => 1
        ]);


        // Group Users Data
        GroupUserData::create([
            'group_user_id' => 1,
            'group_type_id' => 4,
            'value'         => 'Haroon Mughal'
        ]);
        GroupUserData::create([
            'group_user_id' => 1,
            'group_type_id' => 5,
            'value'         => 'Male'
        ]);
        GroupUserData::create([
            'group_user_id' => 1,
            'group_type_id' => 6,
            'value'         => 'BSCS'
        ]);
        GroupUserData::create([
            'group_user_id' => 2,
            'group_type_id' => 7,
            'value'         => 'ZeeBoy'
        ]);
        GroupUserData::create([
            'group_user_id' => 2,
            'group_type_id' => 8,
            'value'         => 'Tekken 7'
        ]);
        GroupUserData::create([
            'group_user_id' => 2,
            'group_type_id' => 9,
            'value'         => 'Expert'
        ]);
    }
}
