<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = [
            [
                'name' => 'user1',
                'student_id' => '2002568',
                'email' => 'user1@gmail.com',
                'password' => bcrypt('12345678'),
                'phone_number' => '0112345678',
                'faculty' => 'LKC FES',
                'course' => 'Bachelor of science (Hons) Software engineering',
                'personal_login_phrase' => 'I LOVE UTAR',
                'role' => 'user', 
                'IC' => '01234-56-7895' 
            ], 
            [
                'name' => 'user2',
                'student_id' => '2008969',
                'email' => 'user2@gmail.com',
                'password' => bcrypt('12345678'),
                'phone_number' => '012456789',
                'faculty' => 'LKC FES',
                'course' => 'Bachelor of science (Hons) Software engineering',
                'personal_login_phrase' => 'I LOVE UTAR TOO',
                'role' => 'user',  
                'IC' => '98756-45-6321' 
            ], 
            [
                'name' => 'admin',
                'student_id' => '2002229',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'phone_number' => '01116281050',
                'faculty' => 'LKC FES',
                'course' => 'Bachelor of science (Hons) Software engineering',
                'personal_login_phrase' => 'I AM ADMIN',
                'role' => 'admin', 
                'IC' => '25634-51-4568'  
            ]
        ];

        for($i = 0; $i < count($user); $i++){
            DB::table('users')->insert([
                'name' => $user[$i]['name'],
                'student_id' => $user[$i]['student_id'],
                'email' => $user[$i]['email'],
                'password' => $user[$i]['password'],
                'phone_number' => $user[$i]['phone_number'],
                'faculty' => $user[$i]['faculty'],
                'course' => $user[$i]['course'],
                'personal_login_phrase' => $user[$i]['personal_login_phrase'],
                'role' => $user[$i]['role'],
                'IC' => $user[$i]['IC']
            ]);
        }


        $posts = [
            [
                'user_id' => 1,
                // 'title' => 'First Post by User 1',
                'content' => 'This is the content of the first post by User 1',
                // 'likes' => json_encode(['likedBy' => ['2008969', '2002568']]),
                'likes' => json_encode(['2008969', '2002568']),
                'file_path' => 'uploaded_Images\image1.jpg',
            ],
            [
                'user_id' => 1,
                // 'title' => 'Second Post by User 1',
                'content' => 'This is the content of the second post by User 1',
                'likes' => json_encode([]),
                'file_path' => 'uploaded_Images\image1.jpg',
            ],
            [
                'user_id' => 2,
                // 'title' => 'First Post by User 2',
                'content' => 'This is the content of the first post by User 2',
                'likes' => json_encode([]),
                'file_path' => 'uploaded_Images\image2.jpeg',
            ],
            [
                'user_id' => 2,
                // 'title' => 'Second Post by User 2',
                'content' => 'This is the content of the second post by User 2',
                'likes' => json_encode([]),
                'file_path' => 'uploaded_Images\image2.jpeg',
            ],
            // [
            //     'user_id' => 4,
            //     // 'title' => 'First Post by User 4',
            //     'content' => 'This is the content of the first post by User 4',
            //     'likes' => json_encode([]),
            //     'file_path' => 'C:\Users\Windows 10\FYP_project\SocialNetwork\public\uploaded_Images\image3.jpeg',
            // ],
            // [
            //     'user_id' => 4,
            //     // 'title' => 'Second Post by User 4',
            //     'content' => 'This is the content of the second post by User 4',
            //     'likes' => json_encode([]),
            //     'file_path' => 'C:\Users\Windows 10\FYP_project\SocialNetwork\public\uploaded_Images\image2.jpeg',
            // ],
        ];

        foreach ($posts as $post) {
            DB::table('posts')->insert($post);
        }


        $comments = [
            [
                'post_id' => 1,
                'user_id' => 2,
                'comment' => 'I have commented in user 2'
            ],
            [
                'post_id' => 1,
                'user_id' => 1,
                'comment' => 'I have commented in user 1'
            ],
            [
                'post_id' => 4,
                'user_id' => 1,
                'comment' => 'I have commented in user 1 for post 4'
            ],
            [
                'post_id' => 4,
                'user_id' => 2,
                'comment' => 'I have commented in user 2 for post 4'
            ],
        ];

        foreach ($comments as $comment) {
            DB::table('comments')->insert($comment);
        }

        $jobs = [
            [

            ],
        ];
    }
}
