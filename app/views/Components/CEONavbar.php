<style>
    /*DOWNLOADED ELEMENTS*/
    @-webkit-keyframes lds-dual-ring {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
        }
        @keyframes lds-dual-ring {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
        }
        .lds-dual-ring {
        position: relative;
        }
        .lds-dual-ring div {
        /*position: absolute;*/
        display: inline-block;
        width: 40px;
        height: 40px;
        top: 30px;
        left: 30px;
        border-radius: 50%;
        border: 5px solid #000;
        border-color: #333 transparent #333 transparent;
        -webkit-animation: lds-dual-ring 1.3s linear infinite;
        animation: lds-dual-ring 1.3s linear infinite;
        }

    /*PURE ELEMENTS*/
    a{
        text-decoration: none !important;
    }

    /*IDs*/
    #navigation-bar{
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background: #fff;
        padding-top: 10px;
        padding-bottom: 10px;
        width: 100%;
    }
    #brand-image{
        display: inline;
        width: 40px;
        margin-left: 10px;
        margin-right: 20px;
    }
    #mini-tab-login{
        transform: translate(-302px, 0);
    }
    #mini-tab-register{
        transform: translate(-370px, 0);
    }
    #mini-tab-info{
        left: 33.8%;
        width: 200px;
    }
    #mini-tab-pendaftaran{
        left: 19%;
        width: 200px;
    }
    #main-content{
        margin-top: 60px;
    }
    #loading-popup>.popup-content{
        padding-top: 40px;
    }

    /*CLASSES*/
    .navigation-link{
        transition: 0.3s;
        padding: 23px 15px;
        color: #444;
    }
    .navigation-link:hover, .mini-tab-active{
        background: #337ab7;
        color: #fff !important;
    }
    .navigation-guest-view, .navigation-inactive-view, .navigation-active-view{
        margin-left: 22%;
    }
    .navigation-unverified-view{
        margin-left: 29%;
    }
    .mini-tab{
        background: rgba(255, 255, 255, 0.5);
        position: fixed;
        z-index: 1;
        top: 64px;
        border-radius: 4px;
        left: 100%;
        display: none;
        width: 285px;
        box-shadow: 2px 2px 10px black;
    }
    .mini-tab.mini-tab-sub-menu{
        width: 150px;
    }
    .navigation-sub-menu{
        transition: 0.4s;
        padding: 15px;
        display: block;
        color: #333;
    }
    .navigation-sub-menu:hover{
        background: #337ab7;
        color: #fff;
        cursor: pointer;
    }
    .bubble-source{
        display: inline-block;
        width: 20px;
        height: 20px;
        background: rgba(220, 220, 220, 0.8);
        position: relative;
        top: -10px;
        left: 100%;
        transform: translate(-27px, 0) rotate(45deg);
    }
    .navigation-form-heading{
        padding-bottom: 0;
        margin-top: 0;
    }
    .custom-horizontal-rule{
        background: #555;
        height: 2px;
        display: block;
        margin-bottom: 15px;
    }
    .hr-main-form{
        width: 100%;
    }
    .form-warning{
        font-style: italic;
        color: red;
        padding-bottom: 15px;
        display: none;
    }
    .popup-overlay{
        position: fixed;
        z-index: 1;
        background: rgba(0, 0, 0, 0.4);
        width: 100%;
        height: 100%;
        display: none;
    }
    .popup-text{
        padding-bottom: 15px;
        font-size: 18px;
        text-align: center;
    }
    .popup-content{
        width: 500px;
        background: #fff;
        padding: 20px;
        border-radius: 4px;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-250px, -250px);
    }
    .mobile-nav{
        display: none;
    }
    @media (max-width: 980px){

        .desktop-nav{
            display: none;
        }
        .mobile-nav{
            display: inline-block;
        }
        #brand-image{
            margin-left: 50%;
            transform: translate(-50%, 0);
        }
        #mini-tab-mobile{
            display: none;
            position: fixed;
            background: #fff;
            margin-top: 60px;
            width: 100%;
            height: 50%;
            overflow: scroll;
            z-index: 1;
            top: 0;
            left: 0;
        }
        #menu-button{
            position: fixed;
            z-index: 1;
            top: 13px;
        }
        #menu-button:hover{
            cursor: pointer;
        }

    }
</style>

