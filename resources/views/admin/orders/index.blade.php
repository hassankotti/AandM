@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h3 class="page-title">
                        <i class="fa fa-shopping-cart"></i><span class="ml-2">{{ __('Orders') }}</span>
                    </h3>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary " href="{{ route('order') }}">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="list-group" id="list-tab" role="tablist">
                             @forelse ($orders as $index => $order)
                                <a class="list-group-item list-group-item-action {{ $index == 0 ? 'active' : '' }}" id="list-{{ $order->id }}-list" data-toggle="list" href="#list-{{ $order->id }}" role="tab" aria-controls="{{ $order->id }}">
                                    <div class="row">

                                        <div class="col-2"><small>#{{ $order->id }}</small></div>
                                        <div class="col-6">{{ $order->placed_by }}</div>
                                        <div class="col-4"><small>{{ number_format($order->total_amount,2,'.',',').' SDG' }}</small></div>
                                    </div>
                                </a>
                            @empty
                                <a class="list-group-item list-group-item-action active" id="list-no-data-list" data-toggle="list" href="#list-no-data" role="tab" aria-controls="no-data">
                                    <div class="row">
                                        <div class="col"># No order yet!</div>
                                    </div>
                                </a>
                            @endforelse
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="tab-content" id="nav-tabContent">
                            @forelse ($orders as $index => $order)
                                <div class="tab-pane fade show {{ $index == 0 ? 'active' : '' }} p-0" id="list-{{ $order->id }}" role="tabpanel" aria-labelledby="list-{{ $order->id }}-list">
                                    <table class="table table-light m-0">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @forelse ($ordersdetails as $index => $ordersdetail)
                                                @if($ordersdetail->order_id == $order->id)
                                                    <tr>
                                                        <td>{{ '#'.$ordersdetail->order_id.' '.App\Model\Product::find($ordersdetail->product_id)->name }}
                                                        </td>
                                                        <td>{{ $ordersdetail->quantity . 'X' }}</td>
                                                        <td>{{ App\Model\Product::find($ordersdetail->product_id)->price }}
                                                        </td>
                                                        <td>{{ $ordersdetail->sub_total.' SDG' }}</td>
                                                    </tr>
                                                @endif
                                            @empty
                                                <p> No Data</p>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            @empty
                                <div class="tab-pane fade show active" id="list-no-data" role="tabpanel" aria-labelledby="list-no-data-list">No data yet!</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
