<div>
    @php
        $name = 'name_' . app()->getLocale();
        $title = 'title_' . app()->getLocale();
        $sub_title = 'sub_title_' . app()->getLocale();
        $description = 'description_' . app()->getLocale();
        // dd($news);
    @endphp
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">

                    <div class="single-post">

                        <div class="feature-img">
                            <img class="img-fluid" src="{{ asset('images\\' . $details->image) }}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>
                                {{ $details->{$title} }}
                            </h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="fa fa-user"></i> {{ $details->user->name }}</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i>{{ $details->comment_count }}
                                        {{ __('main.comments') }}</a></li>

                                {{-- @foreach ($details->tag as $tag) --}}
                                <li>
                                    <a
                                        href="{{ route('home', ['id' => $details->tag->{$name}]) }}">{{ $details->tag->{$name} }}</a>
                                </li>
                                {{-- @endforeach --}}

                            </ul>
                            <span style="display: inline-block;text-align: center; font-weight: 500; font-size: 18px">
                                {{ $details->{$sub_title} }}</span><br><br>
                            <p class="excert">
                                {{ $details->{$description} }}
                            </p>
                        </div>
                    </div>
                    <div class="comments-area">
                        <h4>{{ __('main.comments') }}</h4>
                        <!-- start comment user -->
                        @foreach ($details->comment as $item)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="https://icons.veryicon.com/png/o/miscellaneous/two-color-webpage-small-icon/user-244.png"
                                                alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                {{ $item->text }}
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#">{{ $item->name }}</a>
                                                    </h5>
                                                    {{-- December 4, 2017 at 3:12 pm --}}
                                                    <p class="date">
                                                        {{ date('F j, Y, g:i a', strtotime($item->date)) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- end comment user -->
                    </div>
                    <div class="comment-form">
                        <h4>{{ __('main.add_comment') }}</h4>
                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form class="form-contact comment_form" wire:submit.prevent="add_comment" id="commentForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                            placeholder="{{ __('main.write_comment') }}" wire:model="text"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name" type="text"
                                            placeholder="{{ __('main.name') }}" wire:model="name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="email" id="email" type="email"
                                            placeholder="{{ __('main.email') }}" wire:model="email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="button button-contactForm btn_1 boxed-btn">{{ __('main.send_message') }}</button>
                            </div>
                        </form>
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
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">{{ __('main.posts') }}</h3>
                            @foreach ($news as $new)
                                <div class="media post_item d-flex  align-items-center">
                                    <img src="{{ asset('images\\' . $new->image) }}" alt="post" width="55%">
                                    <div class="media-body">
                                        <a href="{{ route('detail', ['id' => $new->id]) }}">
                                            <h3>{{ $new->{$title} }}.</h3>
                                        </a>
                                        {{-- January 12, 2019} --}}
                                        <p>{{ date('F j, Y', strtotime($new->date)) }}</p>
                                    </div>
                                </div>
                            @endforeach
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
    <!--================ Blog Area end =================-->
</div>
