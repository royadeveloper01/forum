<?php

use App\Discussion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Implementing Vue in Laravel';
        $t2 = 'Implementing OAuth in Laravel';
        $t3 = 'Basic techniques in Python';
        $t4 = 'Python Framework';

        $d1 = [
            'title' => $t1,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim facilisis gravida neque convallis a cras.',
            'user_id' => '1',
            'channel_id' => '1',
            'slug' => Str::slug($t1),
        ];

        $d2 = [
            'title' => $t2,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim facilisis gravida neque convallis a cras.',
            'user_id' => '1',
            'channel_id' => '2',
            'slug' => Str::slug($t2),
        ];

        $d3 = [
            'title' => $t3,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim facilisis gravida neque convallis a cras.',
            'user_id' => '2',
            'channel_id' => '3',
            'slug' => Str::slug($t3),
        ];

        $d4 = [
            'title' => $t4,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim facilisis gravida neque convallis a cras.',
            'user_id' => '2',
            'channel_id' => '4',
            'slug' => Str::slug($t4),
        ];

        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);
        Discussion::create($d4);

    }
}
