<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CreateStatusOrdersDefaults extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status1 = new \App\Models\OrdersStatus();
        $status2 = new \App\Models\OrdersStatus();
        $status3 = new \App\Models\OrdersStatus();
        $status4 = new \App\Models\OrdersStatus();
        $status5 = new \App\Models\OrdersStatus();
        
        $status1->name = 'Solicitado';
        $status2->name = 'Preparação';
        $status3->name = 'Em trânsito';
        $status4->name = 'Entregue';
        $status5->name = 'Cancelado';
        
        $status1->save();
        $status2->save();
        $status3->save();
        $status4->save();
        $status5->save();        
    }
}
