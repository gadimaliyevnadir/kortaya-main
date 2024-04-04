<li class="has-children position-static">
    <a href="#"><span>BRANDS</span> 
    <ul class="dropdown">
        <div id="containerLetter" class="containerLetter">
            <div class="contentLetter" id="contentLetter">
                <p class="letterMobile">A</p>
                <p class="letterMobile">B</p>
                <p class="letterMobile">C</p>
                <p class="letterMobile">D</p>
                <p class="letterMobile">E</p>
                <p class="letterMobile">F</p>
                <p class="letterMobile">G</p>
                <p class="letterMobile">H</p>
                <p class="letterMobile">I</p>
                <p class="letterMobile">J</p>
                <p class="letterMobile">K</p>
                <p class="letterMobile">L</p>
                <p class="letterMobile">M</p>
                <p class="letterMobile">N</p>
                <p class="letterMobile">O</p>
                <p class="letterMobile">P</p>
                <p class="letterMobile">Q</p>
                <p class="letterMobile">R</p>
                <p class="letterMobile">S</p>
                <p class="letterMobile">T</p>
                <p class="letterMobile">U</p>
                <p class="letterMobile">V</p>
                <p class="letterMobile">W</p>
                <p class="letterMobile">X</p>
                <p class="letterMobile">Y</p>
                <p class="letterMobile">Z</p>
                <p class="letterMobile">0-9</p>
                <p class="letterMobile">ETC</p>
            </div>
        </div>
        <div class="mobileBrands">
            <div class="letterMobileBox">
                {!! alphabet($brands, 'aA', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'bB', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'cC', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'dD', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'eE', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'fF', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'gG', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'iI', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'jJ', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'kK', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'lL', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'mM', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'nN', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'oO', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'pP', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'qQ', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'rR', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'sS', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'tT', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'uU', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'vV', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'wW', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'xX', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'yY', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, 'zZ', true) !!}
            </div>
            <div class="letterMobileBox">
                {!! alphabet($brands, '0123456789', true) !!}
            </div>
            <div class="letterMobileBox">
            </div>
        </div>
    </ul>
</li>
<li class="has-children position-static">
    <a href="#"><span>SOLUTION</span> 
    <ul class="dropdown">
        @foreach($option_groups->take(4) as $option_group)
            <li class="has-children position-static mb-2">
                <a class="d-flex w-100 justify-content-between align-items-center"
                   href="#"><span>{{translation($option_group)->name}}</span>
                   
                @foreach($option_group->options->take(10) as $option)
                    <ul class="dropdown second_dropdown_own">
                        <li>
                            <a href="{{route('frontend.searchPage', ['option' => $option->id])}}">{{translation($option)->name}}</a>
                        </li>
                    </ul>
                @endforeach
            </li>

        @endforeach
        <div class="swiper_mobile_container_box" data-href="swiper_mobile_1" data-index="0">
            <div class="swiper_mobile">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/1.jpg')}}" alt="slider"/>
                    </div>
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/1.jpg')}}" alt="slider"/>
                    </div>
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/2.jpg')}}" alt="slider"/>
                    </div>
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/3.jpg')}}" alt="slider"/>
                    </div>
                </div>
            </div>
        </div>
    </ul>
</li>
<li class="has-children position-static">
    <a href="#"><span>SKINCARE</span> 
    <ul class="dropdown">
        @foreach($categories->where('code', 'skincare')->first()->subCategories->take(4) as $subCategory)
            <li class="has-children position-static mb-2">
                <a class="d-flex w-100 justify-content-between align-items-center"
                   href="#"><span>{{translation($subCategory)->name}}</span>
                    
                @foreach($subCategory->subCategories->take(5) as $subItem)
                    <ul class="dropdown second_dropdown_own">
                        <li><a
                                href="{{route('frontend.searchPage', ['category' => $subItem->id])}}">{{translation($subItem)->name}}</a>
                        </li>
                    </ul>
                @endforeach
            </li>
        @endforeach
            <div class="swiper_mobile_container_box" data-href="swiper_mobile_1" data-index="1">
                <div class="swiper_mobile">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" data-swiper-autoplay="1000">
                            <img src="{{asset('frontend/assets/images/test/mobile/1.jpg')}}" alt="slider"/>
                        </div>
                        <div class="swiper-slide" data-swiper-autoplay="1000">
                            <img src="{{asset('frontend/assets/images/test/mobile/1.jpg')}}" alt="slider"/>
                        </div>
                        <div class="swiper-slide" data-swiper-autoplay="1000">
                            <img src="{{asset('frontend/assets/images/test/mobile/2.jpg')}}" alt="slider"/>
                        </div>
                        <div class="swiper-slide" data-swiper-autoplay="1000">
                            <img src="{{asset('frontend/assets/images/test/mobile/3.jpg')}}" alt="slider"/>
                        </div>
                    </div>
                </div>
            </div>
    </ul>
</li>
<li class="has-children position-static">
    <a href="#"><span>MAKEUP & ACCESSORY</span> 
    <ul class="dropdown">
        @foreach($categories->whereIn('code', ['makeup', 'accessory'])->first()->subCategories->take(4) as $subCategory)
            <li class="has-children position-static mb-2">
                <a class="d-flex w-100 justify-content-between align-items-center"
                   href="#"><span>{{translation($subCategory)->name}}</span>
                    
                @foreach($subCategory->subCategories->take(5) as $subItem)
                    <ul class="dropdown second_dropdown_own">
                        <li><a
                                href="{{route('frontend.searchPage', ['category' => $subItem->id])}}">{{translation($subItem)->name}}</a>
                        </li>
                    </ul>
                @endforeach
            </li>
        @endforeach
        <div class="swiper_mobile_container_box" data-href="swiper_mobile_1" data-index="2">
            <div class="swiper_mobile">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/1.jpg')}}" alt="slider"/>
                    </div>
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/1.jpg')}}" alt="slider"/>
                    </div>
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/2.jpg')}}" alt="slider"/>
                    </div>
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/3.jpg')}}" alt="slider"/>
                    </div>
                </div>
            </div>
        </div>
    </ul>
