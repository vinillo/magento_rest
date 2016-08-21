<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Order Status</h1>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Order status: <b>{{$order->status }}</b>
                    </h3>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <div class="list-group">

                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">
                             Bestelde Item(s)
                            </h4>
                                <ul class="list-group-item-text">
                                @foreach ($order->items as $item)
                               <li>{{$item->qty_ordered}}x <b>{{$item->name}}</b> - SKU {{$item->sku}} </li>
                                @endforeach
                            </ul>

                        </div>

                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">
                                Payment Method
                            </h4>
                            <p class="list-group-item-text">
                                   <span class="label label-info">{{$order->payment->method}}</span>
                            </p>
                        </div>
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">
                              Order Costs:
                            </h4>
                            <p class="list-group-item-text">
                            <ul class="list-group-item-text">

                                <li><b>Grand Total inc. shipping:</b> {{$order->order_currency_code.' '.number_format((float)$order->base_grand_total, 2, '.', '')}}</li>

                            </ul>

                            </p>
                        </div>

                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">
                                Billing Adres
                            </h4>
                            <ul class="list-group-item-text">
                                <li><b>Firstname</b> {{$order->billing_address->firstname}}</li>
                                <li><b>Lastname</b> {{$order->billing_address->lastname}}</li>
                                <li><b>Street</b> {{$order->billing_address->street[0]}}</li>
                                <li><b>City</b> {{$order->billing_address->city}}</li>
                                <li><b>Postcode</b> {{$order->billing_address->postcode}}</li>
                                <li><b>Region</b> {{$order->billing_address->region}}</li>
                                <li><b>Country</b> {{$order->billing_address->country_id}}</li>
                                <li><b>Telephone</b> {{$order->billing_address->telephone}}</li>
                                <li><b>Email</b> {{$order->billing_address->email}}</li>
                            </ul>
                        </div>
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">
                                Shipment Details
                            </h4>
                            <h5>Shipment send to:</h5>
                            <ul class="list-group-item-text">
                                @foreach($order->extension_attributes->shipping_assignments as $ship)
                                <li><b>Firstname</b> {{$ship->shipping->address->firstname}}</li>
                                <li><b>Lastname</b> {{$ship->shipping->address->lastname}}</li>
                                <li><b>Street</b> {{$ship->shipping->address->street[0]}}</li>
                                <li><b>City</b> {{$ship->shipping->address->city}}</li>
                                <li><b>Postcode</b> {{$ship->shipping->address->postcode}}</li>
                                <li><b>Region</b> {{$ship->shipping->address->region}}</li>
                                <li><b>Country</b> {{$ship->shipping->address->country_id}}</li>
                                <li><b>Telephone</b> {{$ship->shipping->address->telephone}}</li>
                                <li><b>Email</b> {{$ship->shipping->address->email}}</li>
                                        <hr />
                                @endforeach
                            </ul>
                        </div>

                        <div id="reload" class="list-group-item">
                            <h4 class="list-group-item-heading">
                                Shipping Carrier Details
                            </h4>
                            <h5>Current tracking # are listed here:</h5>
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6"><a href="#" data-id="{{$order->entity_id }}" id="track-entity-id" class="btn btn-warning track">Add Track & Trace #</a>
                                </div>
                            </div>
                            <div id='csrf_token' style="display: none" data-id="{{ csrf_token() }}"></div>
                            {{--*/ $i = 0 /*--}}
                            @foreach($shipments->items as $ship)

                                @foreach($ship->tracks as $track)
                                    @if($order->entity_id === $ship->entity_id)
                                        <ul class="list-group-item-text add-track">
                                            <li><b>Track & Trace code</b> <a href="#"><span
                                                            class="label label-success">{{$track->track_number or 'undefined' }}</span></a>
                                            </li>
                                            <li><b>Carrier Title</b> {{$track->title or 'undefined' }}</li>
                                            <li><b>Created at</b> {{$track->created_at or 'undefined' }}</li>
                                        </ul>
                                        <hr>
                                        {{--*/ $i++ /*--}}
                                    @endif
                                @endforeach
                            @endforeach
                            @if($i === 0)
                                <ul class="list-unstyled add-track">
                                    <li class="remove-track"><h5 class="label label-danger">No Current Tracking # Found</h5></li>
                                    <li class="list-unstyled remove-track"><br></li>
                                </ul>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>