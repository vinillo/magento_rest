@extends('layout.main')
@section('content')
<div class="container inner-middle">
    <h2>Magento REST v2 API</h2>
    <p class="lead">
        with Bootstrap!
    </p>

    <div class="alert alert-info">
        <h4>Orders</h4>
        <p>Orders are retrieved from Magento's REST API & listed here</p>
        <p>You can view & manage shipment tracking.</p>
    </div>

    <hr />
    <div class="method">
        <div class="row margin-0 list-header hidden-sm hidden-xs">
            <div class="col-md-2"><div class="header">Bestelling #</div></div>
            <div class="col-md-2"><div class="header">Status</div></div>
            <div class="col-md-2"><div class="header">Totaal</div></div>
            <div class="col-md-2"><div class="header">Klant</div></div>
            <div class="col-md-4"><div class="header">Controls</div></div>
        </div>
       @foreach ($orders->items as $order)
        <div id="detail-box-{{$order->entity_id}}" class="modal" style="display:none;">
            @include('api.detail')
        </div>
            <div class="row margin-0">
                <div class="col-md-2">
                    <div class="cell">
                            #{{$order->increment_id}}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="cell">
                        {{$order->status}}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="cell">
                        {{number_format((float)$order->total_invoiced, 2, '.', '')}} {{$order->order_currency_code}}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="cell">
                        {{$order->customer_lastname }} {{$order->customer_firstname }}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="cell">
                        <a href="#detail-box-{{$order->entity_id}}" rel="modal:open" class="btn btn-warning">Details</a>
                    </div>
                </div>
            </div>

       @endforeach
    </div>
</div>
@endsection

