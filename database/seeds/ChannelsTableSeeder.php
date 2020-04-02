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
        $channel1 = ['title' => 'Vuejs'];
        $channel2 = ['title' => 'Laravel'];
        $channel3 = ['title' => 'CSS3'];
        $channel4 = ['title' => 'Javascript'];
        $channel5 = ['title' => 'Python'];
        $channel6 = ['title' => 'PHP Testing'];
        $channel7 = ['title' => 'React'];


        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
    }
}
