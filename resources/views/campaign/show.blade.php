@extends('layouts.app')

@section('title', 'Campaign - KURBAN BERKAH BAZNAS | BAZNAS Kabupaten Tasikmalaya')

@section('styles')
<style type="text/css">
    a:active,a:focus,a:visited{box-shadow:none!important;outline:none;box-shadow:0 4px 15px 0 rgba(0,0,0,.1)}.loc_name{margin-top: -20px;padding-left: 25px;font-size: 13px;color: #a3aab0;}.d_map:hover .loc_name{color:#2196F3!important;transition:all 0.25s ease-in-out}.fancy-button{margin:auto;position:relative}.frills,.frills:after,.frills:before{position:absolute;background:#eb1f48;border-radius:4px;height:4px}.frills:after,.frills:before{content:"";display:block}.frills:before{bottom:15px}.frills:after{top:15px}.left-frills{right:180px;top:0}.active .left-frills{-webkit-animation:move-left 0.38s ease-out,width-to-zero 0.38s ease-out;animation:move-left 0.38s ease-out,width-to-zero 0.38s ease-out}.left-frills:before,.left-frills:after{left:15px}.active .left-frills:before{-webkit-animation:width-to-zero 0.38s ease-out,move-up 0.38s ease-out;animation:width-to-zero 0.38s ease-out,move-up 0.38s ease-out}.active .left-frills:after{-webkit-animation:width-to-zero 0.38s ease-out,move-down 0.38s ease-out;animation:width-to-zero 0.38s ease-out,move-down 0.38s ease-out}.right-frills{left:40px;top:0}.active .right-frills{-webkit-animation:move-right 0.38s ease-out,width-to-zero 0.38s ease-out;animation:move-right 0.38s ease-out,width-to-zero 0.38s ease-out}.right-frills:before,.right-frills:after{right:15px}.active .right-frills:before{-webkit-animation:width-to-zero 0.38s ease-out,move-up 0.38s ease-out;animation:width-to-zero 0.38s ease-out,move-up 0.38s ease-out}.active .right-frills:after{-webkit-animation:width-to-zero 0.38s ease-out,move-down 0.38s ease-out;animation:width-to-zero 0.38s ease-out,move-down 0.38s ease-out}.left-frills:before,.right-frills:after{transform:rotate(34deg)}.left-frills:after,.right-frills:before{transform:rotate(-34deg)}.total_love span{color:#F43756}.plus1{font-size:11px;margin-left:5px;position:absolute;top:0;color:#F43756;display:none}.plus1.show{display:inline}@-webkit-keyframes move-left{0%{transform:none}65%{transform:translateX(-30px)}100%{transform:translateX(-30px)}}@keyframes move-left{0%{transform:none}65%{transform:translateX(-80px)}100%{transform:translateX(-80px)}}@-webkit-keyframes move-right{0%{transform:none}65%{transform:translateX(80px)}100%{transform:translateX(80px)}}@keyframes move-right{0%{transform:none}65%{transform:translateX(80px)}100%{transform:translateX(80px)}}@-webkit-keyframes width-to-zero{0%{width:18px}100%{width:8px}}@keyframes width-to-zero{0%{width:18px}100%{width:8px}}@-webkit-keyframes move-up{100%{bottom:69.75px}}@keyframes move-up{100%{bottom:69.75px}}@-webkit-keyframes move-down{100%{top:69.75px}}@keyframes move-down{100%{top:69.75px}}
    .video-container { position: relative; padding-bottom: 56.25%; padding-top: 30px; height: 0; overflow: hidden; }
    .video-container iframe, .video-container object, .video-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
    .donation_button_fundraiser{display:inline-block;border:0 none;font-weight:700;line-height:normal;text-align:center;vertical-align:middle;cursor:pointer;transition:all .35s ease 0s;text-decoration:none;border-radius:4px;width:100%;padding:12px 45px;font-size:16px;background-color:#dc3264;color:#fff;border:2px solid #dc3264;height:47px}.donation_button_fundraiser{margin-top:20px;width:50%;margin-right:2%;color:#fff;background:#e6f4ff;border:2px solid #1c7bce;color:#1c7bce;padding:5px 45px 17px 45px;box-shadow:0 10px 12px 0 rgba(0,0,0,.1)!important}.donation_button_fundraiser img{position:absolute;width:24px;margin-left:-75px;margin-top:3px;}.donation_button_fundraiser .text-fundraiser{padding-top:8px;padding-left:28px;font-size:13px;font-weight:700}
    .donation_button_fundraiser:hover {
            background: rgba(37,145,72, 0.25) !important;
            box-shadow: 0px 18px 15px 0 rgba(0,0,0,.1) !important;
    }
    .copy_link_aff img { width: 20px; margin-top: 6px; margin-left: -65px; }
    .fundraiser-loading{display:inline-block}.fundraiser-loading:after{content:" ";display:block;width:10px;height:10px;margin:0;border-radius:50%;border:3px solid #fff;border-color:#259148 transparent #259148 transparent;animation:fundraiser-loading 1.2s linear infinite;position:absolute;margin-top:-13px;margin-left:10px}@keyframes fundraiser-loading{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}
    .fundraiser-hide{display:none}
    .section-image img{height:auto!important}#header-title{z-index:99}#campaign-title{border-top-left-radius:0;border-top-right-radius:0}.section-box{border-radius:4px}.scale_button:active{scale:.95}.add_info{font-size:13px;background:#fff;padding:8px 6px;border-radius:4px;margin-right:15px;margin-top:-5px;text-align:center;margin-bottom:20px;border:2px solid #1C7BCE;color:#1C7BCE;width:90px}.add_info:hover{background:#e6f4ff}
    .btn-readmore{background-color:#fff;color:#259148;cursor:pointer;animation:bounce 4s infinite;font-size:12px;border-color:#259148;padding-top:0!important;transition:0.3s}.btn-readmore:hover{background-color:#259148;color:#fff;border-color:#259148}
    @keyframes bounce{0%,20%,50%,80%,100%{transform:translateY(0)}40%{transform:translateY(-10px)}60%{transform:translateY(-5px)}}
    /* --- */
    .readmore-desc{max-height:120px;position:relative;overflow:hidden}.readmore-desc .box-button-readmore{position:absolute;bottom:0;left:0;width:100%;text-align:center;margin:0;padding-top:60px;padding-bottom:9px;background-image:linear-gradient(to bottom,#fff0,white)}.readmore-desc .box-button-readmore .button{padding:4px 20px 5px 20px!important;border-radius:99px;box-shadow:0 0 15px 5px #fff;height:36px}@media only screen and (max-width:520px){.readmore-desc .box-button-readmore .button{padding:5px 20px 5px 20px!important}}.readmore-desc.big-preview{max-height:240px}.readmore-desc.big-preview .box-button-readmore{padding-top:140px}.readmore-desc img{width:100%!important}.terbaru,.terbesar{font-size:13px;background:#fff;padding:8px 6px;border-radius:4px;text-align:center;border:2px solid #1C7BCE;color:#1C7BCE;width:90px;cursor:pointer}.terbaru:hover,.terbesar:hover{box-shadow:0 10px 12px 0 rgb(0 0 0 / .1)!important}.terbaru{margin-left:25px;margin-top:15px;background:#fff;border-color:#259148;color:#259148}.terbesar{margin-left:5px;margin-top:15px;background:#fff;border-color:#259148;color:#259148}.donation_box{margin-top:8px}.donation_box2{margin-top:8px}.btn-active{background:#259148;border-color:#259148;color:#fff;box-shadow:0 10px 12px 0 rgb(0 0 0 / .1)!important}#box-button-fundraiser{text-align:center;padding:30px 10px 40px 10px;background:rgba(37,145,72, 0.04);background-image:linear-gradient(to top,rgba(37,145,72, 0.04)0%,#fff 100%);border-radius:8px;margin-bottom:5px}@media only screen and (max-width:480px){button.terbaru{}.donation_box.black{background:#fff;}.donation_button_fundraiser{width:100%}.box_terbaru .donation_inner_box, .box_terbesar .donation_inner_box{margin:10px 0px 10px 0;} .donation_inner_box{margin:10px 12px 10px 0;}.terbaru{margin-left:5px}#box-button-fundraiser{padding-left:20px;padding-right:20px} .section-box.flying-button .donation_button_now2 {padding: 12px 10px;} }
    .donation_inner_box {border-radius: 6px !important;}
    .container--tabs .nav-tabs > li > a { padding: 10px 10px !important; font-size:  13px; }
    .container--tabs .nav-tabs > li > a { color: #23374d; font-weight: bold; }
    .container--tabs .nav-tabs > li.active > a, .container--tabs .nav-tabs > li.active > a:hover, .container--tabs .nav-tabs > li.active > a:focus { padding: 10px 12px !important; color:#ffffff; background: #259148; border: 1px solid #259148;}
    .timeline-milestone.is-current::before,.timeline-milestone.is-start::before{background-color:#259148}
    .donation_box.black .donation_button button.load_data_donatur, .donation_box.black .donation_button button.load_doa_donatur, .donation_box.black .donation_button button.load_fundraiser, .donation_box.black .donation_button button.load_fundraiser { background: #fff !important; color: #23374d; box-shadow: 0px 3px 15px 0 rgba(0,0,0,.1) !important; transition: 0.3s; height: 42px !important;  }

    .donation_box.black .donation_button button.load_data_donatur:hover, .donation_box.black .donation_button button.load_doa_donatur:hover, .donation_box.black .donation_button button.load_fundraiser:hover, .donation_box.black .donation_button button.load_fundraiser:hover { border: 1px solid #444; transition: 0.3s; }

    @media only screen and (max-width: 768px) {
      .whatsapp-float {
        bottom: 20px;
      }
      .whatsapp-float.geser-dikit {
          bottom: 90px;
      }
    }
</style>
@endsection

@section('content')
<div id="header-title" class="section-box"><span class="nav-icon" style=""><a href="/"><img alt="Image" src="{{ asset('assets/images/home.png') }}"></a></span><span class="campaign-header-title">KURBAN BERKAH BAZNAS</span>

</div>
<div class="section-image"><img alt="Image" class="parallax"  src="{{ asset('uploads/2025/04/kurban-berkah-2.jpg') }}"></div>


<div id="campaign-title" class="section-box">
<div class="title"><h1>KURBAN BERKAH BAZNAS</h1></div>
        <span class="d_map"><img alt="Image" src="{{ asset('assets/images/maps.png') }}"><div class="loc_name">Kabupaten Tasikmalaya</div></span>
                        <div class="donation_box2">
                    <span class="d_total">Rp {{ number_format($total_donated, 0, ',', '.') }}</span>
                    <span class="d_target">
                        <span class="d_target_text">terkumpul&nbsp;dari&nbsp;<b>Rp {{ number_format($target, 0, ',', '.') }}</b></span>
                    </span>
                    <div class="donation_progress">
                        <div class="donation_progress_bar full_green" style="background:#f5d72c;width:{{ $progress_percent }}%"></div>
                        <span class="d_target_graph"><b>{{ $donation_count }}</b> Donasi</span>
                        <span class="d_date"><span>{{ ceil(now()->diffInDays(\Carbon\Carbon::parse('2026-05-30'), false)) }}&nbsp;hari lagi</span></span>
                    </div>
                </div>



        <div class="section-button"><a href="{{ url('campaign/kurban/donate-now') }}"><button class="donation_button_now scale_button" style="background:#259148;border-color:#259148">Kurban Sekarang</button></a></div>


    </div>
<div class="section-box" style="min-height: 130px;"><h3>Penggalang Dana</h3>
<div class="penggalang-dana">
    <a href="#">
        <div class="profile-picture">
            <img alt="Image" src="{{ asset('uploads/2024/01/cropped-logo-baznassss-150x150.png') }}" style="border-radius: 120px;border: 1px solid #dde4ec;">
        </div>
    </a>
    <div class="profile-name">
                            <div class="user-link">
                <a href="#">
                    <span class="">BAZNAS Kab Tasikmalaya</span>
                </a>
            </div>
            <div class="verified_checklist"><img alt="Image" src="{{ asset('assets/images/check-org2.png') }}" style="width:42px;"></div><div class="user-verified" style="margin-left: 48px;font-style: italic;color: #a2b0ca;">Verified Organization</div>
                    </div>
</div>
</div>

<div class="section-box" id="tab-donasiaja">
<div class="container--tabs" id="info-update">
    <section class="row">

        <ul class="nav nav-tabs scrollable-tabs">
            <li class="active"><a href="#tab-1">Keterangan</a></li>
            <li class=""><a href="#tab-2">Kabar Terbaru </a></li>
            <li class=""><a href="#tab-3">Donatur ({{ $donation_count }})</a></li>
        </ul>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
                <div class="col-md-10">

                    <div class="readmore-desc">
                        <p>Kurban tidak harus mahal. Dengan Program Kurban Berkah BAZNAS, Anda bisa menunaikan ibadah qurban dengan harga terjangkau, tanpa mengurangi esensi dan keberkahan. Bayangkan kebahagiaan yang Anda sebarkan dengan qurban yang hemat, menjangkau lebih banyak saudara kita.</p>
<p>Program Kurban Berkah BAZNAS hadir sebagai solusi qurban yang cerdas dan efisien. Kami memahami bahwa setiap orang memiliki kesempatan yang sama untuk berbagi kebahagiaan melalui qurban. Oleh karena itu, untuk mendekatkan diri kepada Allah SWT sebagai bentuk ketaatan dalam meraih takwa. Selain itu, kurban juga dapat dimaknai sebagai ajang berbagi kepada sesama.&nbsp;<strong>Tahun ini BAZNAS menginisiasi&nbsp;</strong><strong>Kurban Berkah BAZNAS&nbsp;</strong><strong>untuk mempermudah Mudhohi/ Pekurban dalam menunaikan ibadahnya.</strong></p>
<p><img src="{{ asset('assets/images/campaign/alur-kurban.jpg') }}" alt="Alur Kurban Berkah BAZNAS" /></p>
<p><strong>Spesifikasi Hewan Kurban</strong></p>
<p><img src="{{ asset('assets/images/campaign/spesifikasi-hewan.jpg') }}" alt="Kurban Sapi 1 7 BAZNAS" /></p>
<p><strong>Apa Saja yang Didapatkan dari Kurban Berkah BAZNAS?</strong></p>
<p><img src="{{ asset('assets/images/campaign/benefit-kurban.jpg') }}" alt="Benefit Kurban Berkah BAZNAS" /></p>
<p><strong>Doa Niat Berkurban</strong></p>
<p><img src="{{ asset('assets/images/campaign/doa-berkurban.jpg') }}" alt="Doa Berkurban" /></p>
<p><strong>Mari menikmati kemudahan berkurban dan berikan kurban terbaik Anda sebagai bentuk penyempurna ibadah Idul Adha dan membantu memenuhi gizi masyarakat rentan melalui Kurban Berkah BAZNAS.</strong></p>
                                                        <p class="box-button-readmore">
                            <a class="button btn-readmore" href="#">Baca selengkapnya ▾</a>
                        </p>

                    </div>

                </div>
            </div>
            <div id="tab-2" class="tab-pane">
                <div class="col-md-10">


                    <div id="kabar-terbaru-donasi">
                          <ul class="timeline" style="margin-top: 50px;">
                                                                  <li class="timeline-milestone is-start" style="height: 50px;">
                              <div class="timeline-action">
                                  <span class="date">April, 17 2025</span>
                                <h3 class="title">Campaign is published</h3>
                              </div>
                            </li>
                          </ul>
                    </div>

                                            </div>
            </div>
            <div id="tab-3" class="tab-pane">
                <div class="col-md-10">

                    <!-- donation -->
                                                <button class="terbaru btn-active" data-id="terbaru">Terbaru</button>
                    <button class="terbesar" data-id="terbesar">Terbesar</button>

                                                <div class="donation_box black box_terbaru" style="background: #ffffff;">
                        <div id="box_zrji">
                                @forelse($donations as $dn)
                                @include('campaign.partials.donation_item', ['dn' => $dn])
                                @empty
                                <div style="text-align:center; padding: 20px; color: #999;">Belum ada donasi.</div>
                                @endforelse
                        </div>
                        <div id="box_btn_zrji" class="donation_button">
                                                            <div style="text-align: center; margin-top: 10px;">
                                    <button class="load-more-btn" data-type="terbaru" data-offset="10" data-target="box_zrji" style="background: #fff; border: 1px solid #ddd; padding: 8px 30px; border-radius: 99px; color: #666; cursor: pointer;">Load more</button>
                                </div>
                                                    </div>
                    </div>


                    <div class="donation_box black box_terbesar" style="background: #ffffff;display: none;">
                        <div id="box_q1e11">
                                @forelse($donations->sortByDesc('total_nominal') as $dn)
                                @include('campaign.partials.donation_item', ['dn' => $dn])
                                @empty
                                <div style="text-align:center; padding: 20px; color: #999;">Belum ada donasi.</div>
                                @endforelse
                                                                </div>
                        <div id="box_btn_q1e11" class="donation_button">
                                                            <div style="text-align: center; margin-top: 10px;">
                                    <button class="load-more-btn" data-type="terbesar" data-offset="10" data-target="box_q1e11" style="background: #fff; border: 1px solid #ddd; padding: 8px 30px; border-radius: 99px; color: #666; cursor: pointer;">Load more</button>
                                </div>
                                                        </div>
                    </div>
                    <!-- end donation -->
                </div>
            </div>
        </div>
    </section>
</div>
</div>



<div class="section-box"><h3>Fundraiser (1)</h3>

    <div class="donation_box black" style="background:rgba(37,145,72, 0.04);background-image:linear-gradient(to top,rgba(37,145,72, 0.04)0%,#fff 100%);">

                        <div id="box_wke2" style="padding: 10px 20px;">
                            <div class="donation_inner_box" style="background: #fff; border: 1px solid #eef2f6; border-radius: 8px; padding: 20px; margin-bottom: 15px; text-align: left; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                                <div style="color: #259148; font-weight: bold; font-size: 18px;">Sindy Kartika</div>
                                <div style="color: #444; font-size: 14px; margin-top: 5px;">Berhasil mengajak 5 orang untuk berdonasi.</div>
                                <div style="font-weight: bold; font-size: 16px; margin-top: 10px;">Rp 10.200.204</div>
                            </div>
                        </div>
        <div id="box_btn_wke2" class="donation_button">
                            <div style="text-align: center; margin-bottom: 20px;">
                                <button class="load_fundraiser" id="wke2" style="background: #fff; border: 1px solid #ddd; padding: 10px 40px; border-radius: 99px; color: #444; cursor: pointer; transition: 0.3s;" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">Load more</button>
                            </div>
                        </div>



        <div style="text-align: center; padding: 40px 10px 30px 10px; border-radius: 8px; margin-bottom: 5px;">
            <div style="font-size: 15px;font-family: 'Lato', FontAwesome, lato, sans-serif !important;margin-bottom:10px;">Mari jadi Fundraiser dan berikan manfaat bagi program ini.</div>
                                    <div><button class="donation_button_fundraiser regaff scale_button" data-cid="dja2poovd7x" style="background:rgba(37,145,72, 0.15);border-color:#259148;margin-top: 25px;"><div><img alt="Image" src="{{ asset('assets/images/groups.png') }}"><div class="text-fundraiser" style="color:#2D3849;">Jadi Fundraiser<div class="fundraiser-loading fundraiser-hide"></div></div></div></button></div>
                                    </div>
        </div>
</div>


<div class="section-box"><h3>Doa-doa orang baik ({{ \App\Models\Donation::whereNotNull('comment')->count() }})</h3>
        <div class="donation_box black">
    <div id="box_ah2m">
        @forelse($donations->where('comment', '!=', null) as $dn)
            @include('campaign.partials.doa_item', ['dn' => $dn])
        @empty
            <div style="text-align:center; padding: 20px; color: #999;">Belum ada doa.</div>
        @endforelse
    </div>
    <div id="box_btn_ah2m" class="donation_button">
                        <div style="text-align: center; margin-top: 10px;">
                            <button class="load-more-btn" data-type="doa" data-offset="10" data-target="box_ah2m" style="background: #fff; border: 1px solid #ddd; padding: 8px 30px; border-radius: 99px; color: #666; cursor: pointer;">Load more</button>
                        </div>
                    </div>
</div>
</div>

<div class="section-box box-powered">
    </div>

<div id="lala-alert-container"><div id="lala-alert-wrapper"></div></div>
<div class="section-box" id="fixed-button">
<button class="donation_button_share"><img alt="Image" src="{{ asset('assets/images/share.png') }}"><span class="text-share">Share</span><div class="text-bagikan">Bagikan</div></button>

    <a href="{{ url('campaign/kurban/donate-now') }}"><button class="donation_button_now2 scale_button" style="background:#259148;border-color:#259148">Kurban Sekarang</button></a>




    </div>

<div id="fixed-share-button" class="section-box">
<div class="share-title">Bagikan melalui:</div>
<div class="share-close">✕ Close</div>

<button class="donation_social_button donasiaja_copy_link" data-link="{{ url('campaign/kurban') }}"><span><img src="{{ asset('assets/images/link.png') }}" style="opacity: 0;margin-left: -15px;" alt="Copy Link"><div class="text-copy">Copy Link</div></span></button>

<a class="donasiaja-share wa" href="https://api.whatsapp.com/send?&amp;text=KURBAN%20BERKAH%20BAZNAS%0A{{ urlencode(url('campaign/kurban')) }}">
    <button class="donation_social_button whatsaap"><span><img src="{{ asset('assets/images/whatsapp.png') }}" alt="Whatsaap"></span>
    </button>
</a>

<a class="donasiaja-share fb" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('campaign/kurban')) }}">
    <button class="donation_social_button facebook"><span><img src="{{ asset('assets/images/facebook.png') }}" alt="Facebook"></span>
    </button>
</a>

<a class="donasiaja-share twit" href="https://twitter.com/intent/tweet?text={{ urlencode(url('campaign/kurban')) }}">
    <button class="donation_social_button twitter"><span><img src="{{ asset('assets/images/x.png') }}" alt="Twitter"></span>
    </button>
</a>

<a class="donasiaja-share tele" href="https://telegram.me/share/url?text=KURBAN%20BERKAH%20BAZNAS%20&amp;url={{ urlencode(url('campaign/kurban')) }}">
    <button class="donation_social_button telegram"><span><img src="{{ asset('assets/images/telegram.png') }}" alt="Telegram"></span>
    </button>
</a>
</div>
@endsection

@section('scripts')
<script>
    jQuery(document).ready(function($){
        $(window).scroll(function() {
            var value_mgtop = $('.parallax-wrapper img.parallax').attr("data-mgtop");
            $('.parallax-wrapper img.parallax').css({"margin-top":value_mgtop});
        });
    });
</script>
<script>
    const image = document.querySelector('.parallax');
    new Ukiyo(image, {
        scale: 1.5, // 1~2 is recommended
        speed: 1.5, // 1~2 is recommended
        willChange: true, // This may not be valid in all cases
        wrapperClass: "parallax-wrapper"
    })

    window.addEventListener("load", function() {

        // store tabs variable
        var myTabs = document.querySelectorAll("ul.nav-tabs > li");

        function myTabClicks(tabClickEvent) {

            for (var i = 0; i < myTabs.length; i++) {
                myTabs[i].classList.remove("active");
            }

            var clickedTab = tabClickEvent.currentTarget;

            clickedTab.classList.add("active");

            tabClickEvent.preventDefault();

            var myContentPanes = document.querySelectorAll(".tab-pane");

            for (i = 0; i < myContentPanes.length; i++) {
                myContentPanes[i].classList.remove("active");
            }

            var anchorReference = tabClickEvent.target;
            var activePaneId = anchorReference.getAttribute("href");
            var activePane = document.querySelector(activePaneId);

            activePane.classList.add("active");

        }

        for (i = 0; i < myTabs.length; i++) {
            myTabs[i].addEventListener("click", myTabClicks)
        }
    });

    $(document).ready(function() {
      $timelineExpandableTitle = $('.timeline-action.is-expandable .title');

      $($timelineExpandableTitle).attr('tabindex', '0');

      // Give timelines ID's
      $('.timeline').each(function(i, $timeline) {
        var $timelineActions = $($timeline).find('.timeline-action.is-expandable');

        $($timelineActions).each(function(j, $timelineAction) {
          var $milestoneContent = $($timelineAction).find('.content');

          $($milestoneContent).attr('id', 'timeline-' + i + '-milestone-content-' + j).attr('role', 'region');
          $($milestoneContent).attr('aria-expanded', $($timelineAction).hasClass('expanded'));

          $($timelineAction).find('.title').attr('aria-controls', 'timeline-' + i + '-milestone-content-' + j);
        });
      });

      $($timelineExpandableTitle).click(function() {
        $(this).parent().toggleClass('is-expanded');
        $(this).siblings('.content').attr('aria-expanded', $(this).parent().hasClass('is-expanded'));
      });

      // Expand or navigate back and forth between sections
      $($timelineExpandableTitle).keyup(function(e) {
        if (e.which == 13){ //Enter key pressed
          $(this).click();
        } else if (e.which == 37 ||e.which == 38) { // Left or Up
          $(this).closest('.timeline-milestone').prev('.timeline-milestone').find('.timeline-action .title').focus();
        } else if (e.which == 39 ||e.which == 40) { // Right or Down
          $(this).closest('.timeline-milestone').next('.timeline-milestone').find('.timeline-action .title').focus();
        }
      });
    });


    $(document).ready(function() {
        $('.donasiaja-share').click(function(e) {
            e.preventDefault();
            if ($(this).hasClass("wa") || $(this).hasClass("fb") || $(this).hasClass("twit") || $(this).hasClass("tele")) {
                window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
                    return false;
            }

        });

        $('.terbaru, .terbesar').click(function() {
            // Remove "btn-active" class from both buttons
            $('.terbaru, .terbesar').removeClass('btn-active');

            // Add "btn-active" class to the clicked button
            $(this).addClass('btn-active');

            var id =  $(this).attr('data-id');
            if(id=='terbaru'){
                $('.box_terbaru').slideDown();
                $('.box_terbesar').slideUp();
            }else{
                $('.box_terbaru').slideUp();
                $('.box_terbesar').slideDown();
            }
        });
    });

    $('.donation_button_share').bind("click", function(e) {
        $('#fixed-share-button').addClass("show-button");
    });
    $('.share-close').bind("click", function(e) {
        $('#fixed-share-button').removeClass("show-button");
    });


        $(".readmore-desc").readMore({
            expandTrigger: ".box-button-readmore",
            previewHeight: 400,
            fadeColor1: "rgba(255,255,255,0)",
            fadeColor2: "rgba(255,255,255,1)"
        });


    $(function() {
        var header = $("#header-title");
        var header2 = $('.campaign-header-title');
        var footer = $("#fixed-button");
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            var documentHeight = $(document).height();
            var windowWidth = $(window).width(); // lebar layar

            if (scroll >= 500) {
                header.addClass("flying-header");
                header2.addClass("show-title");
                footer.addClass("flying-button");
            } else {
                header.removeClass("flying-header");
                header2.removeClass("show-title");
                footer.removeClass("flying-button");
                $('#fixed-share-button').removeClass("show-button");
            }

            // Cek sisa scroll ke bawah
            const distanceToBottom = documentHeight - (scroll + windowHeight);

            // ubah ke persentase (0–100)
            const percentFromBottom = (distanceToBottom / documentHeight) * 100;

            // kalau sisa kurang dari 50% dari tinggi dokumen dan layar ≤480px
            if (percentFromBottom <= 50 && windowWidth <= 480) {
                $('.whatsapp-float').addClass("geser-dikit");
            } else {
                $('.whatsapp-float').removeClass("geser-dikit");
            }

        });
    });


    $(document).on("click", ".donasiaja_copy_link", function(e) {
        var link_donasi = $(this).data("link");
        copyToClipboard(link_donasi);
        var message = "Copy link donasi berhasil!";
        var status = "success";    /* There are 4 statuses: success, info, warning, danger  */
        var timeout = 3000;     /* 5000 here means the alert message disappears after 5 seconds. */
        createAlert(message, status, timeout);
    });

    $(document).on("click", ".copy_link_aff", function(e) {
        var link_donasi = $(this).data("link");
        copyToClipboard(link_donasi);
        var message = "Copy Link Aff berhasil!";
        var status = "success";    /* There are 4 statuses: success, info, warning, danger  */
        var timeout = 3000;     /* 5000 here means the alert message disappears after 5 seconds. */
        createAlert(message, status, timeout);
    });

    $(document).on("click", ".regaff", function(e) {
        $('.fundraiser-loading').removeClass('fundraiser-hide');
        var cid = $(this).data("cid");
        var data_nya = [cid];
        var data = {
            "action": "djafunction_regaff_fundraiser",
            "datanya": data_nya
        };

        jQuery.post("/admin-ajax.php", data, function(response) { // disabled ajax for now

            var response_text = response.split("_");
            response_info = response_text[0];
            response_affcode = response_text[1];

            if(response_info=='loginfirst'){
                $('.fundraiser-loading').addClass('fundraiser-hide');

                var message = "Silahkan anda login terlebih dahulu.";
                var status = "warning";    /* There are 4 statuses: success, info, warning, danger  */
                var timeout = 3000;     /* 5000 here means the alert message disappears after 5 seconds. */
                createAlert(message, status, timeout);


                setTimeout(function() {
                    var urlnya = "/login";
                    window.location.replace(urlnya);
                }, 1200)

            }else{
                var aff_url = "{{ url('campaign/kurban') }}"+'?ref='+response_affcode;
                $('.donation_button_fundraiser img').attr("src","{{ asset('assets/images/link2.png') }}");
                $('.donation_button_fundraiser').removeClass('regaff');
                $('.donation_button_fundraiser').addClass('copy_link_aff');
                $('.donation_button_fundraiser').attr('data-link', aff_url);
                $('.donation_button_fundraiser .text-fundraiser').text('Copy Link Aff');

                $('.fundraiser-loading').addClass('fundraiser-hide');

                copyToClipboard(aff_url);

                var message = "Link Aff Fundraiser berhasil didaftarkan dan di-copy. Silahkan sebarkan ke Social Media anda.";
                var status = "success";    /* There are 4 statuses: success, info, warning, danger  */
                var timeout = 3000;     /* 5000 here means the alert message disappears after 5 seconds. */
                createAlert(message, status, timeout);
            }


        }).fail(function() { // fallback if ajax failed
           $('.fundraiser-loading').addClass('fundraiser-hide');
        });
    });



    // get Copy
    function copyToClipboard(string) {
    let textarea;let result;try{textarea=document.createElement("textarea");textarea.setAttribute("readonly",!0);textarea.setAttribute("contenteditable",!0);textarea.style.position="fixed";textarea.value=string;document.body.appendChild(textarea);textarea.focus();textarea.select();const range=document.createRange();range.selectNodeContents(textarea);const sel=window.getSelection();sel.removeAllRanges();sel.addRange(range);textarea.setSelectionRange(0,textarea.value.length);result=document.execCommand("copy")}catch(err){console.error(err);result=null}finally{document.body.removeChild(textarea)}
if(!result){const isMac=navigator.platform.toUpperCase().indexOf("MAC")>=0;const copyHotkey=isMac?"⌘C":"CTRL+C";result=box-button-readmore(`Press ${copyHotkey}`,string);if(!result){return!1}}
return!0
    }

    function getNum(val) {
       if (isNaN(val)) {
         return 0;
       }
       return val;
    }

    $(function(){
      $(document).on("click", ".donation_love", function(e) {
        $(this).bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function(){
            $(this).removeClass('active');
        })
         $(this).addClass("active");
      });
    });


    $(document).on("click", ".donation_love", function(e) {
        var id = $(this).attr('id');
        var campaign_id = $(this).attr('data-campaignid');
        var donate_id = $(this).attr('data-donateid');
        var count_love = $(this).find('.total_love').text();

        var thenum = parseInt(getNum(count_love.replace(/\D/g, "")));
        if(isNaN(thenum)){
            $(this).find('.total_love').html('<span>1 Aaminn</span>');
        }else{
            thenum = thenum+1;
            $(this).find('.total_love').html('<span>'+thenum+' Aaminn</span>');
        }

        $("#"+id+" img").attr("src","{{ asset('assets/icons/praying-color3.png') }}");

        $(this).find('.plus1').addClass('show').animate({
            top: '-27px',
            opacity: '0',
        }, {
            duration : 400,
            complete : function(){
                set_hide(id);
            }
        });
        // console.log("log: "+id);
        var data_nya = [campaign_id, donate_id];
        var data = {
            "action": "djafunction_set_love",
            "datanya": data_nya
        };

        jQuery.post("/admin-ajax.php", data, function(response) {


        });

    });



    function set_hide(id){
        $('#'+id+' .plus1').removeClass('show').removeAttr('style');
    }

    // Load More Logic
    $('.load-more-btn').on('click', function() {
        var btn = $(this);
        var type = btn.data('type');
        var offset = btn.data('offset');
        var target = btn.data('target');
        
        btn.text('Loading...').prop('disabled', true);

        $.ajax({
            url: "{{ route('campaign.load-more') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                type: type,
                offset: offset
            },
            success: function(response) {
                if (response.html) {
                    $('#' + target).append(response.html);
                    btn.data('offset', offset + response.count);
                    btn.text('Load more').prop('disabled', false);
                    
                    if (response.count < 10) {
                        btn.parent().html('<div style="color: #999; margin-top: 10px;">Tidak ada lagi data.</div>');
                    }
                } else {
                    btn.parent().html('<div style="color: #999; margin-top: 10px;">Tidak ada lagi data.</div>');
                }
            },
            error: function() {
                btn.text('Load more').prop('disabled', false);
                alert('Terjadi kesalahan, silakan coba lagi.');
            }
        });
    });

    // Old scripts removed...
</script>
@endsection
