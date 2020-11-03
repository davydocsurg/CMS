<?php

use Illuminate\Database\Seeder;
use App\User;
use Identicon\Identicon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'developantic@gmail.com')->first();

        if (!$user) {
            User::create([
                'name' => 'Dr. Greg',
                'email' => 'developantic@gmail.com',
                'role' => 'admin',
                'avatar' => 'images/6.jpg',
                // 'avatar' => (new Identicon())->getImageDataUri('Dr. Greg', 256),
                'password' => Hash::make('password')
            ]);
        }
    }
}
