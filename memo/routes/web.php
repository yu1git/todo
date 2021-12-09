<?php

Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');

//フォルダ作成ページを表示
Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
//フォルダ作成処理を実行
Route::post('/folders/create', 'FolderController@create');