<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'ScreenController@lists');
    $router->get('/logo', 'HomeController@index');
        $router->get('/home', 'HomeController@index');
//    $router->resource('users', UserController::class);

//    $router->get('/posts', 'PostController@index');
//    $router->get('/posts/content', 'PostController@show');
//    $router->get('/posts/create', 'PostController@create');
//    $router->get('/posts/show', 'PostController@show');
//    $router->get('/posts/{ID}/edit', 'PostController@edit');
    $router->get('/auth/screen','ScreenController@index');
    $router->get('/auth/screen/list','ScreenController@lists');
    $router->get('/auth/screen/{id}','ScreenController@show');
    $router->resources([
//
//        'tags'                  => TagController::class,
//        'dep'                 => DeptController::class,
//        'images'                => ImageController::class,
        'posts'                 => PostController::class,
//        'project'                 => ProjectController::class,
//        'videos'                => VideoController::class,
//        'articles'              => ArticleController::class,
//        'painters'              => PainterController::class,
//        'categories'            => CategoryController::class,
//        'messages'              => MessageController::class,
//        'multiple-images'       => MultipleImageController::class,
//
//        'movies/in-theaters'    => Movies\InTheaterController::class,
//        'movies/coming-soon'    => Movies\ComingSoonController::class,
//        'movies/top250'         => Movies\Top250Controller::class,
//
//        'world/country'         => World\CountryController::class,
//        'world/city'            => World\CityController::class,
//        'world/language'        => World\LanguageController::class,
//
//        'china/province'        => China\ProvinceController::class,
//        'china/city'            => China\CityController::class,
//        'china/district'        => China\DistrictController::class,
    ]);
    $router->post('posts/release', 'PostController@release');
    $router->post('posts/restore', 'PostController@restore');

});

