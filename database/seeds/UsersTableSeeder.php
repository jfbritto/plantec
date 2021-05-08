<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_company' => 1,
                'name' => 'João Filipi',
                'email' => 'jf.britto@hotmail.com',
                'password' => '$2y$10$MERsmHSH/CSZE73uJP4UauxslHssbmmFRdW9yePX0oSABX98HPFny',
                'group' => 1,
                'status' => 'A',
                'birth' => NULL,
                'rg' => NULL,
                'cpf' => NULL,
                'civil_status' => NULL,
                'profession' => NULL,
                'address' => NULL,
                'address_number' => NULL,
                'complement' => NULL,
                'city' => NULL,
                'neighborhood' => NULL,
                'uf' => NULL,
                'zip_code' => NULL,
                'created_at' => '2021-04-13 23:38:51',
                'updated_at' => '2021-04-13 23:38:51',
            )
        ));
    }
}
