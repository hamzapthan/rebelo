<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('g_settings')->insert([
            'id' => 1,
            'pageName' => "Home",
            'section' => "Slider 1",
            'content' => '{"title":"sadf","description":"lkjlkj","button_title":"dfa","button_link":"asfd","image":"http:\/\/127.0.0.1:8000\/setting\/home_slider1623170014300hamzasdf.jpg"}',
            'status' => "1",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('g_settings')->insert([
            'id' => 2,
            'pageName' => "Home",
            'section' => "Slider 1",
            'content' => '{"title":"sadf","description":"lkjlkj","button_title":"dfa","button_link":"asfd","image":"http:\/\/127.0.0.1:8000\/setting\/home_slider1623170014300hamzasdf.jpg"}',
            'status' => "1",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('g_settings')->insert([
            'id' => 3,
            'pageName' => "Home",
            'section' => "Slider 1",
            'content' => '{"title":"sadf","description":"lkjlkj","button_title":"dfa","button_link":"asfd","image":"http:\/\/127.0.0.1:8000\/setting\/home_slider1623170014300hamzasdf.jpg"}',
            'status' => "1",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('g_settings')->insert([
            'id' => 4,
            'pageName' => "Home",
            'section' => "Slider 1",
            'content' => '{"title":"sadf","description":"lkjlkj","button_title":"dfa","button_link":"asfd","image":"http:\/\/127.0.0.1:8000\/setting\/home_slider1623170014300hamzasdf.jpg"}',
            'status' => "1",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('g_settings')->insert([
            'id' => 5,
            'pageName' => "Home",
            'section' => "Slider 1",
            'content' => '{"title":"sadf","description":"lkjlkj","button_title":"dfa","button_link":"asfd","image":"http:\/\/127.0.0.1:8000\/setting\/home_slider1623170014300hamzasdf.jpg"}',
            'status' => "1",
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
