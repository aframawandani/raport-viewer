<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
	{
		return view('index');

		$user = Session::get('user');
		$path = storage_path('app\private');
		$filename = "$path\\".$user->email.'.pdf';

		if (!file_exists($filename))
		{
			die('File belum diupload, silahkan hubungi wali kelas.');
		}

		$file_content = @File::get($filename);

		return response($file_content)->header('Content-Type', 'application/pdf');
	}
}
