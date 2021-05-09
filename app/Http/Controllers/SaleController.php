<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SaleService;

class SaleController extends Controller
{
    private $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    public function index() 
    {
        return view('sale.home');
    }
    
    public function store(Request $request) 
    {
        $price_formated = str_replace(".", "", trim($request->price));
        $price_formated = str_replace(",", ".", $price_formated);

        $data = [
            'id_plantation' => trim($request->id_plantation),
            'id_user' => trim($request->id_client),
            'quantity' => trim($request->quantity),
            'price' => $price_formated,
            'description' => trim($request->description),
            'status' => "A",
        ];

        $response = $this->saleService->store($data);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success'], 201);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);    
    }
    
    public function update(Request $request) 
    {
        $price_formated = str_replace(".", "", trim($request->price));
        $price_formated = str_replace(",", ".", $price_formated);

        $data = [
            'id' => trim($request->id),
            'id_plantation' => trim($request->id_plantation),
            'id_user' => trim($request->id_client),
            'quantity' => trim($request->quantity),
            'price' => $price_formated,
            'description' => trim($request->description),
        ];

        $response = $this->saleService->update($data);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success'], 200);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);    
    }
    
    public function destroy(Request $request) 
    {
        $data = [
            'id' => trim($request->id),
            'status' => 'D'
        ];

        $response = $this->saleService->destroy($data);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success'], 200);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);    
    }
    
    public function list() 
    {
        $response = $this->saleService->list();

        if($response['status'] == 'success')
            return response()->json(['status'=>'success', 'data'=>$response['data']], 200);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);    
    }
    
    public function listByPlantation() 
    {
        $id_plantation = $_GET['id_plantation'];
        $response = $this->saleService->listByPlantation($id_plantation);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success', 'data'=>$response['data']], 200);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);    
    }
    
    public function listByClient() 
    {
        $id_client = $_GET['id_client'];
        $response = $this->saleService->listByClient($id_client);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success', 'data'=>$response['data']], 200);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);    
    }
}