<div class="row">
    <nav id="navigation-bar" class="col-md-12">
        <span id="menu-button" class="mobile-nav">
            <img id="menu-icon" src="/img/contents/menu-icon.svg" alt="" class="img-responsive img-rounded">
        </span>
        <img src="/img/contents/ceo.jpg" alt="" class="img-responsive img-circle" id="brand-image">
        <a class="navigation-link desktop-nav" href="/ceo">Home</a>
        <a class="navigation-link desktop-nav navigation-scroll" href="#timeline" scroll-target="section-timeline">Timeline</a>
        <a class="navigation-link desktop-nav navigation-minitab-link" href="#pendaftaran" data-toggle-mini-tab="pendaftaran">Ketentuan &amp; Persyaratan</a>
        <a class="navigation-link desktop-nav navigation-minitab-link" href="#info" data-toggle-mini-tab="info">Info Olimpiade</a>
        <a class="navigation-link desktop-nav" target="_blank" href="https://intip.in/gOCt">Guide Book CEO 2017</a>
        <a class="navigation-link desktop-nav navigation-scroll" href="#rewards" scroll-target="section-rewards">Rewards</a>
        <?php if(!isset($_SESSION['user'])): ?>
        <a id="nav-register" class="navigation-link desktop-nav navigation-guest-view" href="/ceo/registrasi" data-toggle-mini-tab="register">Registrasi</a>
        <a id="nav-login" class="navigation-link desktop-nav" href="/ceo/login" data-toggle-mini-tab="login">Login</a>
        <?php else: ?>
        <?php if(isset($_SESSION['user']) && ($_SESSION['user']['status'] == 'nonactive' || $_SESSION['user']['status'] == 'pending')): ?>
        <!--Add Aktivasi-->
        <a id="nav-aktivasi" class="navigation-link desktop-nav true-link navigation-inactive-view" href="/ceo/aktivasi">Aktivasi</a>
        <?php elseif(isset($_SESSION['user']) && ($_SESSION['user']['status'] == 'active' || $_SESSION['user']['status'] == 'submitted' || $_SESSION['user']['status'] == 'registered')): ?>
        <!--Add Profile-->
        <a id="nav-profile" class="navigation-link desktop-nav true-link navigation-active-view" href="/ceo/profile">Profile</a>
        <?php endif; ?>
        <!--Add Logout-->
        <a id="nav-logout" class="navigation-link desktop-nav true-link<?php echo $_SESSION['user']['status'] == 'unverified' ? ' navigation-unverified-view' : ''; ?>" href="/ceo/logout">Logout</a>
        <?php endif; ?>
    </nav>
    <div id="mini-tab-mobile" class="col-md-12 mobile-nav">
        <div class="row">
            <a class="navigation-sub-menu" href="/ceo">Home</a>
            <a class="navigation-sub-menu navigation-scroll" href="#timeline" scroll-target="section-timeline">Timeline</a>
            <a href="#ketentuan-olimpiade" class="navigation-sub-menu navigation-scroll" scroll-target="sub-section-ketentuan-olimpiade">Ketentuan Kompetisi</a>
            <a href="#ketentuan-dan-persyaratan-peserta" class="navigation-sub-menu navigation-scroll" scroll-target="sub-section-ketentuan-peserta">Ketentuan &amp; Persyaratan Peserta</a>
            <a href="/ceo/mekanisme-pendaftaran" class="navigation-sub-menu navigation-scroll">Mekanisme Pendaftaran</a>
            <a href="/ceo/jadwal-pelaksanaan" class="navigation-sub-menu navigation-scroll">Jadwal Pelaksanaan</a>
            <a href="/ceo/faq" class="navigation-sub-menu navigation-scroll">FAQ</a>
            <a class="navigation-sub-menu" href="https://intip.in/gOCt">Guide Book CEO 2017</a>
            <a class="navigation-sub-menu navigation-scroll" href="#rewards" scroll-target="section-rewards">Rewards</a>
            <?php if(!isset($_SESSION['user'])): ?>
            <a id="nav-register" class="navigation-sub-menu" href="/ceo/registrasi">Registrasi</a>
            <a id="nav-login" class="navigation-sub-menu" href="/ceo/login">Login</a>
            <?php else: ?><?php if(isset($_SESSION['user']) && ($_SESSION['user']['status'] == 'nonactive' || $_SESSION['user']['status'] == 'pending')): ?>
            <!--Add Aktivasi-->
            <a id="nav-aktivasi" class="navigation-sub-menu true-link" href="/ceo/aktivasi">Aktivasi</a>
            <?php elseif(isset($_SESSION['user']) && ($_SESSION['user']['status'] == 'active' || $_SESSION['user']['status'] == 'submitted' || $_SESSION['user']['status'] == 'registered')): ?>
            <!--Add Profile-->
            <a id="nav-profile" class="navigation-sub-menu true-link" href="/ceo/profile">Profile</a>
            <?php endif; ?>
            <!--Add Logout-->
            <a id="nav-logout" class="navigation-sub-menu true-link" href="/ceo/logout">Logout</a>
            <?php endif; ?>
        </div>
    </div>
    <div id="mini-tab-info" class="col-md-12 mini-tab mini-tab-sub-menu">
        <div class="row">
            <a href="/ceo/mekanisme-pendaftaran" target="_blank" class="navigation-sub-menu navigation-scroll">Mekanisme Pendaftaran</a>
            <a href="/ceo/jadwal-pelaksanaan" target="_blank" class="navigation-sub-menu navigation-scroll">Jadwal Pelaksanaan</a>
            <a href="/ceo/faq" target="_blank" class="navigation-sub-menu navigation-scroll">FAQ</a>
        </div>
    </div>
    <div id="mini-tab-pendaftaran" class="col-md-12 mini-tab mini-tab-sub-menu">
        <div class="row">
            <a href="#ketentuan-olimpiade" class="navigation-sub-menu navigation-scroll" scroll-target="sub-section-ketentuan-olimpiade">Ketentuan Kompetisi</a>
            <a href="#ketentuan-dan-persyaratan-peserta" class="navigation-sub-menu navigation-scroll" scroll-target="sub-section-ketentuan-peserta">Ketentuan &amp; Persyaratan Peserta</a>
        </div>
    </div>
    <div id="mini-tab-login" class="col-md-12 mini-tab">
        <!-- was here -->
    </div>
    <div id="mini-tab-register" class="col-md-12 mini-tab">
        <!-- was here as well -->
    </div>
    <div id="loading-popup" class="popup-overlay">
        <div class="popup-content text-center">
            <div class="lds-css">
                <div style="width:100%;height:100%" class="lds-dual-ring">
                    <div></div>
                </div>
            </div>
            <div class="popup-text"><span>Harap tunggu...</span></div>
        </div>
    </div>
    <div id="registered-popup" class="popup-overlay">
        <div class="popup-content">
            <div class="popup-text"><span>Akun Anda berhasil terdaftar!<br>Silahkan cek email anda untuk melakukan <br><b>verifikasi email</b>.</span></div>
            <button data-wipe-form="yes" class="popup-button btn btn-block btn-primary">Ok</button>
        </div>
    </div>
    <div class="popup-overlay error-popup" data-error-form="register">
        <div class="popup-content">
            <div class="popup-text"><span>Terjadi kesalahan. Mohon coba lagi.</span></div>
            <button data-wipe-form="no" class="popup-button btn btn-block btn-primary">Ok</button>
        </div>
    </div>
