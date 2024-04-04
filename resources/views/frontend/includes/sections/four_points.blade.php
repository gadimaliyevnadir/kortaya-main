<div class="section">
    <div class="container">
        <div class="feature-wrap">
            <div class="row row-cols-lg-4 row-cols-xl-auto row-cols-sm-2 row-cols-1 justify-content-between mb-n5">
                @foreach($settings_four as $setting_item)
                <div class="col mb-5" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature">
                        <div class="icon text-primary align-self-center">
                            <img src="{{$setting_item->first_image}}" alt="Feature Icon">
                        </div>
                        <div class="content">
                            <h5 class="title">{{translation($setting_item)->title}}</h5>
                            <p>{{translation($setting_item)->content}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

