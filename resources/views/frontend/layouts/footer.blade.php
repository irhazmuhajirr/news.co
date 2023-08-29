<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">{{ ABOUT_US }}</h2>
                    <p>
                        {{ ABOUT_US_FOOTER_TEXT }}
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">{{ USEFUL_LINKS }}</h2>
                    <ul class="useful-links">
                        <li><a href="{{ route('home') }}">{{ HOME }}</a></li>
                        
                        @if($global_pages->terms_status == "Show")
                        <li><a href="{{ route('page-terms') }}">{{ TERMS_AND_CONDITIONS }}</a></li>
                        @endif

                        @if($global_pages->privacy_status == "Show")
                        <li><a href="{{ route('page-privacy') }}">{{ PRIVACY_POLICY }}</a></li>
                        @endif

                        @if($global_pages->disclaimer_status == "Show")
                        <li><a href="{{ route('page-disclaimer') }}">{{ DISCLAIMER }}</a></li>
                        @endif

                        <li><a href="{{ route('page-contact') }}">{{ CONTACT }}</a></li>
                    </ul>
                </div>
            </div>
            
            
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">{{ CONTACT }}</h2>
                    <div class="list-item">
                        <div class="left">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="right">
                            34 Antiger Lane,<br>
                            PK Lane, USA, 12937
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="right">
                            contact@newsmail.com
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="right">
                            122-222-1212
                        </div>
                    </div>
                    <ul class="social">
                        @foreach ($global_social_media_items as $data)
                        <li><a href="https://www.{{ $data->url }}"><i class="{{ $data->icon }}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">{{ NEWSLETTER }}</h2>
                    <p>
                        {{ NEWSLETTER_TEXT }}
                    </p>
                    <form action="{{ route('subscribe') }}" method="post" class="form_subscribe_ajax">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="{{ FOOTER_EMAIL_ADDRESS }}">
                            <span class="text-danger error-text email_error"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="{{ SUBSCRIBE_BUTTON }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>