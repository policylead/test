<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $admins = [
            [
                "user" => [
                    "email" => "admin@larakicks.com",
                    "password" => bcrypt("Admin123!"),
                    'first_name' => 'str',
                    'remember_token' => 'str',
                    'last_name' => 'str',
                    'full_name' => 'str',
                    'role' => '428',
                    'agency_name' => 'str',
                    'office_name' => 'str',
                    'press_releases' => 'str',
                    'homepage' => 'str',
                    'university_id' => 'str',
                    'subject_area_id' => 'str',
                    'blog' => 'str',
                    'employee' => 'str',
                    'tel' => 'str',
                    'terms_and_conditions' => 'str',
                    'verified' => '1',
                    'verification_token' => 'str',
                    'lead_type' => 'str',
                    'profile_photo' => 'str',
                    'student_card' => 'str',
                    'data_filled' => '1',
                    'approved' => '1',
                    'alert_providers' => 'text',
                    'alert_frequency' => 'str',
                    'alert_weekday' => 'str',
                    'blocked_documents' => 'text',
                    'first_alert' => '1',
                    'personal_email_for_reports' => '364',
                    'settings_1to1_support' => '1',
                    'settings_click_tracking_reports' => '1',
                    'settings_reconnect' => '1',
                    'custom_sender_email' => 'str',
                    'custom_sender_name' => 'str',
                    'client_feeds_enabled' => '1',
                    'salutation' => 'str',
                    'team_id' => '466',

                ],

            ]
        ];
        foreach ($admins as $admin) {
            $user = new User;
            $user->fill($admin["user"])->save();

            $user->assignRole('admin');
            $user->assignRole('user');
        }
    }
}
