<?php if(getisset("ajax")) {
	?>
	@include("admin-ajax.{$_GET['ajax']}")
	<?php
	exit();
} ?>
<?php if(getisset("ajax2")) { //blade ajax system
	?>
	@include("{$_GET['ajax2']}")
	<?php
	exit();
} ?>
@php
	$permissions = @explode(",",Auth::user()->permissions);
@endphp

<!DOCTYPE HTML>
<html lang="tr">

<head>	

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{!! strip_tags($__env->yieldContent('title','OTTO2020')) !!}</title>
    <meta name="description" content="OTTO2020">
    <meta name="author" content="Truncgil Technology">
    <meta property="og:title" content="OTTO2020">
    <meta property="og:site_name" content="https://www.truncgil.com.tr/">
    <meta property="og:description" content="OTTO2020">
    <meta property="og:type" content="app">
    <meta property="og:url" content>
    <meta property="og:image" content>
	<div class="header-zone">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('assets/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="512x512" href="{{asset('assets/favicon.png')}}">


		<!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/ion-rangeslider/css/ion.rangeSlider.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/dropzonejs/dist/dropzone.css') }}">
	<link rel="stylesheet" href="http://otto2020.euro.kim/admin/types/mass-orders" />
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/admin/css/pelinom6.min.css') }}">
	
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">


<link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed:100,300,400,700,900&display=swap&subset=latin-ext" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css" />
    <script src="{{ asset('assets/admin/js/pelinom6.core.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pelinom6.app.min.js') }}"></script>
	<link rel="stylesheet" href="{{asset('assets/admin/css/custom.css?'.rand(1111,9999))}}" />
	<link rel="stylesheet" href="{{asset('assets/admin/css/tree.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/admin/css/theme.css')}}" />
	<script type="text/javascript" src="{{asset("assets/chart/dist/Chart.min.js")}}"></script>
	<script type="text/javascript" src="{{asset("assets/chart/samples/utils.js")}}"></script>
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
<script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clusterize.js/0.18.0/clusterize.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clusterize.js/0.18.0/clusterize.min.css" />
</div>
</head>

<body> 
@guest
	@yield("content")
@else
    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-glass side-trans-enabled">
       
		
		<aside id="side-overlay">
            <div class="content-header content-header-fullrow">
                <div class="content-header-section align-parent">
                    <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <div class="content-header-item">
                        <img class="img-avatar img-avatar32" src="{{asset('assets/img/user.jpg')}}" alt="">
                        <a class="align-middle link-effect text-primary-dark font-w600"
                            href="#">
							
                           {{ Auth::user()->name }}  {{ Auth::user()->surname }}
						   
						   <small class="badge badge-success">{{ Auth::user()->level }}</small>
                            <!-- Müşteri/Admin ismi -->
                        </a>
                    </div>
                </div>
            </div>
            <div class="content-side">
				<div class="block pull-r-l">
                    <div class="block-header bg-body-light">
                        <h3 class="block-title">
                            <i class="fas fa-file"></i>
                            {{__('Profil Ayarları')}}
                        </h3>
                        <div class="block-options">
                            
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                        </div>
                    </div>
                    <div class="block-content">
						<form action="{{url('admin-ajax/profile-update')}}" method="post">
							@csrf
							{{__('Adı')}}
								<input type="text" name="name" required id="" class="form-control" value="{{Auth::user()->name}}" />
							{{__('Soyadı')}}
								<input type="text" name="surname" required id="" class="form-control" value="{{Auth::user()->surname}}" />
							{{__('E-Mail')}}
								<input type="text" name="email" required id="" class="form-control" value="{{Auth::user()->email}}" />
							{{__('Telefon')}}
								<input type="text" name="phone" required id="" class="form-control" value="{{Auth::user()->phone}}" />
							{{__('Şifre')}} <small>{{__('(Değiştirmek istemiyorsanız boş bırakın)')}}</small>
								<input type="text" name="password" id="" class="form-control" value="" />
							<br />
							<button class="btn btn-primary">{{__('Bilgilerimi Güncelle')}}</button>

						</form>
                    </div>
                </div>
               
                
                
                
            </div>
        </aside>

        
        <nav id="sidebar">
            <div class="sidebar-content">
                <div class="content-header content-header-fullrow px-15">
                    <div class="content-header-section sidebar-mini-visible-b">
                        <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                            <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                        </span>
                    </div>
                    <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                        <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r"
                            data-toggle="layout" data-action="sidebar_close">
                            <i class="fa fa-times text-danger"></i>
                        </button>
                        <div class="content-header-item">
                            <a class="link-effect font-w700" href="#">
                                <img id="mainLogo" width="100%" style="        max-width: 70px;;" data-theme="light" src="{{asset('assets/img/logo.svg')}}" class="h-full-w-auto" alt="Trunçgil Teknoloji">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="content-side">
                   
                    <div class="sidebar-mini-hidden-b text-center">
                        
                        <ul class="list-inline mt-10">
                            <li class="list-inline-item">
                                <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase title"
                                    href="#">  </a>
									
									<h2 class="text-center">{{ Auth::user()->name }}  {{ Auth::user()->surname }}</h2>
									<div class="text-center badge badge-success">{{Auth::user()->level}}</div>
                                    <!-- İsmin ilk harfi ve Soyisim -->
                            </li>
                           
                        </ul>
                    </div>
                </div>
               @include("admin.inc.menu");
            </div>
        </nav>

        
        <header id="page-header">
            <div class="content-header">
                <div class="content-header-section">
                    <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout"
                        data-action="header_search_on">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <div class="content-header-section">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block">{{e2(App::getLocale())}}</span>
                            <!-- Kullanıcı adı -->
                            <i class="fa fa-angle-down ml-5"></i>
                        </button>
                   
                        <div class="dropdown-menu dropdown-menu-right min-width-200"
                            aria-labelledby="page-header-user-dropdown">
                            <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">{{ e2("Change Language") }}</h5>
                           
                            <div class="dropdown-divider"></div>
							<?php $dil = explode(",","de,en"); foreach($dil AS $d) { ?>
                            <a href="#" class="dropdown-item" onclick="$.get('{{url("ajax/set-locale?l=".$d)}}',function(){location.reload();})">
                                <i class="fa fa-language mr-5"></i> {{e2($d)}}
                            </a>
							<?php } ?>
                            <!-- Çıkış Yap -->
                        </div>
                        <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block">{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
                            <!-- Kullanıcı adı -->
                            <i class="fa fa-angle-down ml-5"></i>
                        </button>
                   
                        <div class="dropdown-menu dropdown-menu-right min-width-200"
                            aria-labelledby="page-header-user-dropdown">
                            <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">{{ Auth::user()->name }} {{ Auth::user()->surname }}</h5>
                           
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{url('logout')}}">
                                <i class="si si-logout mr-5"></i> {{__('Çıkış Yap')}}
                            </a>
                            <!-- Çıkış Yap -->
                        </div>
                    </div>

					<a href="{{ url('./') }}" target="_blank" class="btn btn-circle d-none"><i class="fa fa-globe"></i> {{__('Siteye Dön')}}</a>
                   <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout"
                        data-action="side_overlay_toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
            <div id="page-header-search" class="overlay-header">
                <div class="content-header content-header-fullrow">
                    <form action="{{url('admin/search')}}" method="get">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-secondary" data-toggle="layout"
                                    data-action="header_search_off">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control" value="{{@$q}}" placeholder="{{e2("Ara...")}}"
                                id="q" required  name="q">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="page-header-loader" class="overlay-header bg-primary">
                <div class="content-header content-header-fullrow text-center">
                    <div class="content-header-item">
                        <i class="fa fa-sun-o fa-spin text-white"></i>
                    </div>
                </div>
            </div>
        </header>
		
		<div class="main-container">
			<div class="">
				
				@if (View::hasSection('title'))
				<div class="bg-image" >
					<div class="bg-white-op-90">
						<div class="content content-full content-top">
							<h1 class="text-center">@yield("title")<br /> </h1>
							<div class="text-center">@yield("desc")</div>
						</div>
					</div>
				</div>
				@endif
				<div class="content-ajax">
				@yield("content")
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
        <footer id="page-footer" class="opacity-0 t-center">
            <div class="content py-20 font-size-xs clearfix m-0-auto">
                <div class="m-0-auto">
                    Created by <a class="truncgil" href="https://www.truncgil.com.tr/">Truncgil Technology</a>. All rights reserved.
                </div>
                
            </div>
        </footer>
    </div>
	@endguest
    <div class="script-zone">
    <script src="{{ asset('assets/admin/js/plugins/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/slick/slick.min.js') }}"></script>
	<!-- include summernote css/js -->
	<script src="{{ asset('assets/admin/js/plugins/summernote/summernote-bs4.min.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/summernote/summernote-bs4.css') }}">

	<script src="{{ asset('assets/admin/js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

	<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/magnific-popup/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/slick/slick.css') }}">
	
	<!-- Page JS Plugins -->
        <!--<script src="{{ asset('assets/admin/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>-->
        <script src="{{ asset('assets/admin/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/masked-inputs/jquery.maskedinput.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/dropzonejs/dropzone.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js') }}"></script>

        <script src="{{ asset('assets/admin/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
		<script type="text/javascript" src="http://cdn.craig.is/js/rainbow-custom.min.js"></script>
		<script type="text/javascript" src="{{asset("assets/js/jquery.mask.js")}}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/custom2.js') }}"></script>
		</div>
		<!--
<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
-->
<script type="text/javascript">
window.setInterval(function(){
	$.get("?ajax=session-start")
},60*1000);
</script>
<script src="{{asset('assets/admin/js/ckeditor/ckeditor.js')}}"></script>
@include("admin.inc.script")
<style type="text/css">
		.hidden {
			display:none !important;
		}
		.visible {
			display:block !important;
		}
		.hidden-upload {
			display:none;
			
		}
		.dz-filename {
							white-space:normal !important;
							    height: 74px;
							
						}
		</style>
<div class="modal fade" id="modal-popin" tabindex="-1" role="dialog" aria-labelledby="modal-popin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popin" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title"></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                </div>
            </div>
            <div class="modal-footer">
                <button  class="btn btn-alt-secondary" data-dismiss="modal">{{__('Hayır')}}</button>
                <a href="#" class="btn btn-alt-success tamam" data-dismiss="modal">
                    <i class="fa fa-check"></i> {{__('Evet')}}
                </a>
            </div>
        </div>
    </div>
</div>

</body>

</html>
<style type="text/css">
.cke_button__easyimageupload {
	display:none !important;
}
.select2  {
	width:100% !important;
}
</style>