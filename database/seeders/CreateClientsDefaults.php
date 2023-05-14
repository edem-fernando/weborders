<?php

namespace Database\Seeders;

use App\Models\ClientsRegisters;
use Illuminate\Database\Seeder;

class CreateClientsDefaults extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $client1 = new ClientsRegisters();
        $client1->name = 'Fátima Yasmin Melo';
        $client1->email = 'fatima.yasmin.melo@bemarius.com.br';
        $client1->phone = '55982515646';
        $client1->status = 1;
        $client1->genre = 2;
        $client1->save();
        
        $address1 = new \App\Models\ClientsAddress();
        $address1->client = $client1->id;
        $address1->zip_code = '69921737';
        $address1->city = 'Rio Branco';
        $address1->district = 'Tancredo Neves';
        $address1->street = 'Travessa Maracanã';
        $address1->number = '768';
        $address1->save();
        
        $client2 = new ClientsRegisters();
        $client2->name = 'Cauã Carlos da Rosa';
        $client2->email = 'caua-darosa93@ipmmi.org.br';
        $client2->phone = '67989129767';
        $client2->status = 1;
        $client2->genre = 1;
        $client2->save();
        
        $address2 = new \App\Models\ClientsAddress();
        $address2->client = $client2->id;
        $address2->zip_code = '38305074';
        $address2->city = 'Ituiutaba';
        $address2->district = 'Jerônimo Mendonça';
        $address2->street = 'Rua Aarão Alves de Oliveira';
        $address2->number = '600';
        $address2->save();
        
        $client3 = new ClientsRegisters();
        $client3->name = 'Aparecida Sabrina Caldeira';
        $client3->email = 'aparecida_caldeira@bcconsult.com.br';
        $client3->phone = '69991538549';
        $client3->genre = 1;
        $client3->status = 1;
        $client3->save();
        
        $address3 = new \App\Models\ClientsAddress();
        $address3->client = $client3->id;
        $address3->zip_code = '76907736';
        $address3->city = 'Ji-Paraná';
        $address3->district = 'Dom Bosco';
        $address3->street = 'Rua Porto Velho';
        $address3->number = '169';
        $address3->save();
    }
}
