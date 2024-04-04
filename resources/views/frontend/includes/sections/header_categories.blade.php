<li class="has-children position-static">
    <a href="">
        <span>{{translation($categories->where('code','skincare')->first())->name}}</span>
    </a>
    <div class="menu_upmenu">
        <ul class="mega-menu row">
            <li class="d-flex gap-2 col-6 flex-wrap">
                @foreach($categories->where('code','skincare')->first()->subCategories->take(4) as $subCategory)
                    <div class="">
                        <a href="#" class="mega-menu-title">{{translation($subCategory)->name}}</a>
                        <ul class="mb-n2">
                            @foreach($subCategory->subCategories->take(5) as $subItem)
                                <li>
                                    <a
                                        href="{{route('frontend.searchPage',['category'=>$subItem->id])}}">{{translation($subItem)->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </li>
            <li class="col-6 row">
                @foreach($banners->where('banner_type',\App\Enums\BannerType::SKINCARE_BANNERS) as $banner)
                 <a href="#">
                 <img class="col-12 mb-1 img-height"
                         src="{{$banner->first_image}}" alt="1JPG"/>
                 </a>
                @endforeach
            </li>
        </ul>
    </div>
</li>
<li class="has-children position-static">
    <a href="">
        <span>{{translation($categories->where('code','makeup')->first())->name}} & {{translation($categories->where('code','accessory')->first())->name}}</span>
    </a>
    <div class="menu_upmenu">
        <ul class="mega-menu row">
            <li class="d-flex gap-2 col-6 flex-wrap">
                @foreach($categories->whereIn('code',['makeup','accessory'])->first()->subCategories->take(4) as $subCategory)
                    <div class="">
                        <a href="#" class="mega-menu-title">{{translation($subCategory)->name}}</a>
                        <ul class="mb-n2">
                            @foreach($subCategory->subCategories->take(5) as $subItem)
                                <li>
                                    <a
                                        href="{{route('frontend.searchPage',['category'=>$subItem->id])}}">{{translation($subItem)->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </li>
            <li class="col-6 row">
                @foreach($banners->where('banner_type',\App\Enums\BannerType::MAKEUP_ACCESSORY_BANNERS) as $banner)
                  <a href="#">
                  <img class="col-12 mb-1 img-height"
                         src="{{$banner->first_image}}" alt="1JPG"/>
                  </a>
                @endforeach
            </li>
        </ul>
    </div>
</li>
<li class="has-children position-static">
    <a href="#">
        <span>{{translation($categories->where('code','hair')->first())->name}} & {{translation($categories->where('code','body')->first())->name}}</span>
    </a>
    <div class="menu_upmenu">
        <ul class="mega-menu row">
            <li class="d-flex gap-3 col-4 flex-wrap">
                @foreach($categories->whereIn('code',['hair','body'])->first()->subCategories->take(2) as $subCategory)
                    <div class="col-5">
                        <a href="#" class="mega-menu-title">{{translation($subCategory)->name}}</a>
                        <ul class="mb-n2">
                            @foreach($subCategory->subCategories->take(3) as $subItem)
                                <li>
                                    <a
                                        href="{{route('frontend.searchPage',['category'=>$subItem->id])}}">{{translation($subItem)->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </li>
            <li class="col-8 row flex-nowrap gap-1">
                @foreach($banners->where('banner_type',\App\Enums\BannerType::HAIR_BODY_BANNERS) as $banner)
              <a href="#" class="col-4">
              <img class="mb-1 img-height2"
                         src="{{$banner->first_image}}" alt="1JPG"/>
              </a>
                @endforeach
            </li>
        </ul>
    </div>
</li>
