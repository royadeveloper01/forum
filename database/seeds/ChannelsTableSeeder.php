<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Vuejs', 'slug' => 'Vuejs'];
        $channel2 = ['title' => 'Laravel', 'slug' => 'Laravel'];
        $channel3 = ['title' => 'CSS3', 'slug' => 'CSS3'];
        $channel4 = ['title' => 'Javascript', 'slug' => 'Javascript'];
        $channel5 = ['title' => 'Python', 'slug' => 'Python'];
        $channel6 = ['title' => 'PHP Testing', 'slug' => 'PHP Testing'];
        $channel7 = ['title' => 'React', 'slug' => 'React'];
        $channel8 = ['title' => 'Lumen', 'slug' => 'Lumen'];


        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);
    }
}
