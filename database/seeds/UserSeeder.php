<?php

use App\User;
use App\Profile;
use Identicon\Identicon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::where('email', 'developantic@gmail.com')->first();

        // if (!$user) {
            $user = User::create([
                'name' => 'Dr. Greg',
                'email' => 'developantic@gmail.com',
                'role' => 'admin',
                 // 'avatar' => (new Identicon())->getImageDataUri('Dr. Greg', 256),
                'password' => Hash::make('password')
            ]);

            Profile::create([
                'user_id' => $user->id,
                'avatar' => 'images/6.jpg',
                'about' => 'Dedicated, passionate, and accomplished Full Stack
                Developer with 9+ years of progressive experience working as an Independent Contractor
                for Google and developing and growing my educational social network that helps others
                learn programming, web design, game development,
                networking. I’ve acquired a wide depth of knowledge and expertise in using my technical
                skills in programming, computer science, software
                development, and mobile app development to developing solutions to help organizations
                increase productivity, and accelerate business
                performance. It’s great that we live in an age where we can share so much with
                technology but I’m but I’m ready for the next phase of
                my career, with a healthy balance between the virtual world and a workplace where I help
                others face-to-face. There’s always something
                new to learn, especially in IT-related fields. People like working with me because I can
                explain technology to everyone, from staff to
                executives who need me to tie together the details and the big picture. I can also
                implement the technologies that successful projects need.',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://www.twitter.com/davydocsurg',
                'linkedin' => 'https://www.linkedin.com/in/davidchibueze',
                'youtube' => 'https://www.youtube.com/developantic'
            ]);
        // }
    }
}
