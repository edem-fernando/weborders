<?php

namespace App\Http\Controllers;

use App\Enum\EnumTypeMessage;
use App\Exceptions\NotFoundException;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClientsRegisters;
use App\Models\ClientsAddress;
use App\Models\OrdersRequests;
use App\Models\OrdersItems;

class WebController extends Controller
{
    
    public function welcome(Request $request)
    {
        return view('web.welcome');
    }

    public function login(Request $request)
    {
        if (auth()->check() && auth()->user()) {
            return redirect('/app');
        }
        
        return view('web.login');
    }

    public function attempt(Request $request)
    {
        try {
            if (!$this->checkLogin($request->login, $request->password)) {
                throw new Exception($this->message()->text());
            }

            $response['redirect'] = route('app.home');
            return $this->successRequest('Login realizado com sucesso', $response);
        } catch(Exception $ex) {
            return $this->badRequest($ex->getMessage());
        }
    }
    
    public function createOrder(Request $request) 
    {
        try {
            if (!$request['client']['name'] || !$request['client']['phone'] || !$request['address']['city'] || 
                !$request['address']['district']|| !$request['address']['street'] || !$request['address']['number']) {
                throw new Exception("Antes de finalizar o pedido verifique os campos obrigatórios (*)!");
            }
            
            $client = ClientsRegisters::where('phone', \App\Suport\Utils::removePhoneMask($request['client']['phone']))->get()->first();
            
            if (!$client) {
                $client = new ClientsRegisters();
                $client->name = $request['client']['name'];
                $client->phone = $request['client']['phone'];
                $client->status = 1;
                $client->save();
            }
            
            $address = new ClientsAddress();
            $address->client = $client->id;
            $address->fill($request['address']);
            $address->save();
            
            $order = new OrdersRequests();
            $order->client = $client->id;
            $order->address = $address->id;
            $order->channel = 1;
            $order->status = \App\Enum\EnumStatusOrders::Request;
            $order->location_delivered = 1;
            $order->discount = 0.00;
            
            $itens = [];

            if (!empty($request['list_itens'])) {                
                foreach ($request['list_itens'] as $product) {
                    if ($product['quant'] == 0) {
                        continue;
                    }
                    
                    $order->total += $product['price_sale'] * $product['quant'];
                    
                    $item = new OrdersItems();
                    $item->product = $product['id'];
                    $item->fill($product);
                    array_push($itens, $item);
                }
            }
            
            if (!$itens) {
                throw new Exception("Adicione ao menos um item ao pedido para finalizar a sua compra!");
            }
            
            $order->save();
            
            foreach ($itens as $item) {
                $item->order = $order->id;
                $item->save();
            }
            
            $response['alert_success'] = 'Ficamos muito feliz em poder te atender. O seu pedido foi realizado com sucesso. Nosso tempo de espera é de no máximo 45 minutos';
            return $this->successRequest('', $response);
        } catch(Exception $ex) {
            return $this->badRequest($ex->getMessage());
        }
    }

    public function checkLogin(string $login, string $password): bool
    {
        try {
            if (!$login || !$password) {
                throw new Exception('Para realizar o login informe a matrícula e a senha de acesso!');
            }

            $user = User::where('login', $login)->get()->first();
            if (!$user) {
                throw new NotFoundException("Não foi possível localizar o usuário com matrícula igual a {$login}!");
            }

            $credentials = [ 'login' => $login, 'password' => $password ];
            if (!Auth::attempt($credentials))  {
                throw new Exception('Não foi possível relizar o login verifique os dados!');
            }

            return true;
        } 
        catch(Exception $ex) {
            $this->message()->render($ex->getMessage(), EnumTypeMessage::Error);
            return false;
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
