<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\Cluster;
use App\Models\College;
use App\Models\Edition;
use App\Models\Event;
use App\Models\Faq;
use App\Models\News;
use App\Models\Profile;
use App\Models\Sponsor;
use App\Models\Stage;
use App\Models\Team;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        College::factory()->count(20)->create();
        User::factory()->withPersonalTeam()->has(Profile::factory())->count(20)->create();
        Team::each(function ($team) {
            $team->users()->attach(
                User::factory()->has(Profile::factory())->count(2)->create(),
                ['role' => 'administrator']
            );
        });

        User::factory([
            'email' => 'admin@admin.com'
        ])->withPersonalTeam()->has(Profile::factory())->create();

        Profile::each(function ($profile) {
            $profile->college()->associate(College::inRandomOrder()->first());
            $profile->save();
        });

        Edition::factory()->has(
            Category::factory()->has(
                Cluster::factory()->has(
                    Event::factory()->count(3)
                )->count(2)
            )->count(3)
        )->count(2)->create();

        Team::each(function ($team) {
            $team->events()->saveMany(
                Event::all()->random(2)
            );
        });


        Edition::each(function ($edition) {
            News::factory()->count(5)->for($edition)->create();
            Sponsor::factory()->count(15)->for($edition)->create();
        });

        Venue::factory()->count(10)->create();

        Event::each(function ($event) {
            $event->sponsors()->saveMany(
                Sponsor::all()->random(2)
            );
            Faq::factory()->count(2)->for($event)->create();
            Announcement::factory()->count(2)->for($event)->create();
            Stage::factory([
                'venue_id' => Venue::inRandomOrder()->first()->id,
            ])->count(2)->for($event)->create();
        });
    }
}
