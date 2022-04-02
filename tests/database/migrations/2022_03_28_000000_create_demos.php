<?php

use Faker\Factory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDemos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
            $table->text('body')->nullable();
            $table->tinyInteger('public')->default(0);
            $table->timestamp('publication_date');
            $table->timestamps();
        });

        $faker = Factory::create();
        for ($i = 1; $i <= 10; $i++) {
            DB::table('rapyd_demo_users')->insert(
                [
                    'firstname' => $faker->firstName,
                    'lastname' => $faker->lastName,
                ]
            );
            for ($j = 1; $j <= 2; $j++) {
                DB::table('rapyd_demo_articles')->insert(
                    [
                        'author_id' => $i,

                        'title' => $faker->sentence,
                        'body' => $faker->text,
                        'public' => 1,
                        'publication_date' => $faker->dateTime,
                    ]
                );
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("rapyd_demo_users");
        Schema::dropIfExists("rapyd_demo_articles");

    }
}
