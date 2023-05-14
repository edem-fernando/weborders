<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrdersRequests extends Model
{
    use HasFactory;
    
    protected $table = 'orders_requests';
    
    protected $fillable = [
        'client',
        'channel' ,
        'status',
        'location_delivered',
        'address',
        'user_attendance',
        'user_delivered',
        'total', 
        'discount',
        'description',
        'date_finalize',
        'date_send',
        'date_delivered'
    ];
    
    public function populateLookup()
    {
        $this->object_user_attendance = User::where('id', $this->user_attendance)->get()->first();
        $this->object_user_delivered = User::where('id', $this->user_delivered)->get()->first();
        $this->object_client = ClientsRegisters::where('id', $this->client)->get()->first();
        $this->object_address = ClientsAddress::where('id', $this->address)->get()->first();
        $this->object_status = OrdersStatus::where('id', $this->status)->get()->first();
        $this->object_channel = Channels::where('id', $this->channel)->get()->first();
        $this->url_edit = route('app.orders.edit', ['id' => $this->id]);
        $this->lookup_location = $this->location_delivered == 1 ? 'Entrega' : 'Local';
        $this->lookup_address = "{$this->object_address->street} {$this->object_address->number}";
        $this->created_at_fmt = date('d/m/Y H:i:s', strtotime($this->created_at));
        $this->total_fmt = 'R$' . number_format($this->total, 2, ',', '.');
    }
    
    public function populateList()
    {
        $this->list_products = OrdersItems::where('order', $this->id)->get();
        
        foreach ($this->list_products as $item) {
            $item->populateLookup();
        }
    }
    
    public static function getOrders(object $filter)
    {
        $sql = "SELECT * FROM orders_requests WHERE 1 = 1 ";
            
        if (!empty($filter->date_ini) && !empty($filter->date_end)) {
            $dateIni = new \DateTime($filter->date_ini);
            $dateEnd = new \DateTime($filter->date_end);

            $sql .= sprintf(" and created_at between '%s' and '%s' ", 
                            $dateIni->format('Ymd'), 
                            $dateEnd->format('Ymd'));
        }

        if (!empty($filter->status)) {
            $sql .= sprintf(" and status = %s ", $filter->status);
        }
        
        $sql .= ' ORDER BY created_at DESC';

        $orders = \Illuminate\Support\Facades\DB::select($sql);
        $response = [];
        
        if (!empty($orders)) {
            foreach ($orders as $key => $order) {
                $objOrder = new OrdersRequests();
                $objOrder->id = $order->id;
                $objOrder->created_at = date('Y-m-d H:i:s', strtotime($order->created_at));
                $objOrder->fill((array)$order);
                $objOrder->populateLookup();
                array_push($response, $objOrder);
            }
        }
        
        return $response;
    }

    public function setDateFinalizeAttribute($value) 
    {
        $this->attributes['date_finalize'] = !empty($value) ? \App\Suport\Utils::convertToDateTime($value) : null;
    }
    
    public function setDateSendAttribute($value) 
    {
        $this->attributes['date_send'] = !empty($value) ? \App\Suport\Utils::convertToDateTime($value): null;
    }
    
    public function setDateDeliveredAttribute($value) 
    {
        $this->attributes['date_delivered'] = !empty($value) ? \App\Suport\Utils::convertToDateTime($value): null;
    }
}
