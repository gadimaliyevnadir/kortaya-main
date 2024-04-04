<div class="order_tracking_date_box" data-assign="failed">

    <form action="{{ route('frontend.orderTracking',['type'=>'failed']) }}" method="post">
        @csrf
        <div class="order_tracking_date_box_div">
            <ul class="order_tracking_time_duration">
                <li class="order_tracking_time_duration_item">
                    <a class="order_tracking_time_duration_link data_change_input_failed"
                       data-date="{{\Illuminate\Support\Carbon::parse(now())->format('d.m.Y')}}">
                        Today
                    </a>
                </li>
                <li class="order_tracking_time_duration_item">
                    <a class="order_tracking_time_duration_link data_change_input_failed"
                       data-date="{{\Illuminate\Support\Carbon::parse(now()->subMonths(1))->format('d.m.Y')}}">
                        1 Month
                    </a>
                </li>
                <li class="order_tracking_time_duration_item">
                    <a class="order_tracking_time_duration_link data_change_input_failed"
                       data-date="{{\Illuminate\Support\Carbon::parse(now()->subMonths(3))->format('d.m.Y')}}">
                        3 Month
                    </a>
                </li>
                <li class="order_tracking_time_duration_item">
                    <a class="order_tracking_time_duration_link data_change_input_failed"
                       data-date="{{\Illuminate\Support\Carbon::parse(now()->subMonths(6))->format('d.m.Y')}}">
                        6 Month
                    </a>
                </li>
            </ul>
            <div class="order_tracking_date">
                <div class="order_tracking_date_item">
                    <input type="text" id="simple" name="from" class="order_tracking_date_class data_change_input_failed_value"/>
                    <label for="simple">
                        <img src="{{asset('frontend/assets/images/order_tracking/calendar-icon.svg')}}"
                             alt="calendar"/>
                    </label>
                </div>
                <span class="extension_date">
                        ~
                    </span>
                <div class="order_tracking_date_item">
                    <input type="text" id="simple2" name="to" class="order_tracking_date_class" />
                           <!-- value="{{\Illuminate\Support\Carbon::parse(now())->format('d.m.Y')}}"> -->
                    <label for="simple2">
                        <img src="{{asset('frontend/assets/images/order_tracking/calendar-icon.svg')}}"
                             alt="calendar"/>
                    </label>
                </div>
            </div>
            <button class="order_tracking_btn " type="submit" >
                <a >Go</a>
            </button>
        </div>
        <ul class="order_tracking_date_info">
            <li class="order_tracking_date_info_item">
                By default, results are shown for the past three months. You can also view the order history
                of
                orders that have been fulfilled over the past 36 months by adjusting the date range.
            </li>
            <li class="order_tracking_date_info_item">
                You can check order history of orders that have been fulfilled over 36 months ago in <a
                    href="#">[Archived
                    Orders]</a> tab.
            </li>
        </ul>
    </form>
</div>