</li>
<li class="has-children position-static">
    <a href="#"><span>HAIR & BODY</span> 
    <ul class="dropdown">
        @foreach($categories->whereIn('code', ['hair', 'body'])->first()->subCategories->take(2) as $subCategory)
            <li class="has-children position-static mb-2">
                <a class="d-flex w-100 justify-content-between align-items-center"
                   href="#"><span>{{translation($subCategory)->name}}</span>
                    
                @foreach($subCategory->subCategories->take(5) as $subItem)
                    <ul class="dropdown second_dropdown_own">
                        <li><a
                                href="{{route('frontend.searchPage', ['category' => $subItem->id])}}">{{translation($subItem)->name}}</a>
                        </li>
                    </ul>
                @endforeach
            </li>
        @endforeach
        <div class="swiper_mobile_container_box" data-href="swiper_mobile_2" data-index="0">
            <div class="swiper_mobile_second">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/1.jpg')}}" alt="slider"/>
                    </div>
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/1.jpg')}}" alt="slider"/>
                    </div>
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/2.jpg')}}" alt="slider"/>
                    </div>
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/3.jpg')}}" alt="slider"/>
                    </div>
                </div>
            </div>
            <!-- <div class="slick_mobile_second">
                <div>
                    <img src="{{asset('frontend/assets/images/test/mobile/mobile2.jpg')}}" alt="slider"/>
                </div>
                <div>
                    <img src="{{asset('frontend/assets/images/test/mobile/mobile2-1.jpg')}}" alt="slider"/>
                </div>
                <div>
                    <img src="{{asset('frontend/assets/images/test/mobile/mobile2.jpg')}}" alt="slider"/>
                </div>
                <div>
                    <img src="{{asset('frontend/assets/images/test/mobile/mobile2-1.jpg')}}" alt="slider"/>
                </div>
            </div>     -->
        </div>
    </ul>
</li>
<li class="has-children position-static">
    <a href="#"><span>SALE</span> 
    <ul class="dropdown">
        @foreach($campaigns->take(4) as $campaign)
            <li class="position-static">
                <a class="d-flex w-100 justify-content-between align-items-center" href="#">{{translation($campaign)->name}}</a>
            </li>
        @endforeach
        <div class="swiper_mobile_container_box" data-href="swiper_mobile_2" data-index="1">
            <div class="swiper_mobile_second">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/1.jpg')}}" alt="slider"/>
                    </div>
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/1.jpg')}}" alt="slider"/>
                    </div>
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/2.jpg')}}" alt="slider"/>
                    </div>
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/3.jpg')}}" alt="slider"/>
                    </div>
                </div>
            </div>
            <!-- <div class="slick_mobile_second">
                <div>
                    <img src="{{asset('frontend/assets/images/test/mobile/mobile2.jpg')}}" alt="slider"/>
                </div>
                <div>
                    <img src="{{asset('frontend/assets/images/test/mobile/mobile2-1.jpg')}}" alt="slider"/>
                </div>
                <div>
                    <img src="{{asset('frontend/assets/images/test/mobile/mobile2.jpg')}}" alt="slider"/>
                </div>
                <div>
                    <img src="{{asset('frontend/assets/images/test/mobile/mobile2-1.jpg')}}" alt="slider"/>
                </div>
            </div>  -->
        </div>
    </ul>
</li>
<li class="has-children position-static">
    <a href="#"><span>ETC</span> 
    <ul class="dropdown">
        <li class="has-children position-static mb-2">
            <a class="d-flex w-100 justify-content-between align-items-center" href="#"><span>CUSTOMER</span>
                
            <ul class="dropdown second_dropdown_own">
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Delivery Guide & Precautions</a></li>
            </ul>
        </li>
        <div class="swiper_mobile_container_box" data-href="swiper_mobile_2" data-index="2">
            <div class="swiper_mobile_second">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/1.jpg')}}" alt="slider"/>
                    </div>
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/1.jpg')}}" alt="slider"/>
                    </div>
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/2.jpg')}}" alt="slider"/>
                    </div>
                    <div class="swiper-slide" data-swiper-autoplay="1000">
                        <img src="{{asset('frontend/assets/images/test/mobile/3.jpg')}}" alt="slider"/>
                    </div>
                </div>
            </div>
            <!-- <div class="slick_mobile_second">
                <div>
                    <img src="{{asset('frontend/assets/images/test/mobile/mobile2.jpg')}}" alt="slider"/>
                </div>
                <div>
                    <img src="{{asset('frontend/assets/images/test/mobile/mobile2-1.jpg')}}" alt="slider"/>
                </div>
                <div>
                    <img src="{{asset('frontend/assets/images/test/mobile/mobile2.jpg')}}" alt="slider"/>
                </div>
                <div>
                    <img src="{{asset('frontend/assets/images/test/mobile/mobile2-1.jpg')}}" alt="slider"/>
                </div>
            </div>  -->
        </div>
    </ul>
</li>