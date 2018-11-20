<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Group::class, 5)->create()->each(function($u) {

            $u->works()->save(factory(App\Work::class)->make());
        });
    }
}
