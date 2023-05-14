<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CreateOrdersRequestsDefaults extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order1 = new \App\Models\OrdersRequests();
        $order2 = new \App\Models\OrdersRequests();
        $order3 = new \App\Models\OrdersRequests();
        $order4 = new \App\Models\OrdersRequests();
        
        $order1->client = 1;
        $order1->channel = 1;
        $order1->status = 4;
        $order1->location_delivered = 1;
        $order1->user_attendance = 2;
        $order1->user_delivered = 1;
        $order1->address = 1;
        $order1->total = 16.9;
        $order1->discount = 0;
        $order1->date_finalize = '2023-05-14 19:00:20';
        $order1->date_send = '2023-05-14 19:20:00';
        $order1->date_delivered = '2023-05-14 19:45:00';
        $order1->save();
        
        $order11 = new \App\Models\OrdersItems();
        $order11->order = $order1->id;
        $order11->product = 1;
        $order11->quant = 2;
        $order11->price_sale = 8.45;
        $order11->price_cost = 4.00;
        $order11->save();

        $order2->client = 1;
        $order2->channel = 1;
        $order2->status = 4;
        $order2->location_delivered = 1;
        $order2->user_attendance = 2;
        $order2->user_delivered = 1;
        $order2->address = 1;
        $order2->total = 74.90;
        $order2->discount = 0;
        $order2->date_finalize = '2023-05-14 19:00:20';
        $order2->date_send = '2023-05-14 19:20:00';
        $order2->date_delivered = '2023-05-14 19:45:00';
        $order2->save();
        
        $order21 = new \App\Models\OrdersItems();
        $order21->order = $order2->id;
        $order21->product = 1;
        $order21->quant = 2;
        $order21->price_sale = 8.45;
        $order21->price_cost = 4.00;
        $order21->save();
        
        $order22 = new \App\Models\OrdersItems();
        $order22->order = $order2->id;
        $order22->product = 2;
        $order22->quant = 2;
        $order22->price_sale = 12.00;
        $order22->price_cost = 6.00;
        $order22->save();
        
        $order23 = new \App\Models\OrdersItems();
        $order23->order = $order2->id;
        $order23->product = 3;
        $order23->quant = 1;
        $order23->price_sale = 17.00;
        $order23->price_cost = 9.00;
        $order23->save();
        
        $order3->client = 2;
        $order3->channel = 1;
        $order3->status = 4;
        $order3->location_delivered = 1;
        $order3->user_attendance = 2;
        $order3->user_delivered = 1;
        $order3->total = 36.00;
        $order3->address = 2;
        $order3->discount = 0;
        $order3->date_finalize = '2023-05-14 19:00:20';
        $order3->date_send = '2023-05-14 19:20:00';
        $order3->date_delivered = '2023-05-14 19:45:00';
        $order3->save();
        
        $order31 = new \App\Models\OrdersItems();
        $order31->order = $order3->id;
        $order31->product = 2;
        $order31->quant = 3;
        $order31->price_sale = 12.00;
        $order31->price_cost = 6.00;
        $order31->save();
        
        $order4->client = 3;
        $order4->channel = 1;
        $order4->status = 4;
        $order4->location_delivered = 1;
        $order4->user_attendance = 2;
        $order4->address = 3;
        $order4->user_delivered = 1;
        $order4->total = 12.00;
        $order4->discount = 0;
        $order4->date_finalize = '2023-05-14 19:00:20';
        $order4->date_send = '2023-05-14 19:20:00';
        $order4->date_delivered = '2023-05-14 19:45:00';
        $order4->save();
        
        $order41 = new \App\Models\OrdersItems();
        $order41->order = $order4->id;
        $order41->product = 2;
        $order41->quant = 1;
        $order41->price_sale = 12.00;
        $order41->price_cost = 6.00;
        $order41->save();
    }
}
