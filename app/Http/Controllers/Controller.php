<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function make_dir_if_not_exists($path)
    {
    	if (!is_dir($path)) {

            /*$old = umask(0);
            mkdir($path, 0777);
            umask($old);*/

            mkdir($path, 0777, true);

		    //File::makeDirectory($path, 0777, true);
           // chmod($path, 777);
		    return true;
		}
		return false;
    }

    
}
