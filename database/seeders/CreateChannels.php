<?php

namespace Database\Seeders;

use App\Models\Channels;
use Illuminate\Database\Seeder;

class CreateChannels extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel = new Channels();
        $channel->name = 'Web site';
        $channel->alias = 'website';
        $channel->active = 1;
        $channel->save();
    }
}
