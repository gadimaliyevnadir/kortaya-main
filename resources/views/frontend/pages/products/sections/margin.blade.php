<div class="row section-margin">
    <div class="col-lg-12 col-custom single-product-tab">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active text-uppercase" id="home-tab" data-bs-toggle="tab"
                   href="#connect-1" role="tab" aria-selected="true">Description</a>
            </li>
            @if($review_status)
                <li class="nav-item">
                    <a class="nav-link text-uppercase" id="profile-tab" data-bs-toggle="tab" href="#connect-2"
                       role="tab" aria-selected="false">Reviews</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link text-uppercase" id="contact-tab" data-bs-toggle="tab" href="#connect-3"
                   role="tab" aria-selected="false">Shipping Policy</a>
            </li>
        </ul>
        <div class="tab-content mb-text" id="myTabContent">
            @include('frontend.pages.products.modal.connect_1')
            @if($review_status)
                @include('frontend.pages.products.modal.connect_2')
            @endif
            @include('frontend.pages.products.modal.connect_3')
        </div>
    </div>
</div>
