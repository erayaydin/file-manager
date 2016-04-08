<?php

Route::get("/", ["as" => "file-manager.index", "uses" => "FileManagerController@index"]);