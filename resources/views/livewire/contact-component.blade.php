<div>
    @php
    $name = 'name_' . app()->getLocale();
    // dd($news[0]->{$title});
@endphp
    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
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
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">{{ __('main.contact') }}</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" method="post" id="contactForm" novalidate="novalidate"
                        wire:submit.prevent="add_contact">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                                        placeholder="{{ __('main.enter_message') }}" wire:model="text"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                        placeholder="{{ __('main.enter_your_name') }}" wire:model="name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email address'"
                                        placeholder="{{ __('main.email') }}" wire:model="email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <select id="" class="form-control" wire:model="category">
                                        <option>{{__('main.other_reasons')}}</option>
                                        @foreach ($catgeories as $category)
                                            <option value="{{ $category->id }}">{{ $category->{$name} }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit"
                                class="button button-contactForm boxed-btn">{{ __('main.send') }}</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>{{ __('main.uzbekistan_tashkent') }}</h3>
                            <p>{{ __('main.tashkent_city') }}</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>+998971234567</h3>
                            <p>{{ __('main.mon_to_fri_9am_to_6pm') }}</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>user@gmail.com</h3>
                            <p>{{ __('main.send_us_your_query_anytime!') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
</div>
