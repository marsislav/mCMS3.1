<footer class="footer pt-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8  col-md-12">
                <div class="footer-widget mb-60 wow fadeInLeft" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                    <h4 class="logo mb-30">{{ $settings->site_name }}</h4>
                    <p class="mb-30 footer-desc">{{ $settings->site_info }}</p>
                </div>
            </div>

            <div class="col-xl-4  col-md-12">
                <div class="footer-widget mb-60 wow fadeInRight" data-wow-delay=".8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInRight;">
                    <h4>Contact</h4>
                    <ul class="footer-contact">
                        <li>
                            <a href="tel:{{ $settings->contact_number }}" class="title">{{ $settings->contact_number }}</a>
                            <p class="sub-title">{{ $settings->footer_text1 }}</p>
                        </li>
                        <li>
                            <a href="mailto:{{ $settings->contact_email }}" class="title">{{ $settings->contact_email }}</a>
                            <p class="sub-title">{{ $settings->footer_text2 }}</p>
                        </li>
                        <li>
                            <a href="#" class="title">{{ $settings->address }}</a>
                            <p class="sub-title">{{ $settings->footer_text3 }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="footer-social-links">
                        <ul class="d-flex">
                            <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-twitter-filled"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-instagram-filled"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">Template Designed by <a href="https://marsislav.net/" target="_blanks">Marsislav</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
