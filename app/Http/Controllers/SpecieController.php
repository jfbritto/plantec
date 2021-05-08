<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SpecieService;

class SpecieController extends Controller
{
    private $specieService;

    public function __construct(SpecieService $specieService)
    {
        $this->specieService = $specieService;
    }

    public function index() 
    {
        return view('specie.home');
    }
    
    public function store(Request $request) 
    {
        $data = [
            'name' => trim($request->name),
            'description' => trim($request->description),
            'status' => "A",
        ];

        $response = $this->specieService->store($data);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success'], 201);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);    
    }
    
    public function update(Request $request) 
    {
        $data = [
            'id' => trim($request->id),
            'name' => trim($request->name),
            'description' => trim($request->description)
        ];

        $response = $this->specieService->update($data);

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

        $response = $this->specieService->destroy($data);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success'], 200);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);    
    }
    
    public function list() 
    {
        $response = $this->specieService->list();

        if($response['status'] == 'success')
            return response()->json(['status'=>'success', 'data'=>$response['data']], 200);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);    
    }
}
