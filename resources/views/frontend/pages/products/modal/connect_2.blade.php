<div class="tab-pane fade" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
    <div class="product_tab_content  border p-3">
        <div class="single-review d-flex mb-4 flex-column gap-3">
            @foreach($product->reviews as $review)
                <div class="col-12 d-flex">
                    <div class="review_thumb">
                        <img alt="review images" src="{{asset('frontend/assets/images/review/1.jpg')}}">
                    </div>
                    <div class="review_details">
                        <div class="review_info mb-2">
                        <span class="ratings justify-content-start mb-3">
                            <span class="rating-wrap">
                                <span class="star" style="width: {{ 100 / 5 * $review->ratings_review_point}}%"></span></span>
                            <span class="rating-num"></span>
                        </span>
                            <div class="review-title-date d-flex">
                                <h5 class="title">{{$review->name}} - </h5><span>
                                {{translation_month($review->created_at)}}</span>
                            </div>
                        </div>
                        <p>{{$review->comment}}</p>
                    </div>
                </div>
            @endforeach
            @if($product->reviews->count() > 6)
                <div class="single-review-box_button">
                    <button class="single-review-button">Show More</button>
                </div>
            @endif
        </div>

        <div class="rating_wrap">
            <h5 class="rating-title mb-2">Add a review </h5>
            <p class="mb-2">Your email address will not be published. Required fields are marked
                *</p>
            <h6 class="rating-sub-title mb-2">Add Rating</h6>
            <span class="ratings review_stars justify-content-start mb-3">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <input class="ratings_review_point" type="hidden" value="0"/>
            </span>
        </div>
        <div class="comments-area comments-reply-area">
            <div class="row">
                <div class="col-lg-12 col-custom">

                    <form action="#" class="comment-form-area" id="contact-form-review">
                        <div class="row comment-input">

                            <div class="col-md-6 col-custom comment-form-author mb-3">
                                <label>Name <span class="required">*</span></label>
                                <input type="text" required="required" class="name" name="name">
                            </div>

                            <div class="col-md-6 col-custom comment-form-emai mb-3">
                                <label>Email <span class="required">*</span></label>
                                <input type="text" required="required" class="email" name="email">
                            </div>

                        </div>
                        <div class="comment-form-comment mb-3">
                            <label>Comment</label>
                            <textarea class="comment-notes comment" name="comment" required="required"></textarea>
                        </div>
                        <input type="hidden" required="required" class="product_id" value="{{$product->id}}"
                               name="product_id">

                        <div class="comment-form-submit">
                            <button class="btn btn-dark btn-hover-primary add_review_btn"
                                    data-url="{{route('frontend.reviewSendRequest')}}">Submit</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
