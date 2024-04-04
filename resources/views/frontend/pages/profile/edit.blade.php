@extends('frontend.layouts.master')
@section('header')
@include('frontend.includes.header')
@endsection
@section('content')
    <div class="section section-margin">
        <div class="container">
            <div class="row mb-n10 justify-content-center">
                <div class="col-12 m-auto m-lg-0 pb-10">
                    <div class="register-wrapper">
                        <div class="section-content text-center mb-5">
                            <h2 class="title mb-2">Update Account</h2>
                        </div>
                        <div class="register-wrapper-item mb-5">
                            <div
                                class="border-bottom-own register-wrapper-item-head d-flex align-items-center justify-content-between">
                                <h5 class="fs-5 m-0">Personal Information</h5>
                                <div class="required_wrapped_register">
                                    <span class="text-primary">*</span> Required Fields
                                </div>
                            </div>
                            <div class="register-wrapper-text m-auto">
                                <div class="w-100 row register-body-item mx-auto">
                                    <div
                                        class="register-body-item-title col-3 d-flex align-items-center justify-content-start">
                                        Email <span class="text-primary">*</span></div>
                                    <div
                                        class="register-body-item-input col-9 d-flex align-items-start gap-3 justify-content-start flex-column">
                                        <input type="email"
                                               value="{{ auth()->user()->email}}"
                                               class="special_register_input email" name="email"/>
                                        <span class="input-error error-email"></span>
                                    </div>
                                </div>
                                <div class="w-100 row register-body-item mx-auto">
                                    <div
                                        class="register-body-item-title col-3 d-flex align-items-center justify-content-start">
                                        Password <span class="text-primary">*</span></div>
                                    <div
                                        class="register-body-item-input col-9 d-flex align-items-start gap-3 justify-content-start flex-column">
                                        <input type="password" name="password" class="special_register_input password" />
                                        <span>[A combination of at least three of the following: Upper and lowercase
                                            letters/numbers/special characters (8 to 16 characters)]</span>
                                        <span class="input-error error-password"></span>
                                    </div>
                                </div>
                                <div class="w-100 row register-body-item mx-auto">
                                    <div
                                        class="register-body-item-title col-3 d-flex align-items-center justify-content-start">
                                        Confirm Password <span class="text-primary">*</span></div>
                                    <div
                                        class="register-body-item-input col-9 d-flex align-items-start gap-3 justify-content-start flex-column">
                                        <input type="password" class="special_register_input password_confirmation" name="password_confirmation"/>
                                        <span class="input-error error-password"></span>
                                    </div>
                                </div>
                                <div class="w-100 row register-body-item mx-auto">
                                    <div
                                        class="register-body-item-title col-3 d-flex align-items-center justify-content-start">
                                        ID <span class="text-primary">*</span></div>
                                    <div
                                        class="register-body-item-input col-9 d-flex align-items-start gap-3 justify-content-start flex-column">
                                        <input type="text" name="id_user"
                                               value="{{ auth()->user()->info->id_two}}"
                                               class="special_register_input id_user"/>
                                        <span class="input-error error-id_user"></span>
                                    </div>
                                </div>
                                <div class="w-100 row register-body-item mx-auto">
                                    <div
                                        class="register-body-item-title col-3 d-flex align-items-center justify-content-start">
                                        Name <span class="text-primary">*</span></div>
                                    <div
                                        class="register-body-item-input col-9 flex-column flex-md-row d-flex align-items-start gap-3 justify-content-start">
                                        <input type="text" name="first_name"
                                               value="{{ auth()->user()->first_name}}"
                                               class="special_register_input first_name" placeholder="First name"/>
                                        <span class="input-error error-first_name"></span>
                                        <input type="text" name="last_name"
                                               value="{{ auth()->user()->last_name}}"
                                               class="special_register_input last_name" placeholder="Last name"/>
                                        <span class="input-error error-last_name"></span>
                                    </div>
                                </div>
                                <div class="w-100 row register-body-item mx-auto">
                                    <div
                                        class="register-body-item-title col-3 d-flex align-items-center justify-content-start">
                                        English Name <span class="text-primary">*</span></div>
                                    <div
                                        class="register-body-item-input col-9 flex-column flex-md-row d-flex align-items-start gap-3 justify-content-start">
                                        <input type="text" name="english_first_name"
                                               value="{{ auth()->user()->info->english_first_name}}"
                                               class="special_register_input english_first_name" placeholder="First name"/>
                                        <span class="input-error error-english_first_name"></span>
                                        <input type="text" name="english_last_name"
                                               value="{{ auth()->user()->info->english_last_name}}"
                                               class="special_register_input english_last_name" placeholder="Last name"/>
                                        <span class="input-error error-english_last_name"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="register-wrapper-item pt-5">
                            <div
                                class="border-bottom-own register-wrapper-item-head d-flex align-items-center justify-content-between">
                                <h5 class="fs-5 m-0">Additional Information</h5>
                            </div>
                            <div class="register-wrapper-text m-auto">
                                <div class="w-100 row register-body-item mx-auto">
                                    <div
                                        class="register-body-item-title col-3 d-flex align-items-center justify-content-start">
                                        Nickname
                                    </div>
                                    <div
                                        class="register-body-item-input col-9 d-flex align-items-start gap-3 justify-content-start flex-column">
                                        <input type="text"
                                               value="{{auth()->user()->info->nickname}}"
                                               name="nickname" class="special_register_input nickname"/>
                                        <span class="input-error error-nickname"></span>
                                    </div>
                                </div>
                                <div class="w-100 row register-body-item mx-auto">
                                    <div
                                        class="register-body-item-title col-3 d-flex align-items-center justify-content-start">
                                        Gender
                                    </div>
                                    <div
                                        class="register-body-item-input col-9 d-flex align-items-start gap-5 justify-content-start">
                                        <div class="d-flex align-items-center gap-2 cursor-pointer">
                                            <input name="register_gender" type="radio"
                                                   @if(auth()->user()->info->gender == 'male') checked @endif
                                                   value="male"
                                                   class="cursor-pointer m-0 form-check-input" id="gender_register"/>
                                            <label for="gender_register" class="cursor-pointer">Male</label>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 cursor-pointer">
                                            <input name="register_gender" type="radio"
                                                   @if(auth()->user()->info->gender == 'female') checked @endif
                                                   value="female"
                                                   class="cursor-pointer m-0 form-check-input"
                                                   id="gender_register_second"/>
                                            <label for="gender_register_second" class="cursor-pointer">FeMale</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 row register-body-item mx-auto">
                                    <div
                                        class="register-body-item-title col-3 d-flex align-items-center justify-content-start">
                                        Date of Birth
                                    </div>
                                    <div
                                        class="register-body-item-input col-9 d-flex align-items-center gap-3 justify-content-start">
                                        <input type="text" maxlength="2"
                                               value="{{substr(auth()->user()->info->date_of_birth_day, 0, 2) }}"
                                               name="date_of_birth_day" class="special_register_input date_of_birth_day"/> /
                                        <input type="text" maxlength="2"
                                               value="{{substr(auth()->user()->info->date_of_birth_day, 2, 2) }}"
                                               name="date_of_birth_month" class="special_register_input date_of_birth_month"/> /
                                        <input type="text" maxlength="4"
                                               value="{{substr(auth()->user()->info->date_of_birth_day, -4) }}"
                                               name="date_of_birth_year" class="special_register_input date_of_birth_year"/>
                                    </div>
                                    <span class="input-error error-date_of_birth_day"></span>
                                    <span class="input-error error-date_of_birth_month"></span>
                                    <span class="input-error error-date_of_birth_year"></span>
                                </div>
                                <div class="w-100 row register-body-item mx-auto">
                                    <div
                                        class="register-body-item-title col-3 d-flex align-items-center justify-content-start">
                                        Anniversary
                                    </div>
                                    <div
                                        class="register-body-item-input col-9 d-flex align-items-center gap-3 justify-content-start">
                                        <input type="text" maxlength="2"
                                               value="{{substr(auth()->user()->info->date_of_anniversary_day, 0, 2) }}"
                                               name="date_of_anniversary_day" class="special_register_input date_of_anniversary_day"/> /
                                        <input type="text" maxlength="2"
                                               value="{{substr(auth()->user()->info->date_of_anniversary_day, 2, 2) }}"
                                               name="date_of_anniversary_month" class="special_register_input date_of_anniversary_month"/> /
                                        <input type="text" maxlength="4"
                                               value="{{substr(auth()->user()->info->date_of_anniversary_day, -4) }}"
                                               name="date_of_anniversary_year" class="special_register_input date_of_anniversary_year"/>
                                    </div>
                                    <span class="input-error error-date_of_anniversary_day"></span>
                                    <span class="input-error error-date_of_anniversary_month"></span>
                                    <span class="input-error error-date_of_anniversary_year"></span>
                                </div>
                                <div class="w-100 row register-body-item mx-auto">
                                    <div
                                        class="register-body-item-title col-3 d-flex align-items-center justify-content-start">
                                        How did you get to our site? <span class="text-primary">*</span></div>
                                    <div
                                        class="register-body-item-input col-9 d-flex align-items-start gap-5 justify-content-start flex-wrap">
                                        <div class="d-flex align-items-center gap-2 cursor-pointer">
                                            <input name="get_our_site" type="radio"
                                                   class="cursor-pointer m-0 form-check-input" value="Google" id="get_our_site0"/>
                                            <label for="get_our_site0" class="cursor-pointer">Google</label>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 cursor-pointer">
                                            <input name="get_our_site" type="radio"
                                                   class="cursor-pointer m-0 form-check-input get_our_site" value="Facebook"  id="get_our_site1"/>
                                            <label for="get_our_site1" class="cursor-pointer">Facebook</label>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 cursor-pointer">
                                            <input name="get_our_site" type="radio"
                                                   class="cursor-pointer m-0 form-check-input get_our_site" value="Tiktok" id="get_our_site2"/>
                                            <label for="get_our_site2" class="cursor-pointer">Tiktok</label>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 cursor-pointer">
                                            <input name="get_our_site" type="radio"
                                                   class="cursor-pointer m-0 form-check-input get_our_site" value="Youtube" id="get_our_site3"/>
                                            <label for="get_our_site3" class="cursor-pointer">Youtube</label>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 cursor-pointer">
                                            <input name="get_our_site" type="radio"
                                                   class="cursor-pointer m-0 form-check-input get_our_site" value="Reddit" id="get_our_site4"/>
                                            <label for="get_our_site4" class="cursor-pointer">Reddit </label>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 cursor-pointer">
                                            <input name="get_our_site" type="radio"
                                                   class="cursor-pointer m-0 form-check-input get_our_site" value="Snapchat" id="get_our_site5"/>
                                            <label for="get_our_site5" class="cursor-pointer">Snapchat  </label>
                                        </div>

                                        <div class="d-flex align-items-center gap-2 cursor-pointer">
                                            <input name="get_our_site" type="radio"
                                                   class="cursor-pointer m-0 form-check-input get_our_site" value="Twitter" id="get_our_site6"/>
                                            <label for="get_our_site6" class="cursor-pointer">Twitter   </label>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 cursor-pointer">
                                            <input name="get_our_site" type="radio"
                                                   class="cursor-pointer m-0 form-check-input get_our_site" value="Friend" id="get_our_site7"/>
                                            <label for="get_our_site7" class="cursor-pointer">Friend   </label>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 cursor-pointer">
                                            <input name="get_our_site" type="radio"
                                                   class="cursor-pointer m-0 form-check-input get_our_site" value="Other" id="get_our_site8"/>
                                            <label for="get_our_site8" class="cursor-pointer">Other  </label>
                                        </div>
                                        <span class="input-error error-get_our_site"></span>
                                    </div>
                                </div>
                                <div class="register-wrapper-text m-auto">
                                    <div class="w-100 row register-body-item mx-auto">
                                        <div
                                            class="register-body-item-title col-3 d-flex align-items-center justify-content-start">
                                            Referrer
                                        </div>
                                        <div
                                            class="register-body-item-input col-9 d-md-flex align-items-start gap-3 justify-content-start flex-column">
                                            <input type="text"
                                                   value="{{auth()->user()->info->referrer}}"
                                                   name="referrer" class="special_register_input referrer"/>
                                            <span class="input-error error-referrer"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="single-input-item mb-3 d-flex justify-content-center align-items-center mt-3">
                            <button class="btn btn btn-dark btn-hover-primary rounded-0"
                                    data-url="{{route('frontend.profileUpdate')}}"
                                    id="update_profile">Register
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script src="{{asset('main/auth/profile.js')}}"></script>
@endsection
