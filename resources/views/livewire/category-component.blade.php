<div>
    <main>
        <!-- Whats New Start -->
        <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-3 col-md-3">
                                <div class="section-tittle mb-30">
                                    <select class="form-select" wire:model="paginate">
                                        <option value="all" selected>all</option>
                                        <option value="2">X2</option>
                                        <option value="6">X6</option>
                                        <option value="10">X10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            @foreach ($parents as $parent)
                                            <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab"
                                               role="tab" aria-controls="nav-home"
                                                wire:click.prevent="menyu({{$parent->id}})">{{$parent->name}}</a>
                                            @endforeach
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="whats-news-caption">
                                            <div class="row">
                                                @foreach ($categories as $category)
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="single-what-news mb-100">
                                                            <div class="what-img">
                                                                <img src="{{asset('storage\\'.$category->image) }}" alt="category">
                                                            </div>
                                                            <div class="what-cap">
                                                                @foreach ($tags as $tag)
                                                                    @if ($tag->id == $category->tag_id)
                                                                        <span class="color1">{{ $tag->name }}</span>
                                                                    @endif
                                                                @endforeach
                                                                <h4><a href="{{route('home',['id'=>$category->name])}}">{{ $category->name }}</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Whats New End -->


        <!--Start pagination -->
        @if ($categories->lastPage() > 1)

        <nav class="blog-pagination justify-content-center d-flex">
            <ul class="pagination">
                <li class="page-item">
                    <a href="#" class="page-link" aria-label="Previous"
                        wire:click="resetPage">
                        <i class="ti-angle-left"></i>
                    </a>
                </li>
                @for ($i = 1; $i <= $categories->lastPage(); $i++)
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
        <!-- End pagination  -->
    </main>
</div>
