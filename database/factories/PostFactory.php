<?php

  /** @var \Illuminate\Database\Eloquent\Factory $factory */

  use App\Post;
  use Faker\Generator as Faker;

  $factory->define(Post::class, function(Faker $faker) {
    return [
      'user_id' => \App\User::all()->random(),
      'image' => 'post_image.jpg',
      'caption' => $faker->sentence(10),
    ];
  });
