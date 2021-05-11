<?php

namespace App\Services;

use App\Models\Sale;
use DB;
use Exception;

class SaleService
{
    public function store(array $data)
    {
        $response = [];

        try{

            DB::beginTransaction();

            $result = Sale::create($data);

            DB::commit();

            $response = ['status' => 'success', 'data' => $result];

        }catch(Exception $e){
            DB::rollBack();
            $response = ['status' => 'error', 'data' => $e->getMessage()];
        }

        return $response;
    }

    public function update(array $data)
    {
        $response = [];

        try{

            DB::beginTransaction();

            $result = DB::table('sales')
                        ->where('id', $data['id'])
                        ->update(['id_plantation' => $data['id_plantation'],
                                'id_user' => $data['id_user'],
                                'quantity' => $data['quantity'],
                                'price' => $data['price'],
                                'description' => $data['description']]);

            DB::commit();

            $response = ['status' => 'success', 'data' => $result];

        }catch(Exception $e){
            DB::rollBack();
            $response = ['status' => 'error', 'data' => $e->getMessage()];
        }

        return $response;
    }

    public function destroy(array $data)
    {
        $response = [];

        try{

            DB::beginTransaction();

            $result = DB::table('sales')
                        ->where('id', $data['id'])
                        ->update(['status' => $data['status']]);

            DB::commit();

            $response = ['status' => 'success', 'data' => $result];

        }catch(Exception $e){
            DB::rollBack();
            $response = ['status' => 'error', 'data' => $e->getMessage()];
        }

        return $response;
    }

    public function receive(array $data)
    {
        $response = [];

        try{

            DB::beginTransaction();

            $result = DB::table('sales')
                        ->where('id', $data['id'])
                        ->update(['status' => $data['status']]);

            DB::commit();

            $response = ['status' => 'success', 'data' => $result];

        }catch(Exception $e){
            DB::rollBack();
            $response = ['status' => 'error', 'data' => $e->getMessage()];
        }

        return $response;
    }

    public function list()
    {
        $response = [];

        try{
            $return = DB::select( DB::raw("select sls.*, usr.name as client_name, spe.name as specie_name 
                                           from sales sls 
                                                join users usr on usr.id=sls.id_user 
                                                join plantations pla on pla.id=sls.id_plantation 
                                                join species spe on spe.id=pla.id_specie 
                                            where 
                                                sls.status != 'D' 
                                            order by sls.status, sls.created_at desc"));

            $response = ['status' => 'success', 'data' => $return];
        }catch(Exception $e){
            $response = ['status' => 'error', 'data' => $e->getMessage()];
        }

        return $response;
    }
    
    public function listByPlantation($id_plantation)
    {
        $response = [];

        try{
            $return = DB::select( DB::raw("select sls.*, usr.name as client_name, spe.name as specie_name 
                                           from sales sls 
                                                join users usr on usr.id=sls.id_user 
                                                join plantations pla on pla.id=sls.id_plantation 
                                                join species spe on spe.id=pla.id_specie 
                                            where 
                                                sls.status != 'D' 
                                            and sls.id_plantation = '".$id_plantation."' order by sls.status, sls.created_at desc"));

            $response = ['status' => 'success', 'data' => $return];
        }catch(Exception $e){
            $response = ['status' => 'error', 'data' => $e->getMessage()];
        }

        return $response;
    }
    
    public function listByClient($id_client)
    {
        $response = [];

        try{
            $return = DB::select( DB::raw("select sls.*, usr.name as client_name, spe.name as specie_name 
                                           from sales sls 
                                                join users usr on usr.id=sls.id_user 
                                                join plantations pla on pla.id=sls.id_plantation 
                                                join species spe on spe.id=pla.id_specie 
                                            where 
                                                sls.status != 'D' 
                                            and sls.id_user = '".$id_client."' order by sls.status, sls.created_at desc"));

            $response = ['status' => 'success', 'data' => $return];
        }catch(Exception $e){
            $response = ['status' => 'error', 'data' => $e->getMessage()];
        }

        return $response;
    }
}