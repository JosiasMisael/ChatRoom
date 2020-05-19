<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   public function  abilityCRUD($name, $flag = false){
       $this->middleware("can:index-$name", ['only' => ['index']]);
       $this->middleware("can:create-$name", ['only' => ['create','store']]);
       $this->middleware("can:edit-$name", ['only' => ['edit','update']]);
       $this->middleware("can:delete-$name", ['only' => ['delete']]);

       if($flag){

       $this->middleware("can:show-$name", ['only' => ['show']]);
       }

   }
}
