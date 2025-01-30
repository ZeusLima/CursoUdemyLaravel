<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     // create multiple users
    public function run(): void
    {

        DB::table('notes')->insert(

            [
                [
                    'user_id'   =>'3',
                    'title'     =>'USUARIO 3',
                    'text'      =>'Texto user id 3 com titutlo usuario 3 testestestes',
                    'created_at'=>date('Y-m-d H:i:s')
                ],
                [
                    'user_id'   =>'2',
                    'title'     =>'USUARIO 2',
                    'text'      =>'Texto user id 3 com titutlo usuario 3 testestestes',
                    'created_at'=>date('Y-m-d H:i:s')
                ],
                [
                    'user_id'   =>'3',
                    'title'     =>'USUARIO 3 DE NOVO',
                    'text'      =>'SEGUNDO Texto user id 3 com titutlo usuario 3 testestestes',
                    'created_at'=>date('Y-m-d H:i:s')
                ],
                [
                    'user_id'   =>'4',
                    'title'     =>'USUARIO 4',
                    'text'      =>'Texto user id 4 com titutlo usuario 4 testestestes',
                    'created_at'=>date('Y-m-d H:i:s')
                ],
                [
                    'user_id'   =>'2',
                    'title'     =>'USUARIO 2',
                    'text'      =>'SEGUNDO Texto user id 4 com titutlo usuario 4 testestestes',
                    'created_at'=>date('Y-m-d H:i:s')
                ],

            ]

        );

    }
}
