<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index(Request $request) 
    {
        return view('clients.index');
    }
    
    public function edit(Request $request)
    {
        return view('clients.save');
    }
    
    public function save(Request $request)
    {
        
    }
    
    public function filter(Request $request) 
    {
    }
    
    public function get(Request $request)
    {
        try {
            $formatPhone = \App\Suport\Utils::removePhoneMask($request->phone);
            $client = \App\Models\ClientsRegisters::where('phone', $formatPhone)->get();
            if (!$client) {
                return $this->successRequest('', []);
            }
            
            $address = \App\Models\ClientsAddress::where('client', $client->id)->limit(1)->orderByDesc('created_at')->get();
            if (!$address) {
                return $this->successRequest('', []);
            }
            
            $response['object_address'] = $address->getAttributes();
            return $this->successRequest('', $response);
        } catch(Exception $ex) {
            return $this->badRequest($ex->getMessage());
        }
    }
}
