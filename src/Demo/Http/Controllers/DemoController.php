<?php

namespace Zofe\Rapyd\Demo\Http\Controllers;

use App\Http\Controllers\Controller;
use Faker\Factory;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DemoController extends Controller
{
    public function index()
    {
        return view('rapyd-demo::demo');
    }

    public function schema()
    {

        Schema::dropIfExists("rapyd_demo_users");
        Schema::dropIfExists("rapyd_demo_articles");

        Schema::table("rapyd_demo_users", function ($table) {
            $table->create();
            $table->increments('id');
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->timestamps();
        });

        Schema::table("rapyd_demo_articles", function ($table) {
            $table->create();
            $table->increments('id');
            $table->integer('author_id')->unsigned();
            $table->string('title', 200);
            $table->text('body');
            $table->boolean('public');
            $table->timestamp('publication_date');
            $table->timestamps();
        });

        $faker = Factory::create();
        for($i=1;$i<=10;$i++){
            $user = DB::table('rapyd_demo_users')->insert(
                [
                    'firstname' => $faker->firstName,
                    'lastname' => $faker->lastName,
                ]
            );
            for($j=1;$j<=2;$j++) {
                $article = DB::table('rapyd_demo_articles')->insert(
                    [
                        'author_id' => $i,

                        'title' => $faker->sentence,
                        'body' => $faker->text,
                        'public'=> 1,
                        'publication_date' => $faker->dateTime
                    ]
                );
            }

        }



        return view('rapyd-demo::demo');
    }
}
