<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\SpecieService;
use App\Services\PlantationService;
use App\Services\SaleService;

class HomeController extends Controller
{
    private $userService;
    private $specieService;
    private $plantationService;
    private $saleService;

    public function __construct(UserService $userService, SpecieService $specieService, PlantationService $plantationService, SaleService $saleService)
    {
        $this->userService = $userService;
        $this->specieService = $specieService;
        $this->plantationService = $plantationService;
        $this->saleService = $saleService;
    }

    public function index()
    {
        return view('home.home');
    }

    public function all() 
    {

        $response_clientes = $this->userService->list([2]);
        $response_species = $this->specieService->list([2]);
        $response_plantations = $this->plantationService->list([2]);
        $response_sales = $this->saleService->list([2]);

        $data = [
            'clients' => count($response_clientes['data']),
            'species' => count($response_species['data']),
            'plantations' => count($response_plantations['data']),
            'sales' => count($response_sales['data']),
        ];

        if($data)
            return response()->json(['status'=>'success', 'data'=>$data, 200]);

        return response()->json(['status'=>'error', 'message'=>$data, 400]);    
    }
}
