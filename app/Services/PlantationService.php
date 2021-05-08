<?php

namespace App\Services;

use App\Models\Plantation;
use DB;
use Exception;

class PlantationService
{
    public function store(array $data)
    {
        $response = [];

        try{

            DB::beginTransaction();

            $result = Plantation::create($data);

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

            $result = DB::table('plantations')
                        ->where('id', $data['id'])
                        ->update(['id_specie' => $data['id_specie'],
                                  'quantity' => $data['quantity'],
                                  'start_time' => $data['start_time'],
                                  'end_time' => $data['end_time'],
                                  'description' => $data['description']
                                ]);

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

            $result = DB::table('plantations')
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
            $return = DB::select( DB::raw("select pla.*, spe.name as specie_name from plantations pla join species spe on spe.id=pla.id_specie where pla.status = 'A' order by pla.status, pla.end_time desc"));

            $response = ['status' => 'success', 'data' => $return];
        }catch(Exception $e){
            $response = ['status' => 'error', 'data' => $e->getMessage()];
        }

        return $response;
    }
}