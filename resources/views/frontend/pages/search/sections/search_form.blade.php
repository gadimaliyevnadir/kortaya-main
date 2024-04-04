<div class="col-lg-3 col-12 col-custom">
    <aside class="sidebar_widget mt-10 mt-lg-0">
        <div class="widget_inner" data-aos="fade-up" data-aos-delay="200">
            <div class="widget-list mb-10">
                <h3 class="widget-title mb-4">Search</h3>
                <div class="search-box">
                    <form action="{{route('frontend.searchPage')}}" class="search-form">
                        <input type="text" class="form-control" name="search"
                               value="{{!is_array(request()->get('search')) ? request()->get('search') : ''}}"
                               placeholder="Search Our Store" aria-label="Search Our Store">

                    </form>
                    <button class="btn btn-dark btn-hover-primary" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="widget-list mb-10">
                <h3 class="widget-title mb-4">Menu Categories</h3>
                <nav>
                    <ul class="category-menu mb-n3">
                        @foreach($categories->whereNull('parent_id') as $category)
                            <li class="menu-item-has-children pb-4">
                                <a href="#">{{translation($category)->name}} <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown">
                                    @if($category->subCategories->count() > 0)
                                        @foreach($category->subCategories as $category_sub)
                                            <li><a href="#">{{translation($category_sub)->name}}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="widget-list mb-10">
                <h3 class="widget-title mb-5">Price Filter</h3>
                <form action="#">
                    <div id="slider-range"></div>
                    <button class="slider-range-submit" type="submit">Filter</button>
                    <input class="slider-range-amount" type="text" name="text" id="amount"/>
                </form>
            </div>
            <div class="widget-list mb-10">
                <h3 class="widget-title mb-4">Tags</h3>
                <div class="sidebar-body">
                    <ul class="tags mb-n2">
                        <li><a href="#">Men</a></li>
                        <li><a href="#">Women</a></li>
                        <li><a href="#">Fashion</a></li>
                        <li><a href="#">Watch</a></li>
                        <li><a href="#">Handmade</a></li>
                        <li><a href="#">Lather</a></li>
                        <li><a href="#">Fabrics</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
</div>
