<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Proprietário',
                'last_name' => 'Proprietário',
                'function' => 'P',
                'telephone' => '+551111111111',
                'cell_phone' => '+5511111111111',
                'email' => 'proprietario@teste.com.br',
                'gender' => 'M',
                'birthday' => '11/11/1111',
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Morador',
                'last_name' => 'Morador',
                'function' => 'M',
                'telephone' => '+551111111111',
                'cell_phone' => '+5511111111111',
                'email' => 'morador@teste.com.br',
                'gender' => 'M',
                'birthday' => '11/11/1111',
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Morador2',
                'last_name' => 'Morador2',
                'function' => 'M',
                'telephone' => '+551111111111',
                'cell_phone' => '+5511111111111',
                'email' => 'morador2@teste.com.br',
                'gender' => 'M',
                'birthday' => '11/11/1111',
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Prestador',
                'last_name' => 'Serviço',
                'function' => 'S',
                'telephone' => '+551111111111',
                'cell_phone' => '+5511111111111',
                'email' => 'prestadorservico@teste.com.br',
                'gender' => 'M',
                'birthday' => '11/11/1111',
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Teste 1',
                'last_name' => '',
                'function' => 'M',
                'telephone' => '+551111111111',
                'cell_phone' => '+5511111111111',
                'email' => 'teste1@teste.com.br',
                'gender' => 'M',
                'birthday' => '11/11/1111',
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Teste 2',
                'last_name' => '',
                'function' => 'M',
                'telephone' => '+551111111111',
                'cell_phone' => '+5511111111111',
                'email' => 'teste2@teste.com.br',
                'gender' => 'M',
                'birthday' => '11/11/1111',
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Teste 3',
                'last_name' => '',
                'function' => 'M',
                'telephone' => '+551111111111',
                'cell_phone' => '+5511111111111',
                'email' => 'teste3@teste.com.br',
                'gender' => 'M',
                'birthday' => '11/11/1111',
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Teste 4',
                'last_name' => '',
                'function' => 'M',
                'telephone' => '+551111111111',
                'cell_phone' => '+5511111111111',
                'email' => 'teste4@teste.com.br',
                'gender' => 'M',
                'birthday' => '11/11/1111',
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Teste 5',
                'last_name' => '',
                'function' => 'M',
                'telephone' => '+551111111111',
                'cell_phone' => '+5511111111111',
                'email' => 'teste5@teste.com.br',
                'gender' => 'M',
                'birthday' => '11/11/1111',
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Teste 6',
                'last_name' => '',
                'function' => 'M',
                'telephone' => '+551111111111',
                'cell_phone' => '+5511111111111',
                'email' => 'teste6@teste.com.br',
                'gender' => 'M',
                'birthday' => '11/11/1111',
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
