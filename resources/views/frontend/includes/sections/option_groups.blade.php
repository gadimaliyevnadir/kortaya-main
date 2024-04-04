<li class="has-children position-static">
    <a href="">
        <span>SOLUTION</span>
    </a>
    <div class="menu_upmenu">
        <ul class="mega-menu row">
            <li class="d-flex gap-2 col-6 flex-wrap">
                @foreach($option_groups->take(4) as $option_group)
                <div class="">
                    <a href="#" class="mega-menu-title">{{translation($option_group)->name}}</a>
                    <ul class="mb-n2">
                        @foreach($option_group->options->take(10) as $option)
                        <li>
                            <a
                                href="{{route('frontend.searchPage',['option'=>$option->id])}}">{{translation($option)->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </li>
            <li class="col-6 row">
                @foreach($banners->where('banner_type',\App\Enums\BannerType::SOLUTION_BANNERS) as $banner)
             <a href="#">
             <img class="col-12 mb-1 img-height" src="{{$banner->first_image}}" alt="1JPG" />
             </a>
                @endforeach
            </li>
        </ul>
    </div>
</li>
