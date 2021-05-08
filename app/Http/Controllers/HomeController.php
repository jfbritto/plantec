<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class HomeController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('home.home');
    }

    public function all() 
    {

        $response_clientes = $this->userService->list([2]);

        $data = ['clients' => count($response_clientes['data'])];

        if($data)
            return response()->json(['status'=>'success', 'data'=>$data, 200]);

        return response()->json(['status'=>'error', 'message'=>$data, 400]);    
    }
}
