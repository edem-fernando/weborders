@extends('master.template')

@section('content')
    <div class="container my-5">
        <h1 class="fs-4 text-gray-200 mb-4">Informações do Pedido: #{{ $order->id }}</h1>
        
        <div class='row d-flex justify-content-between'>
            <div class='col-12 col-md-6 border p-3 g-2'>
                <h1 class="fs-6 text-gray-200">Detalhes do pedido</h1>

                <div class='table-responsive'>
                    <table class="table table-sm caption-top" style='height: 300px; overflow-y: auto;'>
                        <caption class="total_item">Total: R$ {{ number_format($order->total, 2, ',', '.') }}</caption>
                        <thead class="table-light">
                            <th class='fw-normal app_font_td'>Produto</th>
                            <th class='fw-normal app_font_td'>Categoria</th>
                            <th class='fw-normal app_font_td text-center'>Qtd</th>
                            <th class='fw-normal app_font_td'>Total</th>
                        </thead>

                        <tbody>
                            @if (!empty($order->list_products))
                                @foreach($order->list_products as $item)
                                    <tr>
                                        <td class='fw-normal app_font_td'>{{ $item->object_product->name }}</td>
                                        <td class='fw-normal app_font_td'>{{ $item->object_product->object_category->name }}</td>
                                        <td class='fw-normal app_font_td text-center'>{{ $item->quant }}</td>
                                        <td class='fw-normal app_font_td'>{{ 'R$' . number_format($item->price_sale * $item->quant, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            
            <form class="form_js row col-md-6 col-12 g-3 mt-2 border p-3" action="{{ route('app.orders.save', ['id' => $order->id]) }}" {{ $order->status == App\Enum\EnumStatusOrders::Send ? 'disabled' : '' }}>
                <div class='hidden'>@method('PUT')</div>
                <div class="col-md-6 col-12">
                    <label for='client' class="form-label app_font_td">Cliente:</label>
                    <input type="text" class="form-control form-control-sm app_font_td" id="client" value='{{ $order->object_client->name }}' disabled>
                </div>

                <div class="col-md-6 col-12">
                    <label for='phone' class="form-label app_font_td">Contato:</label>
                    <input type="text" class="form-control form-control-sm phone app_font_td" id="phone" value='{{ $order->object_client->phone }}' disabled>
                </div>

                <div class="col-md-12 col-12">
                    <label for='email' class="form-label app_font_td">Email:</label>
                    <input type="text" class="form-control form-control-sm app_font_td" id="email" value='{{ $order->object_client->email }}' disabled>
                </div>

                <div class="col-md-6 mt-3 col-12">
                    <label for="user_attendance" class="form-label app_font_td">Atendente: </label>
                    <select name='user_attendance' id='user_attendance' class="form-select form-select-sm app_font_td" {{ $order->status == App\Enum\EnumStatusOrders::Send ? 'disabled' : '' }}>
                        @if(!empty($listUsers))
                            @foreach($listUsers as $user)
                                <option value='{{ $user->id }}' {{ $user->id == $order->user_attendance ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="col-md-6 mt-3 col-12">
                    <label for="user_delivered" class="form-label app_font_td">Entregador: </label>
                    <select name='user_delivered' id='user_delivered' class="form-select form-select-sm app_font_td" {{ $order->status == App\Enum\EnumStatusOrders::Send ? 'disabled' : '' }}>
                        @if(!empty($listUsers))
                            @foreach($listUsers as $user)
                                <option value='{{ $user->id }}' {{ $user->id == $order->user_delivered ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                
                <div class="col-md-6 mt-3 col-12">
                    <label for='channel' class="form-label app_font_td">Canal: </label>
                    <select name='channel' id='channel' class="form-select form-select-sm app_font_td" {{ $order->status == App\Enum\EnumStatusOrders::Send ? 'disabled' : '' }}>
                        @if(!empty($listChannels))
                            @foreach($listChannels as $channel)
                                <option value='{{ $channel->id }}' {{ $channel->id == $order->channel ? 'selected' : '' }}>{{ $channel->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="col-md-6 mt-3 col-12">
                    <label for="status" class="form-label app_font_td">Situação: </label>
                    <select name='status' id='status' class="form-select form-select-sm app_font_td" {{ $order->status == App\Enum\EnumStatusOrders::Send ? 'disabled' : '' }}>
                        @if(!empty($listStatus))
                            @foreach($listStatus as $status)
                                <option value='{{ $status->id }}' {{ $status->id == $order->status ? 'selected' : '' }}>{{ $status->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="col-md-3 col-12">
                    <label for="created_at" class="form-label app_font_td">Solicitado em: </label>
                    <input type="datetime-local" class="form-control form-control-sm app_font_td" id="created_at" value='{{ $order->created_at }}' disabled>
                </div>

                <div class="col-md-3 col-12">
                    <label for="date_finalize" class="form-label app_font_td">Preparado em: </label>
                    <input type="datetime-local" class="form-control form-control-sm" name='date_finalize' id="date_finalize" value='{{ $order->date_finalize ? $order->date_finalize : '' }}' {{ $order->status == App\Enum\EnumStatusOrders::Send ? 'disabled' : '' }}>
                </div>

                <div class="col-md-3 col-12">
                    <label for="date_send" class="form-label app_font_td">Enviado em: </label>
                    <input type="datetime-local" class="form-control form-control-sm app_font_td" name='date_send' id="date_send" value='{{ $order->date_send ? $order->date_send : '' }}' {{ $order->status == App\Enum\EnumStatusOrders::Send ? 'disabled' : '' }}>
                </div>

                <div class="col-md-3 col-12">
                    <label for="date_delivered" class="form-label app_font_td">Entregue em: </label>
                    <input type="datetime-local" class="form-control form-control-sm app_font_td" name='date_delivered' id="date_delivered" value='{{ $order->date_delivered ? $order->date_delivered : '' }}' {{ $order->status == App\Enum\EnumStatusOrders::Send ? 'disabled' : '' }}>
                </div>
                
                <div class="col-md-12 col-12">
                    <label for="description" class="form-label app_font_td">Observação: </label>
                    <textarea class="form-control form-control-sm" id="description app_font_td" name='description' rows="3"  {{ $order->status == App\Enum\EnumStatusOrders::Send ? 'disabled' : '' }}>{{ $order->description }}</textarea>
                </div>

                <div class="col-md-3 mb-4 mt-3 col-12">
                    <button class='btn btn-sm btn-success' {{ $order->status == App\Enum\EnumStatusOrders::Send ? 'disabled' : '' }}>Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection()