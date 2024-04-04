<div class="tab-pane fade" id="account-info" role="tabpanel">
    <div class="myaccount-content">
        <h3 class="title">Account Details</h3>
        <div class="account-details-form">
            <form action="#">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-input-item mb-3">
                            <label for="first-name" class="required mb-1">First Name</label>
                            <input type="text" id="first-name" class="first_name" value="{{auth()->user()->first_name}}" name="first_name" placeholder="First Name" />
                            <span class="input-error error-first_name"></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-input-item mb-3">
                            <label for="last-name" class="required mb-1">Last Name</label>
                            <input type="text" id="last-name" class="last_name" value="{{auth()->user()->last_name}}" name="last_name" placeholder="Last Name" />
                            <span class="input-error error-last_name"></span>
                        </div>
                    </div>
                </div>
                <div class="single-input-item mb-3">
                    <label for="email" class="required mb-1">Email Addres</label>
                    <input type="email" id="email" class="email" name="email" value="{{auth()->user()->email}}" placeholder="Email Address" />
                    <span class="input-error error-email"></span>
                </div>
                <fieldset>
                    <legend>Password change</legend>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-input-item mb-3">
                                <label for="new-pwd" class="required mb-1">New Password</label>
                                <input type="password" class="password" name="password"  id="new-pwd" placeholder="New Password" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-input-item mb-3">
                                <label for="confirm-pwd" class="required mb-1">Confirm Password</label>
                                <input type="password" class="password_confirmation" name="password_confirmation"  id="confirm-pwd" placeholder="Confirm Password" />
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="single-input-item single-item-button">
                    <a class="btn btn btn-dark btn-hover-primary rounded-0"
                            data-url="{{route('frontend.profileUpdate')}}"
                            id="update_profile">Save Changes</a>
                </div>
            </form>
        </div>
    </div>
</div>
