<div class="tab-pane fade" id="orders" role="tabpanel">
    <div class="myaccount-content">
        <h3 class="title">Orders</h3>
        <div class="myaccount-table table-responsive text-center">
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>Order</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total</th>
{{--                    <th>Action</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach(auth()->user()->orders as $index=>$order)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td> {{$order->created_at->format('M d, Y')}}</td>
                    <td>{{$order->getStatus()}}</td>
                    <td>{{$order->total_amount}}</td>
{{--                    <td><a href=""--}}
{{--                           class="btn btn btn-dark btn-hover-primary btn-sm rounded-0">View</a>--}}
{{--                    </td>--}}
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
