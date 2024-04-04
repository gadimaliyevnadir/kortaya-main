<div class="tab-pane fade" id="address-edit" role="tabpanel">
    <h3 class="title">Billing Address</h3>
    <div class="myaccount-table table-responsive text-center">
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>Address</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach(auth()->user()->addresses as $address)
                <tr>
                    <td>{{$address->content}}</td>
                    <td><a  data-url="{{route('frontend.deleteAddress',['address'=>$address])}}"
                           class="btn btn btn-dark btn-hover-primary btn-sm rounded-0 delete_address">delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


        <div class="adress_input single-input-item single-item-button d-flex gap-3 justify-content-center">
            <input type="text" class="new_address" name="new_address" required  placeholder="New address" />
            <a class="btn btn btn-dark btn-hover-primary rounded-0"
               data-url="{{route('frontend.newAddress')}}" id="add_address">add addres</a>
        </div>

    </div>

</div>
