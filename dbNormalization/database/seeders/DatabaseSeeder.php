<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\GroupData;
use App\Models\GroupType;
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

    }
}
