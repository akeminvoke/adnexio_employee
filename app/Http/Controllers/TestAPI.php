<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TestAPI extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$posts = [
			[
				'title' => 'fsfsdf',
				'body' => 'fsdsdf'
			]
		];
		return response($posts , 200);

    }
	

}
