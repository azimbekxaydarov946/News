<div>
    @php
        $name = 'name_' . app()->getLocale();
        $title = 'title_' . app()->getLocale();
        $sub_title = 'sub_title_' . app()->getLocale();
        // dd($news[0]->{$title});
    @endphp
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div style="margin-bottom: 2%;" class="blog_left_sidebar">
                        <form class="row g-3">
                            <div class="col-auto">
                                <select class="form-select" wire:model="paginate">
                                    <option value="all" selected>{{ __('main.all') }}</option>
                                    <option value="2">X2</option>
                                    <option value="6">X6</option>
                                    <option value="10">X10</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <select class="form-select" wire:model="sort">
                                    <option value="None" >{{ __('main.none') }}</option>
                                    <option value="desc">{{ __('main.new') }}</option>
                                    <option value="asc">{{ __('main.old') }}</option>>
                                </select>
                            </div>
                        </form>

                        {{-- <input type="text" wire:model="sort"> --}}

                    </div>
                    <div class="blog_left_sidebar">

                        @foreach ($news as $item)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="{{ asset('storage/' . $item->image) }}"
                                        alt="">
                                    <a href="{{ route('detail', ['id' => $item->id]) }}" class="blog_item_date"
                                        style="text-align: center">
                                        <h3>{{ date('j', strtotime($item->date)) }}</h3>
                                        <p>{{ date('F', strtotime($item->date)) }}</p>
                                        <p>{{ date('Y', strtotime($item->date)) }}</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="{{ route('detail', ['id' => $item->id]) }}">
                                        <h2>{{ $item->{$title} }}</h2>
                                    </a>
                                    <p>{{ $item->{$sub_title} }}</p>
                                    <ul class="blog-info-link">
                                        @if (isset($item->user->name))
                                            <li><a href="{{ route('detail', ['id' => $item->id]) }}"><i
                                                        class="fa fa-user"></i> {{ $item->user->name }}</a>
                                            </li>
                                        @endif
                                        <li><a href="{{ route('detail', ['id' => $item->id]) }}"><i
                                                    class="fa fa-comments"></i> {{ $item->comment_count }}
                                                {{ __('main.comments') }}</a></li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach
                        {{-- {{$news->links()}} --}}

                        @if ($news->lastPage() > 1)

                            <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Previous"
                                            wire:click="resetPage">
                                            <i class="ti-angle-left"></i>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $news->lastPage(); $i++)
                                        <li class="page-item">
                                            <a href="#" class="page-link"
                                                wire:click="gotoPage({{ $i }})">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Next" wire:click="nextPage">
                                            <i class="ti-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>

                        @endif

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">{{ __('main.category') }}</h4>
                            <ul class="list cat-list">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('home', ['id' => $category->{$name}]) }}" class="d-flex">
                                            <p>{{ $category->{$name} }}</p>
                                            <p>({{ $category->news_count }})</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title">{{ __('main.tags') }}</h4>
                            <ul class="list">
                                @foreach ($tags as $tag)
                                    <li>
                                        <a href="{{ route('home', ['id' => $tag->{$name}]) }}">{{ $tag->{$name} }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

</div>
