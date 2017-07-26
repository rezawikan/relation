<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\OneToOne\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => 'admin',
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Preference::class, function ($faker) {
    return [
        'country' => rand(1, 100),
        'currency' => rand(300, 500),
        'subscribe_mailing_list' => rand(0, 1),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});


$factory->define(App\Studio::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'founded_at' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});


$factory->define(App\Movie::class, function ($faker) {
    return [
        'name' => $faker->city,
        'date_released' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'studio_id' => rand(1, 6)
    ];
});




$factory->define(App\Course::class, function ($faker) {
    $rooms = array('large','medium','small', 'extra');
    return [
        'title' => $faker->city,
        'units' => rand(1, 20),
        'room' => array_rand($rooms, 1)
    ];
});

$factory->define(App\Student::class, function ($faker) {
    return [
        'name' => $faker->name,
        'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'gender' => $faker->randomElement($array = array('male','female'))
    ];
});



$CourseStudentFactory = function ($faker) use (&$CourseStudentFactory) {
    $ids = [
        'course_id' => $faker->randomElement(App\Course::pluck('id')->toArray()),
        'student_id' => $faker->randomElement(App\Student::pluck('id')->toArray())
    ];

    if (App\CourseStudent::where('course_id', $ids['course_id'])->where('student_id', $ids['student_id'])->first() == null) {
        return $ids;
    } else {
        return $CourseStudentFactory();
    }
};

$factory->define(App\CourseStudent::class, $CourseStudentFactory);

$factory->define(App\Models\HasManyThrough\Artist::class, function (Faker\Generator $faker) {
    $faker->locale = 'id_ID';
    return [
    'name' => $faker->name,
    'genre' => $faker->randomElement($array = array('Rock','Punk','Melow','Jazz', 'Classic'))
  ];
});

$factory->define(App\Models\HasManyThrough\Album::class, function ($faker) {
    return [
    'artist_id' => $faker->randomElement(App\Models\HasManyThrough\Artist::pluck('id')->toArray()),
    'title' => $faker->streetName,
    'released' => $faker->date($format = 'Y-m-d', $max = 'now')
  ];
});

$factory->define(App\Models\HasManyThrough\Song::class, function ($faker) {
    return [
    'album_id' => $faker->randomElement(App\Models\HasManyThrough\Album::pluck('id')->toArray()),
    'title' => $faker->company,
    'length' => $faker->time($format = 'H:i:s', $max = 'now')
  ];
});

$factory->define(App\Models\Polymorphic\Status::class, function ($faker) {
    return[
    'content' => $faker->name,
    'user_id' => $faker->randomElement(App\Models\OneToOne\User::pluck('id')->toArray())
  ];
});

$factory->define(App\Models\Polymorphic\Photo::class, function ($faker) {
    return[
    'title' => $faker->name,
    'filename' => $faker->fileExtension,
    'user_id' => $faker->randomElement(App\Models\OneToOne\User::pluck('id')->toArray())
  ];
});

$factory->define(App\Models\Polymorphic\Comment::class, function ($faker) {
    return[
    'content' => $faker->name,
    'user_id' => $faker->randomElement(App\Models\OneToOne\User::pluck('id')->toArray()),
    'commentable_id' => rand(1, 20),
    'commentable_type' => rand(0, 1) == 1 ? 'App\Models\Polymorphic\Comment' : 'App\Models\Polymorphic\Photo'
  ];
});

$factory->define(App\Models\Self\Person::class,  function($faker){
  return [
    'name' => $faker->name,
    'birth_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'parent_id' => rand(1,50)
  ];
});
