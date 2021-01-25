@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h3 class="page-title"><i class="fa fa-shopping-cart"></i><span class="ml-2">{{ __('Orders') }}</span>
                    </h3>
                    <div class="container">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                <strong>Message!</strong><br><br>
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="pull-right">
                    <form class="inline-form row">
                        <a class="btn btn-primary col-3 mr-2" href="{{ route('orders.create') }}"> New</a>
                        <input type="text" class="form-control col-6" placeholder="search...">
                        <button type="submit" class="btn btn-default col-2"><span class="fa fa-search"></span>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Order
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        @forelse ($orders as $order)
                                            <a class="nav-link " id="v-pills-{{ $order->id }}-tab" data-toggle="pill"
                                                href="#v-pills-{{ $order->id }}" role="tab"
                                                aria-controls="v-pills-{{ $order->id }}" aria-selected="true">
                                                <div class="row">

                                                    <div class="col-2"><small>#{{ $order->id }}</small></div>
                                                    <div class="col-6">{{ $order->placed_by }}</div>
                                                    <div class="col-4"><small>${{ $order->total_amount }}</small></div>
                                                </div>
                                            </a>
                                        @empty
                                            <a class="nav-link " id="v-pills-no-data-tab" data-toggle="pill"
                                                href="#v-pills-no-data" role="tab" aria-controls="v-pills-no-data"
                                                aria-selected="true">
                                                <div class="row">
                                                    <div class="col"># No order yet!</div>
                                                </div>
                                            </a>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Order Details
                                    </div>
                                </div>
                                <div class="card-body">
                                    @forelse ($ordersdetails as $ordersdetail)
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show " id="v-pills-{{ $ordersdetail->order_id }}"
                                                role="tabpanel" aria-labelledby="v-pills-{{ $ordersdetail->order_id }}-tab">
                                                <table class="table table-light">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Qty</th>
                                                            <th>Price</th>
                                                            <th>Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ App\Model\Product::find($ordersdetail->product_id)->name }}
                                                            </td>
                                                            <td>{{ $ordersdetail->quantity . 'X' }}</td>
                                                            <td>{{ App\Model\Product::find($ordersdetail->product_id)->price }}
                                                            </td>
                                                            <td>{{ '$' . $ordersdetail->sub_total }}</td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show " id="v-pills-no-data-tab" role="tabpanel"
                                                aria-labelledby="v-pills-no-data-tab-tab">
                                                <div class="row">{{ $ordersdetail->sub_total }}</div>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    {{-- $orders->links() --}}
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
