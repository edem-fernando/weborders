<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdersStatus;
use App\Models\OrdersRequests;
use App\Models\User;
use App\Models\Channels;
use App\Exceptions\NotFoundException;
use Exception;

class OrdersController extends Controller
{
    public function index(Request $request) 
    {
        $dateNow = new \DateTime('now');
        $date = new \DateTime("{$dateNow->format('Y')}-{$dateNow->format('m')}-01");
        $dateIni = new \DateTime("{$dateNow->format('Y')}-{$dateNow->format('m')}-01");
        $dateEnd = new \DateTime($date->add(new \DateInterval('P30D'))->format('Y-m-d'));
        
        $orders = OrdersRequests::whereBetween('created_at', [
            $dateIni->format('Ymd'),
            $dateEnd->format('Ymd')
        ])->orderByDesc('created_at')->get();
        
        foreach ($orders as $order) {
            $order->populateLookup();
        }
        
        return view('app.orders.index', [
            'listStatus' => OrdersStatus::all(),
            'listOrders' => $orders
        ]);
    }
    
    public function edit(int $id, Request $request)
    {   
        $order = OrdersRequests::where('id', $id)->get()->first();
        if (!$order) {
            return redirect('/app');
        }
        
        $order->populateLookup();
        $order->populateList();
        
        return view('app.orders.edit', [
            'order' => $order,
            'listStatus' => OrdersStatus::all(),
            'listUsers' => User::all(),
            'listChannels' => Channels::where('active', 1)->get()
        ]);
    }
    
    public function save(int $id, Request $request)
    {
        try {
            $order = OrdersRequests::find($id);
            if (!$order) {
                throw new NotFoundException("Não foi possível localizar o pedido com id: {$id}");
            }
            
            $order->fill((array)$request->all());
            if (!$order->save()) {
                throw new Excetpion("Não foi possível atualizar. Por favor verifique os dados!");
            }
            
            $response['reload'] = true;
            $response['object_order'] = $order->getAttributes();
            return $this->successRequest('Pedido atualizado com sucesso!', $response);
        } catch (NotFoundException $ex) {
            return $this->notFoundRequest($ex->getMessage());
        } catch (Exception $ex) {
            return $this->badRequest($ex->getMessage());
        }
    }
    
    public function filter(Request $request) 
    {
        try {
            if (!$request->status && !$request->date_ini && !$request->date_end) {
                throw new Exception("Para filtrar informe: Data de Início e  Data de Fim ou Situação do pedido");
            }
            
            $list = OrdersRequests::getOrders((object)$request->all());
            $response['list_orders'] = $list;
            return $this->successRequest('', $response);
        } catch (NotFoundException $ex) {
            return $this->notFoundRequest($ex->getMessage());
        } catch (Exception $ex) {
            return $this->badRequest($ex->getMessage());
        }
    }
}
