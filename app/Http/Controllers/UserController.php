<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\PhoneService;

class UserController extends Controller
{
    private $userService;
    private $phoneService;

    public function __construct(UserService $userService, PhoneService $phoneService)
    {
        $this->userService = $userService;
        $this->phoneService = $phoneService;
    }

    public function index()
    {
        return view('user.client.home');
    }

    public function show($id)
    {
        return view('user.client.show', ['id' => $id]);
    }

    public function find() 
    {
        $id = $_GET['id'];
        $response = $this->userService->find($id);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success', 'data'=>$response['data']], 200);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);    
    }

    public function store(Request $request)
    {
        $data = [
            'id_company' => auth()->user()->id_company,
            'name' => trim($request->name),
            'email' => trim($request->email),
            'birth' => trim($request->birth),
            'cpf' => trim($request->cpf),
            'rg' => trim($request->rg),
            'civil_status' => trim($request->civil_status),
            'profession' => trim($request->profession),
            'zip_code' => trim($request->zip_code),
            'uf' => trim($request->uf),
            'city' => trim($request->city),
            'neighborhood' => trim($request->neighborhood),
            'address' => trim($request->address),
            'address_number' => trim($request->address_number),
            'complement' => trim($request->complement),
            'password' => bcrypt(trim(123456)),
            'group' => 2,
        ];

        $response = $this->userService->store($data);

        if($response['status'] == 'success'){
            if($request->phones){
                if(count($request->phones) > 0){

                    foreach ($request->phones as $number) {
                        $data = [
                            'id_user' => $response['data']->id,
                            'number' => $number 
                        ];
    
                        $this->phoneService->store($data);
                    }
        
                }
            }
        }

        if($response['status'] == 'success')
            return response()->json(['status'=>'success'], 201);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);
    }

    public function list() 
    {

        $response = $this->userService->list([2]);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success', 'data'=>$response['data']], 200);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);    
    }

    public function search() 
    {
        $search = $_GET['search'];
        $response = $this->userService->search([2], $search);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success', 'data'=>$response['data']], 200);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);    
    }

    public function update(Request $request) 
    {

        $data = [
            'id' => trim($request->id),
            'name' => trim($request->name),
            'email' => trim($request->email),
            'birth' => trim($request->birth),
            'cpf' => trim($request->cpf),
            'rg' => trim($request->rg),
            'civil_status' => trim($request->civil_status),
            'profession' => trim($request->profession),
            'zip_code' => trim($request->zip_code),
            'uf' => trim($request->uf),
            'city' => trim($request->city),
            'neighborhood' => trim($request->neighborhood),
            'address' => trim($request->address),
            'address_number' => trim($request->address_number),
            'complement' => trim($request->complement),
            'group' => 2,
        ];

        $response = $this->userService->update($data);

        if($response['status'] == 'success'){
            
            $this->phoneService->removeByCliente($request->id);

            if($request->phones){
                if(count($request->phones) > 0){

                    foreach ($request->phones as $number) {
                        $data = [
                            'id_user' => $request->id,
                            'number' => $number 
                        ];
    
                        $this->phoneService->store($data);
                    }
        
                }
            }
        }

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

        $response = $this->userService->destroy($data);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success'], 200);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);    
    }

    // ****************************************
    //               MODULO ROOT
    // ****************************************

    public function storeAdmin(Request $request)
    {
        $data = [
            'id_company' => 1,
            'name' => trim($request->name),
            'email' => trim($request->email) ,
            'password' => bcrypt(trim($request->password)),
            'group' => 1,
        ];

        $response = $this->userService->store($data);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success'], 201);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 400);
    }
}
