<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PlantationService;

class PlantationController extends Controller
{
    private $plantationService;

    public function __construct(PlantationService $plantationService)
    {
        $this->plantationService = $plantationService;
    }

    public function index() 
    {
        return view('plantation.home');
    }
    
    public function store(Request $request) 
    {
        $data = [
            'id_specie' => trim($request->id_specie),
            'quantity' => trim($request->quantity),
            'start_time' => trim($request->start_time),
            'end_time' => trim($request->end_time),
            'description' => trim($request->description),
            'status' => "A",
        ];

        $response = $this->plantationService->store($data);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success'], 201);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);    
    }
    
    public function update(Request $request) 
    {
        $data = [
            'id' => trim($request->id),
            'id_specie' => trim($request->id_specie),
            'quantity' => trim($request->quantity),
            'start_time' => trim($request->start_time),
            'end_time' => trim($request->end_time),
            'description' => trim($request->description),
        ];

        $response = $this->plantationService->update($data);

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

        $response = $this->plantationService->destroy($data);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success'], 200);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);    
    }
    
    public function list() 
    {
        $response = $this->plantationService->list();

        if($response['status'] == 'success')
            return response()->json(['status'=>'success', 'data'=>$response['data']], 200);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);    
    }
}
