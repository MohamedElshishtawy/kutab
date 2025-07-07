<?php

namespace Database\Seeders;

use App\Models\Kutab;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // superSheikh
        $superSheikh = User::create([
            'first_name' => 'محمود',
            'middle_name' => 'محمد',
            'last_name' => 'مرسال',
            'phone' => '01093033115',
            'password' => Hash::make('123456'),
            'sex' => 1
        ])->superSheikh()->create();
        
        // Assign super-sheikh role
        $superSheikh->user->assignRole('super-sheikh');


        // create kutabs for the superSheikh
        $kutab1 = Kutab::create([
            'name'      => 'مسجد الرحمة',
            'super_sheikh_id' => $superSheikh->id,
        ]);

        // create Groups for the kutab
        $group1 = $kutab1->groups()->create([
            'name' => 'الأحد والخميس قبل الظهر',
            'for_sex'  => 1,
        ]);

        $group2 = $kutab1->groups()->create([
            'name' => 'الأحد والخميس بعد الظهر',
            'for_sex' => 1,
        ]);

        $group3 = $kutab1->groups()->create([
            'name' => 'السبت بعد العصر',
            'for_sex' => 2,
        ]);



        // create sheikhs for the kutabs
        $sheikh1 = User::create([
            'first_name' => 'إسلام',
            'middle_name' => 'محمد',
            'last_name' => 'مرسال',
            'phone' => '01093033116',
            'password' => Hash::make('123456'),
            'sex' => 1
        ])->sheikh()->create();

        $sheikh2 = User::create([
            'first_name' => 'أحمد',
            'middle_name' => 'علي',
            'last_name' => 'محمود',
            'phone' => '01093033117',
            'password' => Hash::make('123456'),
            'sex' => 1
        ])->sheikh()->create();

        $sheikh3 = User::create([
            'first_name' => 'يوسف',
            'middle_name' => 'عبدالله',
            'last_name' => 'حسن',
            'phone' => '01093033118',
            'password' => Hash::make('123456'),
            'sex' => 1
        ])->sheikh()->create();

        $sheikh4 = User::create([
            'first_name' => 'آمنة',
            'middle_name' => 'عبدالرحمن',
            'last_name' => 'صالح',
            'phone' => '01093033119',
            'password' => Hash::make('123456'),
            'sex' => 0
        ])->sheikh()->create();

        $sheikh5 = User::create([
            'first_name' => 'خالد',
            'middle_name' => 'محمد',
            'last_name' => 'سعيد',
            'phone' => '01093033120',
            'password' => Hash::make('123456'),
            'sex' => 1
        ])->sheikh()->create();

        \App\Models\SheikhGroup::create(['sheikh_id' => $sheikh1->id, 'group_id' => $group1->id]);
        \App\Models\SheikhGroup::create(['sheikh_id' => $sheikh2->id, 'group_id' => $group2->id]);
        \App\Models\SheikhGroup::create(['sheikh_id' => $sheikh3->id, 'group_id' => $group1->id]);
        \App\Models\SheikhGroup::create(['sheikh_id' => $sheikh5->id, 'group_id' => $group2->id]);
        \App\Models\SheikhGroup::create(['sheikh_id' => $sheikh4->id, 'group_id' => $group3->id]);

        // Assign sheikh roles
        $sheikh1->user->assignRole('sheikh');
        $sheikh2->user->assignRole('sheikh');
        $sheikh3->user->assignRole('sheikh');
        $sheikh4->user->assignRole('sheikh');
        $sheikh5->user->assignRole('sheikh');

        // Create parent users
        $parent1 = User::create([
            'first_name' => 'عبدالله',
            'middle_name' => 'محمد',
            'last_name' => 'أحمد',
            'phone' => '01093033121',
            'password' => Hash::make('123456'),
            'sex' => 1
        ]);
        $parent1->assignRole('parent');

        $parent2 = User::create([
            'first_name' => 'فاطمة',
            'middle_name' => 'علي',
            'last_name' => 'محمد',
            'phone' => '01093033122',
            'password' => Hash::make('123456'),
            'sex' => 0
        ]);
        $parent2->assignRole('parent');

        // Create student users
        $student1 = User::create([
            'first_name' => 'محمد',
            'middle_name' => 'عبدالله',
            'last_name' => 'أحمد',
            'phone' => '01093033123',
            'password' => Hash::make('123456'),
            'sex' => 1
        ])->student()->create();
        $student1->user->assignRole('student');

        $student2 = User::create([
            'first_name' => 'عائشة',
            'middle_name' => 'عبدالله',
            'last_name' => 'أحمد',
            'phone' => '01093033124',
            'password' => Hash::make('123456'),
            'sex' => 0
        ])->student()->create();
        $student2->user->assignRole('student');


    }
}
