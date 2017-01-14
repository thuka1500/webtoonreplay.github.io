<?php 

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
	Route::get('/', ['as' => 'home', 'uses' => 'AdminController@index']);
	Route::get('manga', ['as' => 'manga.index', 'uses' => 'AdminController@mangaIndex']);
	Route::get('manga/create', ['as' => 'manga.create', 'uses' => 'MangaController@create']);
	Route::get('manga/{manga_id}', ['as' => 'manga.chapter', 'uses' => 'AdminController@mangaChapter']);
	Route::get('manga/{manga_id}/chapter/{chapter_num}', ['as' => 'manga.page', 'uses' => 'AdminController@mangaPage']);

	Route::get('comment', ['as' => 'comment', 'uses' => 'AdminController@comments']);

	Route::get('setting/page', ['as' => 'setting.page', 'uses' => 'AdminController@setting']);
	Route::get('setting/user', ['as' => 'setting.user', 'uses' => 'AdminController@users']);
});