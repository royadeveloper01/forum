<?php

use App\Reply;
use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [
            'user_id' => '2',
            'discussion_id' => '1',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim facilisis gravida neque convallis a cras.',
        ];

        $r2 = [
            'user_id' => '2',
            'discussion_id' => '2',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim facilisis gravida neque convallis a cras.',
        ];

        $r3 = [
            'user_id' => '1',
            'discussion_id' => '3',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim facilisis gravida neque convallis a cras.',
        ];

        $r4 = [
            'user_id' => '1',
            'discussion_id' => '4',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim facilisis gravida neque convallis a cras.',
        ];

        Reply::create($r1);
        Reply::create($r2);
        Reply::create($r3);
        Reply::create($r4);
    }
}
