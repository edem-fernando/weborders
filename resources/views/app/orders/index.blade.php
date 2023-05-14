@extends('master.template')

@section('content')

<div class="container my-5">
    <h1 class="fs-4 text-gray-200">Esteira de pedidos</h1>

    <form class="row g-3 mt-3 border p-3 form_js_filter" target='#table_orders' action='{{ route('app.orders.filter') }}'>
        <div class='hidden'>@method('POST')</div>
        <div class="col-md-2">
            <label for="date_ini" class="form-label app_font_td">Data de Início:</label>
            <input type="date" class="form-control form-control-sm" id="date_ini" name="date_ini">
        </div>

        <div class="col-md-2">
            <label for="date_end" class="form-label app_font_td">Data de Fim:</label>
            <input type="date" class="form-control form-control-sm" id="date_end" name="date_end">
        </div>

        <div class="col-md-4">
            <label for="status" class="form-label app_font_td">Situação do pedido:</label>
            <select id="status" name='status' class="form-select form-select-sm">
                <option selected disabled value='null'></option>
                @if(!empty($listStatus))
                    @foreach ($listStatus as $status)
                        <option value="{{ $status['id'] }}"> {{ $status['name'] }} </option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-sm">Filtrar</button>
        </div>
    </form>
    
    <div class='table-responsive my-5'>
        <table class="table table-sm caption-top" id='table_orders'>
            <caption>Esteira de pedidos</caption>
            <thead class="table-light">
                <th class='fw-normal app_font_td'>#</th>
                <th class='fw-normal app_font_td'>Cliente</th>
                <th class='fw-normal app_font_td'>Celular</th>
                <th class='fw-normal app_font_td'>Local de retirada</th>
                <th class='fw-normal app_font_td'>Endereço</th>
                <th class='fw-normal app_font_td'>Total</th>
                <th class='fw-normal app_font_td'>Data</th>
                <th class='fw-normal app_font_td'>Canal</th>
                <th class='fw-normal app_font_td text-center'>Status</th>
                <th></th>
            </thead>

            <tbody class='tbody'>
                @if (!empty($listOrders))
                    @foreach($listOrders as $order)
                        <tr>
                            <td class='fw-normal app_font_td'>{{ $order->id }}</td>
                            <td class='fw-normal app_font_td'>{{ \App\Suport\Utils::limitWords($order->object_client->name, 3) }}</td>
                            <td class='fw-normal app_font_td phone'>{{ $order->object_client->phone }}</td>
                            <td class='fw-normal app_font_td text-center'>{{ $order->lookup_location }}</td>
                            <td class='fw-normal app_font_td'>{{ $order->lookup_address }}</td>
                            <td class='fw-normal app_font_td'>{{ $order->total_fmt }}</td>
                            <td class='fw-normal app_font_td'>{{ $order->created_at_fmt }}</td>
                            <td class='fw-normal app_font_td'>{{ $order->object_channel->name }}</td>
                            <td class='fw-normal app_font_td'>{{ $order->object_status->name }}</td>
                            <td class='fw-normal'><a href="{{ $order->url_edit }}" class='btn-sm btn-success'>Visualizar</a></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection()