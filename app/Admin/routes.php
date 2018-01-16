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
    $router->get('/auth/completion-area', 'CompletionAreaController@index');
    $router->get('/auth/completion-assets', 'CompletionAssetsController@index');
    $router->get('/auth/completion-sale', 'CompletionSaleController@index');
    $router->get('/auth/completion-finance', 'CompletionFinanceController@index');
    $router->get('/auth/completion-industry', 'CompletionIndustryController@index');
    $router->get('/auth/completion-foreign', 'CompletionForeignController@index');
    $router->get('/auth/economic-monitor', 'EconomicmonitorController@index');
    $router->get('/auth/616', 'SixController@index');
    $router->get('/auth/616/content', 'SixController@show');
    $router->get('/auth/industry-town', 'TownController@index');
    $router->get('/auth/industry-town/content', 'TownController@show');
    $router->get('/auth/one-policy', 'PolicyController@index');
    $router->get('/auth/economic-benchmark', 'EconomicbenchmarkController@index');
    $router->get('/auth/benchmark-province', 'BenchmarkProvinceController@index');
    $router->get('/auth/benchmark-city', 'BenchmarkCityController@index');
    $router->get('/auth/benchmark-area', 'BenchmarkAreaController@index');
    $router->get('/auth/area-development', 'AreadevController@index');
    $router->get('/auth/development-functional', 'AreadevController@index');
    $router->get('/auth/development-town', 'AreadevTownController@index');
    $router->get('/auth/development-prefecture', 'AreadevPrefectureController@index');

    $router->get('/auth/search', 'SearchController@index');
    $router->get('/server', 'ServerController@index');
    $router->get('/home', 'HomeController@index');
//    $router->resource('users', UserController::class);

    $router->get('/auth/article','ArticleController@index');
    $router->get('/auth/articles/{id}','ArticleController@show');
    $router->post('/auth/article/store','ArticleController@store');
    $router->get('/auth/article/create','ArticleController@create');
    $router->get('/auth/article/edit/{id}','ArticleController@edit');
    $router->post('/auth/article/update','ArticleController@update');
    $router->get('/project', 'ProjectController@index');
    $router->get('/project/content', 'ProjectController@show');
    $router->get('/project/create', 'ProjectController@create');
    $router->get('/project/show', 'ProjectController@show');
    $router->get('/project/{id}/edit', 'ProjectController@edit');
//    $router->get('/posts', 'PostController@index');
//    $router->get('/posts/content', 'PostController@show');
//    $router->get('/posts/create', 'PostController@create');
//    $router->get('/posts/show', 'PostController@show');
//    $router->get('/posts/{id}/edit', 'PostController@edit');
    $router->get('/auth/screen','ScreenController@index');
    $router->get('/auth/screen/list','ScreenController@lists');
    $router->get('/auth/screen/{id}','ScreenController@show');
    $router->resources([

        'tags'                  => TagController::class,
        'dep'                 => DeptController::class,
        'images'                => ImageController::class,
        'posts'                 => PostController::class,
        'project'                 => ProjectController::class,
        'videos'                => VideoController::class,
        'articles'              => ArticleController::class,
        'painters'              => PainterController::class,
        'categories'            => CategoryController::class,
        'messages'              => MessageController::class,
        'multiple-images'       => MultipleImageController::class,

        'movies/in-theaters'    => Movies\InTheaterController::class,
        'movies/coming-soon'    => Movies\ComingSoonController::class,
        'movies/top250'         => Movies\Top250Controller::class,

        'world/country'         => World\CountryController::class,
        'world/city'            => World\CityController::class,
        'world/language'        => World\LanguageController::class,

        'china/province'        => China\ProvinceController::class,
        'china/city'            => China\CityController::class,
        'china/district'        => China\DistrictController::class,
    ]);
    $router->post('posts/release', 'PostController@release');
    $router->post('posts/restore', 'PostController@restore');
    $router->post('project/release', 'projectController@release');
    $router->post('project/restore', 'projectController@restore');
    $router->get('api/users', 'PostController@users');
    $router->get('china/cascading-select', 'China\ChinaController@cascading');

    $router->get('api/world/cities', 'World\ApiController@cities');
    $router->get('api/world/countries', 'World\ApiController@countries');
    $router->get('api/china/city', 'China\ChinaController@city');
    $router->get('api/china/district', 'China\ChinaController@district');

    $router->get('widgets/form-1', 'WidgetsController@form1');
    $router->get('widgets/form-2', 'WidgetsController@form2');
    $router->get('widgets/form-3', 'WidgetsController@form3');
    $router->get('widgets/table', 'WidgetsController@table');
    $router->get('widgets/box', 'WidgetsController@box');
    $router->get('widgets/info-box', 'WidgetsController@infoBox');
    $router->get('widgets/tab', 'WidgetsController@tab');
    $router->get('widgets/notice', 'WidgetsController@notice');
    $router->get('widgets/editors', 'WidgetsController@editors');
});