</div>

<script>

    $(function(){

        $('#menu-button').click(function(){
            $('#mini-tab-mobile').fadeToggle('fast');
        });

        $('#mini-tab-mobile').click(function(){
            $('#mini-tab-mobile').fadeToggle('fast');
        });

        $('#navigation-bar').find(".navigation-minitab-link").click(function(e){
            
            e.stopPropagation();
            var minitab_name = $(this).attr('data-toggle-mini-tab');
            var minitab = $('#mini-tab-'+minitab_name);

            $('.navigation-minitab-link').not(this).removeClass('mini-tab-active');
            $('.mini-tab').not(minitab).fadeOut('fast');
            $(this).addClass('mini-tab-active');
            minitab.fadeToggle('fast');

        });

        $('.mini-tab').click(function(e){

            e.stopPropagation();

        });

        $(document).click(function(){

            $(".navigation-minitab-link").removeClass('mini-tab-active');
            $('.mini-tab').fadeOut('fast');

        });

        $('.navigation-sub-menu').click(function(){

            $('.mini-tab').fadeOut('fast');

        });

/////////////////////////////////////////////////////////////////////////////////////////////////////

        // LOGIN BUTTON CLICK

        // REGISTRATION BUTTON CLICK

        // POPUP BUTTON CLICK
    });

</script>