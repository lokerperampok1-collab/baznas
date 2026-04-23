@extends('layouts.app')

@section('title', 'Donate - KURBAN BERKAH BAZNAS | BAZNAS Kabupaten Tasikmalaya')

@section('styles')
<style type="text/css">
    #simple-popup{position:fixed;top:0;bottom:0;left:0;right:0;z-index:100001}.simple-popup-content{border-radius:10px;position:absolute;left:50%;top:50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);max-height:80%;max-width:100%;z-index:100002;padding:30px 0 30px 0;overflow:auto}.simple-popup-content .close{position:absolute;right:0;top:0}.simple-popup-content .close::before{display:inline-block;text-align:center;content:"\00d7";font-size:30px;color:#d3d3d3;width:40px;line-height:40px;padding:10px 10px 5px 5px}.simple-popup-content .close:hover{cursor:hand;cursor:pointer}.simple-popup-content .close:hover::before{color:#ffffff}#simple-popup-backdrop,.simple-popup-backdrop-content{position:fixed;top:0;bottom:0;left:0;right:0;z-index:100000}#simple-popup,#simple-popup-backdrop,#simple-popup-backdrop.hide-it,#simple-popup.hide-it{-webkit-transition-property:opacity;-moz-transition-property:opacity;-ms-transition-property:opacity;-o-transition-property:opacity;transition-property:opacity}#simple-popup-backdrop.hide-it,#simple-popup.hide-it{opacity:0}#simple-popup,#simple-popup-backdrop{opacity:1}a:active,a:focus,a:visited{box-shadow:none!important;outline:0;box-shadow:0 4px 15px 0 rgba(0,0,0,.1)}.form-group label{font-size:14px}.donasiaja-input{margin:0 0 16px 0}.donasiaja-input input,.donasiaja-input textarea{font-family:Roboto,sans-serif;outline:0;background:#fff;width:100%;padding:15px;box-sizing:border-box;font-size:16px;font-weight:bold;border:1px solid #e5e8ec!important;border-radius:4px;transition:all .2s ease}.donasiaja-input input[type=email],.donasiaja-input input[type=number],.donasiaja-input input[type=tel],.donasiaja-input input[type=text]{height:50px}.donasiaja-input input:focus,.donasiaja-input input:visited,.donasiaja-input textarea:focus,.donasiaja-input textarea:visited{border:1px solid #719eca!important}.donasiaja-input.anonim{padding-top:5px;padding-bottom:10px}.donasiaja-input.comment{padding-top:0;margin-top:-10px}.donasiaja-input .donation_button_now{margin-top:5px;margin-bottom:10px;height:50px}.donasiaja-input .choose_payment{background:#fff;color:#719eca;font-size:12px;padding:6px 10px 0 12px;width:60px;text-align:center;height:24px;float:right;border-radius:4px;border:1px solid #719eca;cursor:pointer;transition:all .4s ease;margin-top:-5px}.donasiaja-input .choose_payment:hover{background:#edf8ff}.donasiaja-input.payment{background:#edf7ff;border:1px solid #d6e5f3;padding:28px 12px;border-radius:4px;margin-bottom:25px}.donasiaja-input.payment img.img_payment_selected{position:absolute;width:70px;border:1px solid #c1daec;border-radius:4px;margin-top:-9px;padding:2px 5px;background:#fff;margin-left:4px}.donasiaja-input.payment .title_payment.selected{margin-left:99px;text-transform:capitalize}.anonim .toggle1{background:#ddd;width:60px;height:25px;border-radius:100px;display:block;appearance:none;-webkit-appearance:none;position:relative;cursor:pointer;float:right;margin-top:-5px}.anonim .toggle1:after{content:"";background:#999;display:block;height:30px;width:30px;border-radius:100%;position:absolute;left:0;transform:scale(.9);cursor:pointer;transition:all .4s ease;margin-top:-15px}.anonim .toggle1:checked{background:#25914820;border:1px solid #259148!important}.anonim .toggle1:checked:after{background:#259148;left:28px}.comment textarea{margin-top:10px;line-height:1.2}.choose_payment.set_red,.form-control.set_red{border:1px solid #f15d5e!important;transition:all .1s ease}.card-group{margin-top:15px;min-height:175px}.donasiaja-input .card-body{display:flow-root}.card-radio-btn input[type=radio]{display:none;opacity:0;width:0}.card-radio-btn .content_head{color:#333;font-size:16px;line-height:30px;font-weight:500}.card-radio-btn .content_sub{color:#9e9e9e;font-size:11px}.card-radio-btn .content_head.no_desc{padding-top:9px}.card-radio-btn .content_sub.no_desc{display:none}.card-input-element+.card{width:28.7%;height:55px;margin:2%;justify-content:center;color:var(--primary);-webkit-box-shadow:none;box-shadow:none;border:2px solid transparent;border-radius:10px;text-align:center;-webkit-box-shadow:0 4px 25px 0 rgba(0,0,0,.1);box-shadow:0 4px 25px 0 rgba(0,0,0,.1);float:left;padding-top:5px}.additional_nominal_value input, .other_nominal_value input, .pendapatan_emas input, .pendapatan_pertanian input, .pendapatan_perbulan input, .pendapatan_lainnya input, .pengeluaran input, .total_nisab_zakat input, .total_pendapatan input, .total_, .total_zakat input, .total_summary input{text-align:right;font-size:24px;font-weight:700;color:#23374d}.total_nisab_zakat input, .total_pendapatan input, .total_zakat input, .total_summary input{border:1px solid #edf7ff !important;background:#edf7ff;cursor:default;color:#4484c1;} 
    .additional_nominal_value.hide_input, .other_nominal_value.hide_input{display:none}.additional_nominal_value .currency, .other_nominal_value .currency, .pendapatan_emas .currency, .pendapatan_pertanian .currency, .pendapatan_perbulan .currency, .pendapatan_lainnya .currency, .pengeluaran .currency, .total_nisab_zakat .currency, .total_pendapatan .currency, .total_zakat .currency, .total_summary .currency{position:absolute;margin-top:-37px;margin-left:15px;font-weight:700;font-size:18px;color:#719eca}.additional_nominal_value input::-webkit-input-placeholder, .other_nominal_value input::-webkit-input-placeholder{font-size:16px;font-weight:400}.other_nominal_value input:-moz-placeholder{font-size:16px;font-weight:400}.additional_nominal_value input::placeholder, .other_nominal_value input::placeholder{font-size:16px;font-weight:400;margin-top:-4px}.pendapatan_emas input::-webkit-input-placeholder, .pendapatan_perbulan input::-webkit-input-placeholder, .pendapatan_pertanian input::-webkit-input-placeholder{font-size:16px;font-weight:400} .pendapatan_emas input:-moz-placeholder, .pendapatan_perbulan input:-moz-placeholder, .pendapatan_pertanian input:-moz-placeholder{font-size:16px;font-weight:400} .pendapatan_emas input::placeholder, .pendapatan_perbulan input::placeholder, .pendapatan_pertanian input::placeholder{font-size:16px;font-weight:400;margin-top:-4px}.pendapatan_lainnya input::-webkit-input-placeholder{font-size:16px;font-weight:400}.pendapatan_lainnya input:-moz-placeholder{font-size:16px;font-weight:400}.pendapatan_lainnya input::placeholder{font-size:16px;font-weight:400;margin-top:-4px}.pengeluaran input::-webkit-input-placeholder{font-size:16px;font-weight:400}.pengeluaran input:-moz-placeholder{font-size:16px;font-weight:400}.pengeluaran input::placeholder{font-size:16px;font-weight:400;margin-top:-4px}.total_nisab_zakat input::-webkit-input-placeholder, .total_pendapatan input::-webkit-input-placeholder, .total_zakat input::-webkit-input-placeholder, .total_summary input::-webkit-input-placeholder{font-size:16px;font-weight:400}
    .total_zakat input:-moz-placeholder, .total_nisab_zakat input:-moz-placeholder, .total_pendapatan input:-moz-placeholder, .total_summary input:-moz-placeholder{font-size:16px;font-weight:400}.total_nisab_zakat input::placeholder, .total_pendapatan input::placeholder, .total_zakat input::placeholder, .total_summary input::placeholder{font-size:16px;font-weight:400;margin-top:-4px}.donasiaja-input .filled{border:1px solid #c6d5e3!important}.card-input-element+.card:hover{cursor:pointer}.card-input-element:checked+.card{border:2px solid #719eca;-webkit-transition:border .3s;-o-transition:border .3s;transition:border .3s}.card-input-element:checked+.card .box-checklist{text-align:right;padding-right:4px;margin-top:-47px}.card-input-element:checked+.card .box-checklist.no_desc{text-align:right;padding-right:4px;margin-top:-42px}.card-input-element:checked+.card .box-checklist .checklist::after{content:"✓";color:#fff;font-style:normal;font-size:10px;font-weight:900;line-height:1;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;-webkit-animation-name:fadeInCheckbox;animation-name:fadeInCheckbox;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-timing-function:cubic-bezier(.4,0,.2,1);animation-timing-function:cubic-bezier(.4,0,.2,1);background:#719eca;padding:2px 4px;border-radius:12px}@-webkit-keyframes fadeInCheckbox{from{opacity:0;-webkit-transform:rotateZ(-20deg)}to{opacity:1;-webkit-transform:rotateZ(0)}}@keyframes fadeInCheckbox{from{opacity:0;transform:rotateZ(-20deg)}to{opacity:1;transform:rotateZ(0)}}.card_payment{max-width:100%;background-color:#fff;padding-top:1.5rem}.card_payment .card-text{font-size:14px}.card-title{width:100%;margin-top:0;text-align:center}.title-list{background:#edf7ff;border:none!important}.card-title2{width:100%;margin:0;text-align:left;font-size:14px;color:#485c71;font-weight:700}.card-label{display:flex;align-items:center;height:50px;border-top:1px solid #d7d7d7;padding:0 2rem;cursor:pointer}.card-icon{max-width:3rem;margin-right:2.5em;text-align:center}.card-icon img{width:70px}.card-icon svg{width:100%}.card-text{color:#3f4e5e}.card-radio{display:none;margin-left:auto}.card-radio:checked~.card-text{color:#09f;font-weight:700}.card-radio:checked~.card-check{display:inline-block}.card-check{display:none;margin-left:auto}.card-button{background-color:transparent;border:none;cursor:pointer;outline:0;padding:0;-webkit-appearance:none;-moz-appearance:none;appearance:none;display:block;width:100%;height:50px;background-color:#598bdd;color:#fff;text-transform:uppercase;letter-spacing:.1em}.card-button:hover{background-color:#6191df}.box-char{text-align:right;font-size:11px}.donate_now{position:fixed;bottom:0;width:481px;margin-bottom:0}.donate_now .donation_button_now2{width:100%}.img-box{width:89%;padding:80px 20px 20px 25px;min-height:100px}.img-box img{width:160px;display:inline-block;position:absolute;border-radius:4px;box-shadow:0 8px 12px 0 rgba(0,0,0,.2)}.img-box div{font-size:12px;margin-left:180px;color:#aabdce}.img-box h1{font-size:16px;margin-left:180px;line-height:1.4}.donasi-loading{display:inline-block}.donasi-loading:after{content:" ";display:block;width:20px;height:20px;margin:0;border-radius:50%;border:4px solid #fff;border-color:#fff transparent #fff transparent;animation:donasi-loading 1.2s linear infinite;position:absolute;margin-top:-20px;margin-left:20px}@keyframes donasi-loading{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}.loading-hide{display:none}.profile-picture{float:left;margin-bottom:30px}.profile-picture img{border-radius:120px;border:1px solid #dde4ec;width:70px;margin-left:10px}.profile-name{margin-left:110px;padding-top:18px;margin-bottom:50px}.profile-name .user-name{font-size:15px;font-weight:700}.profile-name .user-email,.profile-name .user-wa{font-style:italic;font-size:13px;padding-top:5px;color:#99a6bd}.charnum{margin-top: -20px;margin-bottom: 23px;margin-right: 10px;font-size: 10px;color: #acb2ca;}.tag-editor {list-style-type: none;padding: 10px 5px;margin: 0;overflow: hidden;border: 1px solid #eee;cursor: text;font: normal 14px sans-serif;color: #555;background: #fff;line-height: 20px;border-radius: 4px;}.tag-editor li {display: block;float: left;overflow: hidden;margin: 3px 0;}.tag-editor div {float: left;padding: 0 4px;}.tag-editor .placeholder {padding: 0 8px;color: #bbb;}.tag-editor .tag-editor-spacer {padding: 0;width: 8px;overflow: hidden;color: transparent;background: none;}.tag-editor input {vertical-align: inherit;border: 0;outline: none;padding: 0;margin: 0;cursor: text;font-family: inherit;font-weight: inherit;font-size: inherit;font-style: inherit;box-shadow: none;background: none;color: #444;}.tag-editor-hidden-src {position: absolute !important;left: -99999px;}.tag-editor ::-ms-clear {display: none;}.tag-editor .tag-editor-tag {padding-left: 5px;color: #46799b;background: #e0eaf1;white-space: nowrap;overflow: hidden;cursor: pointer;border-radius: 2px 0 0 2px;}.tag-editor .tag-editor-delete {background: #e0eaf1;cursor: pointer;border-radius: 0 2px 2px 0;padding-left: 3px;padding-right: 4px;}.tag-editor .tag-editor-delete i {line-height: 18px;display: inline-block;}.tag-editor .tag-editor-delete i:before {font-size: 16px;color: #8ba7ba;content: "×";font-style: normal;}.tag-editor .tag-editor-delete:hover i:before {color: #d65454;}.tag-editor .tag-editor-tag.active+.tag-editor-delete, .tag-editor .tag-editor-tag.active+.tag-editor-delete i {visibility: hidden;cursor: text;}.tag-editor .tag-editor-tag.active {background: none !important;padding: 0 !important;}.tag-editor .tag-editor-tag input {padding: 0px 10px !important;background: #F6FAFF;border-radius: 4px;height: 30px;margin-top:0px;}.tag-editor.set_red .placeholder div {color: #f15d5e !important;transition: all .1s ease;}.counter-number{display: flex;align-items: center;gap: 3px;}.counter-number .minus, .counter-number .plus, .counter-number .add{width: 17px;height: 17px;line-height: 15px;background: #f5f5f5;border-radius: 4px;padding: 8px 5px 8px 5px;border: 1px solid #eaeaea;vertical-align: middle;text-align: center;cursor:pointer;color:#259148;}.counter-number .add {width: 80px;font-size: 12px;color: #fff;background: #259148;border-color: #259148;height: 16px;}.counter-number .add:hover {background: #259148;}input.count {text-align: center;border:0px solid #ddd !important;border-radius:4px;display: inline-block;vertical-align: middle;height: 36px !important;width: 45px;font-size: 16px;font-weight: bold;padding:0;padding-top:3px;}input.count.filled {border:none !important;}.card-form .card {cursor: default !important;}.card-style .card-input-element:checked + .card{border: 2px solid #259148;}.card-style .card-package .card-input-element:checked + .card{border: 2px solid transparent;}.card-style .card-input-element:checked + .card .box-checklist .checklist::after {background: #259148;}.card-style .card-input-element:checked + .card.card-body {background: #25914808;}.card-style .card-package .card-input-element:checked + .card.card-body {background: #25914815;}.card-form.card-qurban .card-input-element:checked + .card, .card-form.card-package2 .card-input-element:checked + .card, .card-form.card-zfitrah .card-input-element:checked + .card {border: 2px solid transparent;}.card-form .card-input-element + .card {margin: 2% 1%;}.qurban_pricing span {padding-left:30px;}.package2_pricing span {padding-left:0px !important;}.card-form .card.card-body {height:auto;width:97%;text-align:left;padding-top: 10px; padding-bottom: 7px; padding-left:5px;}.card-form .content_head.no_desc {padding-top:5px;}.card-form .content_head.no_desc.qurban_pricing {font-size: 13px;padding-top:0 !important;}.card-form .content_head.no_desc.package2_pricing {font-size: 13px;padding-top:0 !important;}.card-form .card-img {width: 30%;float: left;}.card-form .card-img .img-qurban {height: 80px;width: 114px;border-radius: 6px;margin: 3px 5px 5px 8px;}.card-form .content_sub span {color: #818791;line-height: 1.5;}.counter-number {position: absolute;margin-left: -122px;margin-top: -39px;}.counter-number.btn_add{margin-left: -104px;margin-top: -40px;}.ripple {background-position: center;transition: background 0.2s;-webkit-user-select: none;-ms-user-select: none;user-select: none;}.ripple:hover {background: #F5F5F5 radial-gradient(circle, transparent 1%, #F5F5F5 0%) center/15000%;}.ripple:active {background-color: #259148;background-size: 100%;transition: background 0s;scale: 0.85;}.scale_button:active {scale: 0.95;}.card-label:active {background: #0099ff1f;}.content_atasnama {padding:8px;margin-top:8px;}.qurban_pricing img {position: absolute;width: 20px;margin-top: 5px;}.qurban_pricing img.Kambing {position: absolute;width: 16px;margin-top: 6px;}.qurban_pricing img.Domba {position: absolute;width: 18px;margin-top: 6px;}.qurban_pricing img.Unta, .qurban_pricing img.Kerbau {position: absolute;width: 18px;margin-top: 6px;}.zfitrah_pricing {font-size: 14px !important;margin-top: -3px;}@media only screen and (max-width:480px){.card-form .card-img .img-qurban {height: 60px;width: 90px;margin-bottom: 0;}.card-form .content_head.no_desc {padding-top:0px;font-size: 15px;margin-bottom: -2px;}.card-form .content_head.no_desc.qurban_pricing {font-size: 12px;margin-top: -2px;}.card-form .card-img {width: 30%;}.card-form .card.card-body {padding-top:10px;padding-bottom:8px;padding-left:3px;}.counter-number {margin-left: -116px;gap: 1px;}#lala-alert-wrapper{margin-top:40px }.img-box img{width:130px }.img-box div{margin-left:140px }.img-box h1{margin-left:140px }.donasiaja-input.payment .title_payment.selected{position: absolute !important;width: 120px;font-size: 12px;margin-top: 3px;}.donasiaja-input.payment {min-height: 20px;padding: 20px 12px 20px 8px;}.anonim label {font-size: 13px;}}@media only screen and (max-width:380px){.card-form .card-img .img-qurban {height: 55px;width:78px;margin-bottom: 0;}input.count {width:40px;}.counter-number {gap:0px;margin-left: -105px;}}
    .app-captcha{display: flex;flex-direction: column;align-items: center;gap: 1rem;box-sizing: border-box;}
    .captcha-base{width: 10rem;height: 10rem;border-radius: 50%;display: flex;align-items: center;justify-content: center;background-repeat: no-repeat;background-position: center center;background-size: cover;}
    .captcha-inner{width: 6rem;height: 6rem;border: 1px solid rgba(255,255,255,0.3);border-radius: 50%;background-repeat: no-repeat;background-position: center center;background-size: 10rem 10rem;transform: rotate(0deg);transition: transform .05s linear;will-change: transform;}
    #degreeSlider{cursor: pointer;width: 260px;box-sizing: border-box;}
    #btnValidate{cursor: pointer;visibility: hidden;padding: 8px 14px;box-sizing: border-box;background:#259148;border-color:#259148;border-radius: 8px;position: fixed;bottom: 0;margin-bottom: 20px;width: 92%;border-radius: 8px;}
    code{display: contents;visibility: hidden;box-sizing: border-box;}
    code.info{color: green;}
    .popup-captcha-overlay{position:fixed;left:0;right:0;top:0;bottom:0;background:rgb(0 0 0 / .4);display:none;z-index:999}
    .popup-content{position:fixed;bottom:-100%;left:50%;transform:translateX(-50%);background:#fff;border-radius:16px 16px 0 0;padding:20px 20px 80px;height:70vh;width:100%;max-width:520px;transition:bottom 0.4s ease;z-index:1000;box-sizing:border-box}
    .popup-content.show{display:block;z-index:9999;bottom:0}
    .close-popup{float:right;font-size:18px;cursor:pointer;margin-top:-25px}

    /* Sapaan Segmented Control */
    group.section-sapaan-label {width: 15% !important;float: left;}
    group.section-sapaan-label p {padding-top: 8px;}
    group.section-sapaan-text {width: 84% !important;}
    .sapaan input[type=radio] {cursor:pointer;opacity: 0;width: 100%;height: 42px;position: relative;z-index: 1;}
    .sapaan group {width: 100%;display: flex;}
    .sapaan .input-container {height: 36px;line-height: 36px;width: 100%;text-align: center;position: relative;margin-bottom: 10px;margin-top: 15px;}
    .sapaan .input-container:first-child label {border-radius: 5px 0 0 5px;}
    .sapaan .input-container:last-child label {border-radius: 0 5px 5px 0;border-right: 1px solid #e5e8ec;}
    .sapaan label {width: 100%;height: 100%;position: absolute;border: 1px solid #e5e8ec;border-right: inherit;top: 0;left: 0;font-family: arial;color: #737373;}
    .sapaan input:checked + label {background-color: #259148;top: 0;left: 0;border: 1px solid #1D7439 !important;z-index: 2;color: white;}
</style>
@endsection

@section('content')
<div id="header-title" class="section-box flying-header">
    <span class="nav-icon"><a href="{{ url('campaign/kurban') }}"><img alt="Image" src="{{ asset('assets/images/left-arrow.png') }}"></a></span>
    <span class="campaign-header-title show-title">KURBAN BERKAH BAZNAS</span>
</div>

<div class="section-image">
    <div class="img-box">
        <img src="{{ asset('uploads/2025/04/kurban-berkah-2.jpg') }}" alt="Image">
        <div>Pilih Kurban</div>
        <h1>KURBAN BERKAH BAZNAS</h1>
    </div>
</div>

<div class="section-box main-box">
    <div class="form-group" id="form-group">
        <div class="donasiaja-input" style="margin-top: 10px;">
            <div class="card-body card-group" style="margin-bottom:30px;margin-left:-5px;min-height:125px;">
                @php
                    $qurbans = [
                        ['id' => 'xaci1', 'name' => 'DOMBA GRADE C 🔥(Stok Terbatas)', 'price' => 1699000, 'desc' => 'Perkiraan Berat 20 - 23 Kg', 'folder' => '2026/03', 'img' => 'gradec-500x350.png', 'type' => 'Domba'],
                        ['id' => '6p5gl', 'name' => 'DOMBA GRADE B', 'price' => 2750000, 'desc' => 'Perkiraan Berat 28 - 32 Kg', 'folder' => '2026/03', 'img' => 'grade-B-500x350.png', 'type' => 'Domba'],
                        ['id' => 'ozpee', 'name' => 'DOMBA GRADE A', 'price' => 3300000, 'desc' => 'Perkiraan Berat 35 - 38', 'folder' => '2026/03', 'img' => 'Grade-A-500x350.png', 'type' => 'Kambing'],
                        ['id' => 'v6gmd', 'name' => 'Sapi 1/7 Ekor', 'price' => 3500000, 'desc' => 'Perkiraan Berat 220 - 270 Kg', 'folder' => '2025/04', 'img' => 'paybill-program-banner-1-NOALGD-1715674694244.jpg', 'type' => 'Sapi'],
                        ['id' => 'ugad1', 'name' => 'Sapi 1 Ekor Full', 'price' => 24500000, 'desc' => 'Perkiraan Berat 220 - 270 Kg', 'folder' => '2025/04', 'img' => 'SAPI.jpg', 'type' => 'Sapi'],
                    ];
                @endphp

                @foreach($qurbans as $q)
                <label class="card-radio-btn card-form card-qurban" id="label_{{ $q['id'] }}">
                    <input type="checkbox" name="nominal_donasi" class="card-input-element" value="{{ $q['name'] }}" data-label="{{ $q['price'] }}" style="display:none;">
                    <div class="card card-body">
                        <div class="card-img" data-type="{{ $q['type'] }}" data-payment="1">
                            <img class="img-qurban" src="{{ asset('uploads/'.$q['folder'].'/'.$q['img']) }}">
                        </div>
                        <div class="content_head no_desc qurban_name"><span>{{ $q['name'] }}</span></div>
                        <div class="content_sub"><span>{{ $q['desc'] }}</span></div>
                        <div class="content_head no_desc qurban_pricing data_pricing" data-pricing="{{ $q['price'] }}">
                            <img src="{{ asset('assets/images/qurban/'.$q['type'].'.png') }}" class="{{ $q['type'] }}"><span>Rp {{ number_format($q['price'], 0, ',', '.') }}</span>
                        </div>
                        <div class="content_head no_desc" style="float: right;">
                            <div id="btn_add_{{ $q['id'] }}" class="counter-number btn_add" data-id="{{ $q['id'] }}" data-pricing="{{ $q['name'] }}" data-type="{{ $q['type'] }}" data-payment="1" data-placeholder="Kurban atas nama">
                                <span class="add ripple">+ Add</span>
                            </div>
                            <div id="btn_plusminus_{{ $q['id'] }}" class="counter-number btn_plusminus" data-id="{{ $q['id'] }}" style="display:none;">
                                <span class="minus ripple" data-id="{{ $q['id'] }}" data-pricing="{{ $q['price'] }}" data-type="{{ $q['type'] }}" data-payment="1" data-placeholder="Kurban atas nama">-</span>
                                <input type="text" value="0" class="count" data-id="{{ $q['id'] }}" data-placeholder="Kurban atas nama"/>
                                <span class="plus ripple" data-id="{{ $q['id'] }}" data-pricing="{{ $q['price'] }}" data-type="{{ $q['type'] }}" data-payment="1" data-placeholder="Kurban atas nama">+</span>
                            </div>
                        </div>
                        <div id="atasnama_{{ $q['id'] }}" class="content_atasnama" style="display:none;" data-id="{{ $q['id'] }}" title="Kurban atas nama">
                            <input id="tag_atasnama_{{ $q['id'] }}" placeholder="Kurban atas nama" type="text" class="form-control tagit" name="whatsapp" value="" style="height: 42px;">
                        </div>
                    </div>
                </label>
                @endforeach
            </div>
        </div>

        <div class="donasiaja-input payment">
            <div class="box_img_payment">
                <img class="img_payment_selected" src="{{ asset('assets/images/bank/bank.png') }}" alt="Image" data-paymentmethod="" data-paymentcode="" data-paymentnumber="" data-paymentaccount="">
            </div>
            <label class="title_payment selected">Metode pembayaran</label>
            <div id="choose_payment" class="choose_payment">Pilih ▾</div>
        </div>

        <div class="donasiaja-input sapaan">
            <group class="section-sapaan-label"><p>Sapaan :</p></group>
            <group class="section-sapaan-text">
                <div class="input-container">
                    <input type="radio" name="sapaan" value="Bapak" checked><label>Bapak</label>      
                </div>
                <div class="input-container">
                    <input type="radio" name="sapaan" value="Ibu"><label>Ibu</label>
                </div>
                <div class="input-container">
                    <input type="radio" name="sapaan" value="Kak"><label>Kak</label>     
                </div>
            </group>
        </div>

        <div class="donasiaja-input fullname">
            <input id="name" placeholder="Nama Lengkap" type="text" maxlength="120" class="form-control" name="name" value="" >
        </div>

        <div class="donasiaja-input anonim" >
            <label>Sembunyikan nama saya (Orang Baik)</label>
            <input id="anonim" type="checkbox" class="toggle1" name="anonim" />
        </div>

        <div class="donasiaja-input whatsapp">
            <input id="whatsapp" placeholder="No Whatsapp atau Handphone" type="number" maxlength="15" class="form-control wa" name="whatsapp" value="" onkeypress="allowNumbersOnly(event)" >
        </div>

        <div class="donasiaja-input comment">
            <textarea id="comment" placeholder="Tuliskan pesan atau doa disini (optional)" class="form-control" name="comment" rows="3" ></textarea>
            <div class="box-char"><div id="charNum" class="charnum">&nbsp;</div></div>
            <input id="campaign_id" type="text" class="form-control" name="campaign_id" value="dja2poovd7x" style="display: none;">
        </div>
    </div>
</div>

<div class="section-box donate_now" id="fixed-button" style="z-index:9;">
    <button class="donation_button_now2 scale_button" style="background:#259148;border-color:#259148">
        Tunaikan Kurban Sekarang <span id="nominal_value"></span> 
        <div class="donasi-loading loading-hide"></div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="next_arrow" style="width: 15px; margin-bottom: -3px;" fill="white">
            <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
        </svg>
    </button>
</div>

<div id="popup_payment" style="display: none;">
    <h2 class="card-title" style="background: #0099FF;color: #fff;padding: 50px 0px;margin-top: -30px;">Metode Pembayaran</h2>
    <div class="card_payment">
        <label class="card-label title-list payment_transfer" style="margin-top: -45px;">
            <span class="card-title2">QRIS & E-Wallet (Otomatis)</span>
        </label>
        <label class="card-label qris payment_transfer set_qris" data-method="qris" data-code="qris" data-number="" data-account="" data-paymentname="QRIS (Otomatis)">
            <input class="card-radio" type="radio" name="card" value="qris" data-method="qris" data-code="qris" data-number="" data-account="" data-paymentname="QRIS (Otomatis)">
            <span class="card-icon"><img src="{{ asset('assets/images/bank/bank.png') }}" alt=""></span>
            <span class="card-text">QRIS & E-Wallet</span>
            <span class="card-check">
                <svg fill="#259148" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
            </span>
        </label>


    </div>
</div>

<div class="popup-captcha-overlay"></div>
<div class="popup-content" id="popupCaptcha">
    <div class="popup-body">
        <span class="close-popup" title="Close">&times;</span>
        <div style="text-align: center;">
            <h2 style="padding-top:10px;">Dynamic Captcha</h2>
            <p>Putar ke sudut yang benar.</p>
            <div class="app-captcha">
                <div class="captcha-base" id="captchaBase">
                    <div class="captcha-inner" id="captchaInner"></div>
                </div>
                <input type="range" id="degreeSlider" min="0" max="360" value="0" />
                <code id="msg" class="message"></code>
                <button id="btnValidate" class="donation_button_now2 scale_button">Validate 
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="next_arrow" style="width: 15px; margin-bottom: -3px; display: inline;" fill="white">
                        <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/js/js.cookie.js') }}"></script>
{{-- <script src="{{ asset('assets/js/jquery.tag-editor.min.js') }}"></script> --}}
<script>
    $(document).ready(function() {
        // Initial state
        $('.counter-number .count').val('0').attr('value', '0');
        let captcha = false;

        // Captcha Logic
        const VALIDATION_THRESHOLD = 5;
        const MIN_ROTATION = 90;
        const MAX_ROTATION = 270;
        const captchaImages = Array.from({length: 10}, (_, i) => `https://picsum.photos/400/400?random=${i+1}`);
        let baseDegree = 0;
        let inputDegree = 0;

        function initCaptcha() {
            $('#msg').css('visibility', 'hidden');
            $('#btnValidate').css('visibility', 'hidden');
            const img = captchaImages[Math.floor(Math.random() * captchaImages.length)];
            $('#captchaBase').css('background-image', `url(${img})`);
            $('#captchaInner').css('background-image', `url(${img})`);
            baseDegree = Math.floor(Math.random() * (MAX_ROTATION - MIN_ROTATION + 1)) + MIN_ROTATION;
            inputDegree = 0;
            $('#degreeSlider').val(0);
            $('#captchaInner').css('transform', `rotate(${baseDegree + inputDegree}deg)`);
        }

        $('#degreeSlider').on('input change', function() {
            inputDegree = Number(this.value);
            $('#msg').css('visibility', 'hidden');
            $('#captchaInner').css('transform', `rotate(${baseDegree + inputDegree}deg)`);
        });

        $('#degreeSlider').on('mouseup touchend', function() {
            if (inputDegree !== 0) {
                const diff = Math.abs(360 - baseDegree - inputDegree);
                if (diff <= VALIDATION_THRESHOLD) {
                    $('#msg').text('Correct!').addClass('info').css('visibility', 'visible');
                    captcha = true;
                } else {
                    $('#msg').text('Incorrect, try again.').removeClass('info').css('visibility', 'visible');
                    captcha = false;
                }
                $('#btnValidate').css('visibility', 'visible');
            } else {
                $('#btnValidate').css('visibility', 'hidden');
            }
        });

        initCaptcha();

        // Qurban Logic
        function count_total_form() {
            let total = 0;
            $('.card-qurban').each(function() {
                const price = $(this).find('.data_pricing').data('pricing');
                const count = $(this).find('.count').val();
                total += price * count;
            });
            $('#nominal_value').text(total > 0 ? ` - Rp ${numberWithDot(total)}` : '');
            Cookies.set('nominal', total, { expires: 1 });
        }

        $('.btn_add').click(function() {
            const id = $(this).data('id');
            $(this).hide();
            $(`#btn_plusminus_${id}`).show();
            $(`#btn_plusminus_${id} .count`).val(1);
            $(`#atasnama_${id}`).show();
            
            $(`#tag_atasnama_${id}`).tagEditor({
                initialTags: [],
                delimiter: ',',
                maxTags: 7, // Adjust as needed
                placeholder: 'Kurban atas nama'
            });
            count_total_form();
        });

        $('.minus').click(function() {
            const id = $(this).data('id');
            const $input = $(this).parent().find('input');
            let count = parseInt($input.val()) - 1;
            if (count <= 0) {
                $(`#btn_add_${id}`).show();
                $(`#btn_plusminus_${id}`).hide();
                $(`#atasnama_${id}`).hide();
                $(`#atasnama_${id} .tag-editor`).remove();
                count = 0;
            }
            $input.val(count);
            count_total_form();
        });

        $('.plus').click(function() {
            const id = $(this).data('id');
            const $input = $(this).parent().find('input');
            let count = parseInt($input.val()) + 1;
            $input.val(count);
            count_total_form();
        });

        // Payment Logic
        $(".choose_payment").on("click", function(e) {
            e.preventDefault();
            $(this).simplePopup({ type: "html", htmlSelector: "#popup_payment", width: "420px" });
        });

        // Submit Logic
        $(".donation_button_now2").on("click", function(e) {
            e.preventDefault();
            const btn = $(this);
            const name = $('#name').val();
            const sapaan = $('input[name="sapaan"]:checked').val();
            const whatsapp = $('#whatsapp').val();
            const comment = $('#comment').val();
            const payment_method = $('.img_payment_selected').attr('data-paymentcode');

            if (!name || !whatsapp || !payment_method) {
                alert("Lengkapi semua data dan pilih metode pembayaran!");
                return;
            }

            // Gather Qurban Details
            let qurban_details = [];
            $('.card-qurban').each(function() {
                const count = parseInt($(this).find('.count').val());
                if (count > 0) {
                    const id = $(this).attr('id').replace('label_', '');
                    const name = $(this).find('.qurban_name span').text();
                    const price = $(this).find('.data_pricing').data('pricing');
                    qurban_details.push({ id, name, price, count });
                }
            });

            if (qurban_details.length === 0) {
                alert("Pilih minimal satu paket kurban!");
                return;
            }

            if (!captcha) {
                $('.popup-captcha-overlay').addClass('show');
                $('#popupCaptcha').addClass('show');
                return;
            }

            // AJAX Submit
            btn.find('.donasi-loading').removeClass('loading-hide');
            btn.prop('disabled', true);

            $.ajax({
                url: "{{ route('campaign.donate.submit') }}",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    sapaan: sapaan,
                    name: name,
                    whatsapp: whatsapp,
                    comment: comment,
                    payment_method: payment_method,
                    qurban_details: qurban_details
                },
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.redirect_url;
                    }
                },
                error: function(xhr) {
                    btn.find('.donasi-loading').addClass('loading-hide');
                    btn.prop('disabled', false);
                    alert("Terjadi kesalahan saat memproses donasi. Silakan coba lagi.");
                }
            });
        });

        $('.close-popup').click(function() {
            $('.popup-captcha-overlay').removeClass('show');
            $('.popup-content').removeClass('show');
        });

        function numberWithDot(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // simplePopup Plugin Implementation
        (function ($) {
            "use strict";
            $.fn.simplePopup = function(options) {
                var that = this;
                var data;
                var determinedType;
                var settings = $.extend({
                    type: "auto",
                    htmlSelector: null,
                    width: "600px",
                    height: "auto",
                    background: "#fff",
                    backdrop: 0.7,
                    backdropBackground: "#000",
                    inlineCss: true,
                    escapeKey: true,
                    closeCross: true,
                    fadeInDuration: 0.3,
                    fadeInTimingFunction: "ease",
                    fadeOutDuration: 0.3,
                    fadeOutimingFunction: "ease",
                    beforeOpen: function(){},
                    afterOpen: function(){},
                    beforeClose: function(){},
                    afterClose: function(){}
                }, options );

                function init() {
                    determinedType = determineType();
                    data = setData();
                    startPopup();
                    return that;
                }

                function determineType() {
                    if (settings.type === "html") return "html";
                    if (settings.type === "data") return "data";
                    if (settings.type === "auto") {
                        if(that.data("content")) return "data";
                        if ($(settings.htmlSelector).length) return "html";
                    }
                    return false;
                }

                function setData() {
                    if (determinedType === "html") return $(settings.htmlSelector).html();
                    if (determinedType === "data") return that.data("content");
                    return false;
                }

                function startPopup() {
                    if (settings.backdrop) startBackdrop();
                    if (settings.escapeKey) bindEscape();
                    insertPopupHtml();
                }

                function insertPopupHtml() {
                    var content = $("<div/>", {"class": "simple-popup-content", "html": data});
                    var html = $("<div/>", {"id": "simple-popup", "class": "hide-it"});
                    if (settings.inlineCss) {
                        content.css("width", settings.width);
                        content.css("height", settings.height);
                        content.css("background", settings.background);
                    }
                    if (settings.closeCross) {
                        var closeButton = $("<div/>", {"class": "close"});
                        closeButton.on("click", function() { stopPopup(); });
                        content.append(closeButton);
                    }
                    html.append(content);
                    settings.beforeOpen(html);
                    $("body").append(html);

                    setTimeout(function() {
                        var popup = $("#simple-popup");
                        popup.removeClass("hide-it");
                        settings.afterOpen(popup);
                    }, 10);

                    // Handle payment selection within popup
                    html.on("click", ".card-label", function() {
                        const method = $(this).data('method');
                        const code = $(this).data('code');
                        const name = $(this).data('paymentname');
                        const number = $(this).data('number');
                        const account = $(this).data('account');

                        $('.title_payment').text(name).addClass('selected');
                        $('.img_payment_selected').attr('src', `{{ asset('assets/images/bank') }}/${code}.png`)
                            .attr('data-paymentmethod', method)
                            .attr('data-paymentcode', code)
                            .attr('data-paymentnumber', number)
                            .attr('data-paymentaccount', account);
                        
                        stopPopup();
                    });
                }

                function stopPopup() {
                    settings.beforeClose($("#simple-popup"));
                    $("#simple-popup").addClass("hide-it");
                    setTimeout(function() {
                        $("#simple-popup").remove();
                        if (settings.backdrop) stopBackdrop();
                        settings.afterClose();
                    }, 300);
                }

                function startBackdrop() {
                    var backdrop = $("<div id='simple-popup-backdrop'><div class='simple-popup-backdrop-content'></div></div>");
                    backdrop.find('.simple-popup-backdrop-content').css({
                        "opacity": settings.backdrop,
                        "background": settings.backdropBackground
                    });
                    $("body").append(backdrop);
                    backdrop.on("click", function() { stopPopup(); });
                }

                function stopBackdrop() {
                    $("#simple-popup-backdrop").remove();
                }

                function bindEscape() {
                    $(document).on("keyup.escapeKey", function(e) {
                        if (e.keyCode === 27) stopPopup();
                    });
                }

                return init();
            };
        }(jQuery));
    });

    function allowNumbersOnly(e) {
        var code = (e.which) ? e.which : e.keyCode;
        if (code > 31 && (code < 48 || code > 57)) e.preventDefault();
    }
</script>
@endsection
