<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DeleteVideoFromServer extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::guard($this->getGuard())->user();
        return $user->isAdmin() ? redirect('/admin') : view('home');
    }

    private function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo "123";
		
		if (!isset($_POST['delete-file'])) {
			echo 'PermissionDeniedError';
			return;
		}
		
		$fileName = $_POST['delete-file'];
		$filePath = 'uploads/' . $fileName;
		
		// make sure that one can delete only allowed audio/video files
		$allowed = array(
			'webm',
			'wav',
			'mp4',
			"mkv",
			'mp3',
			'ogg'
		);
		$extension = pathinfo($filePath, PATHINFO_EXTENSION);
		if (!$extension || empty($extension) || !in_array($extension, $allowed)) {
			echo 'PermissionDeniedError';
			return;
		}
		
		if (!unlink($filePath)) {
			echo ('Problem deleting file.');
		} else {
			echo ($fileName . ' deleted successfully.');
		}
	

	}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		
		
		
    }	
	
	




	
}