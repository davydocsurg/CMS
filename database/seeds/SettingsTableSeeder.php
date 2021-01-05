<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => 'CMS',
            'address' => 'Toronto, Ontario',
            'contact_number' => '5 887 8984 9887',
            'contact_email' => 'info@cms.com'
        ]);
    }
}
