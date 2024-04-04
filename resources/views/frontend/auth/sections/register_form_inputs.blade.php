<div class="col-12 m-auto m-lg-0 pb-10 pl-0 pr-0">
    <div class="register-wrapper">
        <div class="section-content text-center mb-5">
            <h2 class="title mb-2">Create Account</h2>
        </div>
        @include('frontend.auth.sections.personal_information')
        @include('frontend.auth.sections.additional_information')
        @include('frontend.auth.sections.agree_all_information')
            <div class="single-input-item mb-3 d-flex justify-content-center align-items-center mt-3">
                <button class="btn btn btn-hover-primary rounded-0 join_btn"
                        data-url="{{route('frontend.register')}}"
                        id="register_btn">Join
                </button>
            </div>
    </div>
</div>
