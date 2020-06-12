<?php

Route::get('/','HomepageController@index')->name('home');
Route::get('/about','HomepageController@aboutUs')->name('about');
Route::get('/testimonial','HomepageController@testimonials')->name('testimonials');
Route::get('/blog','HomepageController@blogs')->name('blogs');
Route::get('/portfolio','HomepageController@portfolio')->name('portfolio');
Route::get('/contact','HomepageController@contact')->name('contact');
Route::get('find/{id}','HomepageController@findByCategory')->name('find');
Route::get('/post/{posts}','HomepageController@post')->name('post');
Route::get('posts/{id}','HomepageController@detailBlogs')->name('singleBlog');
Route::get('search','HomepageController@searchPosts')->name('searchPosts');
Route::get('testimonial','HomepageController@showTestimonials')->name('testimonial');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('posts/category/{id}', 'admin\CategoryController@show')->name('postcategory');
Route::get('posts/tags/{id}', 'admin\TagController@show')->name('postTag');

Route::group(["middleware"=>"admin"], function() {
        Route::get('/admin/dashboard','AdminController@dashboard')->name('admin');
        Route::resource('admin/category','admin\CategoryController');
        Route::resource('admin/post','admin\PostController');
        Route::resource('admin/tags','admin\TagController');
        Route::resource('admin/slider','admin\SliderController');
        Route::resource('admin/clients','admin\ClientController');
        Route::resource('admin/about','admin\AboutController');
        Route::resource('admin/team','admin\TeamController');
        Route::get('admin/testimonials','admin\TestimonialController@index')->name('testimonials');
        Route::get('admin/addTestimonial','admin\TestimonialController@create')->name('addTestimonial');
        Route::post('admin/saveTestimonial','admin\TestimonialController@saveTestimonial')->name('saveTestimonial');
        Route::get('admin/edit/{id}','admin\TestimonialController@editTestimonial')->name('editTestimonial');
        Route::post('admin/update/{id}','admin\TestimonialController@updateTestimomial')->name('updateTestimomial');
        Route::post('admin/delete/{id}','admin\TestimonialController@deleteTestimonial')->name('deleteTestimonial');
        Route::get('admin/portfolios','admin\PortfolioController@index')->name('portfolios');
        Route::get('admin/create','admin\PortfolioController@create')->name('addPortfolio');
        Route::post('savePortfolio','admin\PortfolioController@savePortfolio')->name('savePortfolio');
        Route::get('admin/editPortfolio/{id}','admin\PortfolioController@edit')->name('editPortfolio');
        Route::post('admin/updatePortfolio/{id}','admin\PortfolioController@updatePortfolio')->name('updatePortfolio');
        Route::post('deletePortfolio/{id}','admin\PortfolioController@deletePortfolio')->name('deletePortfolio');
        Route::get('/admin/users','AdminController@AllUsers')->name('showAllUsers');
        Route::get('activatePost/{id}','admin\PostController@activatePost')->name('activatePost');
        
});



Route::get('admin/login','AdminController@showloginform')->name('login');
Route::post('admin/checklogin','AdminController@checkUserlogin')->name('checklogin');
Route::get('admin/logout','AdminController@logout')->name('adminlogout');

Route::resource('profile','UserController')->middleware('auth');
// Route::get('profile', 'UserController@index')->middleware('auth');
Auth::routes();

