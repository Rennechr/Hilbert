<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum')->only('show');
        $this->middleware('isAdmin')->only([]);;
    }
    public function show(Request $request)
    {
        return response()->json( $request->user() );
    }

}
