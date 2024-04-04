<div class="container order_history_active_check" data-assign="active">

    <div class="row">
        <div class="col-12">
            <!-- Cart Table Start -->
            <div class="cart-table table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Company name</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="pro-quantity">Address</th>
                        <th class="pro-subtotal">Total</th>
                        <th class="pro-remove">Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr class="basket_content_body">
                            <td>{{$order->company_name}}</td>
                            <td>{{$order->getStatus()}}</td>
                            <td> {{$order->created_at->format('M d, Y')}}</td>
                            <td> {{$order->address_name}}</td>
                            <td class="pro-subtotal"><span>${{$order->total_amount}}</span></td>
                            <td class="pro-remove"><a href="#" class="delete_order_button"
                                                      data-url="{{route('frontend.deleteOrder',['order'=>$order->id])}}"><i
                                        class="pe-7s-trash"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Asaqidaki commenteriya hecne olmayanda gorsensin -->
    <!-- <div class="order_history_empty">
                        <img class="order_history_empty_img"
                            src="{{asset('frontend/assets/images/order_tracking/info.svg')}}" alt="history" />
                        <p class="order_history_empty_text">There is no order history.</p>
                    </div> -->

</div>
