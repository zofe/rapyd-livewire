<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Zofe\Rapyd\Models\DemoArticle;
use Zofe\Rapyd\Models\DemoUser;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DemoUser::factory(10)->create()->each(function ($user) {
            $article = DemoArticle::factory(2)->create([
                'author_id' => $user->id,
            ]);
        });
    }
}
