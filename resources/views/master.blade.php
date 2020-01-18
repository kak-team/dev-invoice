
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<!-- Global stylesheets -->
    <link href="{{ URL::asset('css/md.compile.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('css/mdbootstrap.fileupload.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Battambang|Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link href="{{ URL::asset('css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('css/custome.css') }}" rel="stylesheet" type="text/css">
	
	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ URL::asset('js/jquery-3.4.0.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/simple.money.format.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
	<script src="{{ URL::asset('js/custom.js') }}"></script>
	<script>

		// check for popup modal delete
		function Btndelete(){			
			var arrayCheckBox = new Array();
				$('.table-responsive input[name="checkbox"]:checked').each(function() {
				arrayCheckBox.push(this.value);
			});        
			var n = arrayCheckBox.length;
			if( n > 0 ){
				$('#deleteRow').removeClass('disabled');
				$('#deleteRow').attr('data-toggle','modal');
			}else{
				$('#deleteRow').addClass('disabled');           
				$('#deleteRow').removeAttr('data-toggle'); 
			}
			$('#spanCheckobxValue').val(arrayCheckBox.toString());
		}
	
		// check all
		function check_all(e){                  
			var self = $(e+' #btnCheck_all');
			if($(self).hasClass('check_false')){
				$(e+' #btnCheck_all #defaultUnchecked').prop('checked', false);
				$(e+' #btnCheck_single input').prop('checked', false);
			}else{
				$(e+' #btnCheck_all #defaultUnchecked').prop('checked', true);
				$(e+' #btnCheck_single input').prop('checked', true);
			}          
		}

	</script>
	@if(auth()->user()->status == 'no_vat')
	<style>
		.bg-indigo{ background-color: #009688;}
	</style>
	@endif

	<!-- /theme JS files -->

</head>
@php
    $route = explode('.',\Request::route()->getName());
@endphp
<body class="navbar-top" data-vat="{{ $company[0]->vat }}" data-link="{{ $route[0] }}">
	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark bg-indigo fixed-top">
		<div class="navbar-brand">
		<a href="index.html" class="d-inline-block" style="font-size: 14px;color: #fff;">BEST WORLD TRAVEL &amp; TOURS</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>

			<span class="navbar-text ml-md-3">
				<span class="badge badge-mark border-orange-300 mr-2"></span>
				Morning, Victoria!
			</span>

			<ul class="navbar-nav ml-md-auto">
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-make-group mr-2"></i>
						Connect
					</a>

					<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
						<div class="dropdown-content-body p-2">
							<div class="row no-gutters">
								<div class="col-12 col-sm-4">
									<a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
										<i class="icon-github4 icon-2x"></i>
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Github</div>
									</a>

									<a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
										<i class="icon-dropbox text-blue-400 icon-2x"></i>
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Dropbox</div>
									</a>
								</div>
								
								<div class="col-12 col-sm-4">
									<a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
										<i class="icon-dribbble3 text-pink-400 icon-2x"></i>
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Dribbble</div>
									</a>

									<a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
										<i class="icon-google-drive text-success-400 icon-2x"></i>
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Drive</div>
									</a>
								</div>

								<div class="col-12 col-sm-4">
									<a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
										<i class="icon-twitter text-info-400 icon-2x"></i>
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Twitter</div>
									</a>

									<a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
										<i class="icon-youtube text-danger icon-2x"></i>
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Youtube</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-pulse2 mr-2"></i>
						Activity
					</a>
					
					<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
						<div class="dropdown-content-header">
							<span class="font-size-sm line-height-sm text-uppercase font-weight-semibold">Latest activity</span>
							<a href="#" class="text-default"><i class="icon-search4 font-size-base"></i></a>
						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">
								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-success-400 rounded-round btn-icon"><i class="icon-mention"></i></a>
									</div>

									<div class="media-body">
										<a href="#">Taylor Swift</a> mentioned you in a post "Angular JS. Tips and tricks"
										<div class="font-size-sm text-muted mt-1">4 minutes ago</div>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-pink-400 rounded-round btn-icon"><i class="icon-paperplane"></i></a>
									</div>
									
									<div class="media-body">
										Special offers have been sent to subscribed users by <a href="#">Donna Gordon</a>
										<div class="font-size-sm text-muted mt-1">36 minutes ago</div>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-blue rounded-round btn-icon"><i class="icon-plus3"></i></a>
									</div>
									
									<div class="media-body">
										<a href="#">Chris Arney</a> created a new <span class="font-weight-semibold">Design</span> branch in <span class="font-weight-semibold">Limitless</span> repository
										<div class="font-size-sm text-muted mt-1">2 hours ago</div>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-purple-300 rounded-round btn-icon"><i class="icon-truck"></i></a>
									</div>
									
									<div class="media-body">
										Shipping cost to the Netherlands has been reduced, database updated
										<div class="font-size-sm text-muted mt-1">Feb 8, 11:30</div>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-warning-400 rounded-round btn-icon"><i class="icon-comment"></i></a>
									</div>
									
									<div class="media-body">
										New review received on <a href="#">Server side integration</a> services
										<div class="font-size-sm text-muted mt-1">Feb 2, 10:20</div>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-teal-400 rounded-round btn-icon"><i class="icon-spinner11"></i></a>
									</div>
									
									<div class="media-body">
										<strong>January, 2018</strong> - 1320 new users, 3284 orders, $49,390 revenue
										<div class="font-size-sm text-muted mt-1">Feb 1, 05:46</div>
									</div>
								</li>
							</ul>
						</div>

						<div class="dropdown-content-footer bg-light">
							<a href="#" class="font-size-sm line-height-sm text-uppercase font-weight-semibold text-grey mr-auto">All activity</a>
							<div>
								<a href="#" class="text-grey" data-popup="tooltip" title="Clear list"><i class="icon-checkmark3"></i></a>
								<a href="#" class="text-grey ml-2" data-popup="tooltip" title="Settings"><i class="icon-gear"></i></a>
							</div>
						</div>
					</div>
				</li>

				<li class="nav-item">
					<a href="#" class="navbar-nav-link">
						<i class="icon-switch2"></i>
						<span class="d-md-none ml-2">Logout</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				<span class="font-weight-semibold">Navigation</span>
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<ul class="nav nav-sidebar" data-nav-type="accordion">
				<!-- user menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body">
						<div class="card-body text-center">
							<a href="#">
								<img src="http://localhost/dev-invoice/public/images/demo/users/face6.jpg" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
							</a>
							<h6 class="mb-0 text-white text-shadow-dark">Victoria Baker</h6>
							<span class="font-size-sm text-white text-shadow-dark">Santa Ana, CA</span>
						</div>
													
						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle legitRipple" data-toggle="collapse"><span>My account</span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="#" class="nav-link legitRipple">
									<i class="icon-user-plus"></i>
									<span>My profile</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link legitRipple">
									<i class="icon-coins"></i>
									<span>My balance</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link legitRipple">
									<i class="icon-comment-discussion"></i>
									<span>Messages</span>
									<span class="badge bg-teal-400 badge-pill align-self-center ml-auto">58</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link legitRipple">
									<i class="icon-cog5"></i>
									<span>Account settings</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link legitRipple">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- Main -->
				<li class="nav-item-header">
					<div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
				<li class="nav-item">
					<a href="index.html" class="nav-link active legitRipple">
						<i class="icon-home4"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link legitRipple"><i class="icon-copy"></i> <span>All Invoices</span></a>
				</li>
				<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link legitRipple"><i class="icon-copy"></i> <span>Create Invoice</span></a>

					<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="display: none;">
						<li class="nav-item"><a href="{{ 'invoice_airticket_list' }}" class="nav-link legitRipple">Air Ticket</a></li>

					</ul>
				</li>
				<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link legitRipple"><i class="icon-color-sampler"></i> <span>Resources</span></a>

					<ul class="nav nav-group-sub" data-submenu-title="Themes" style="display: none;">
						<li class="nav-item"><a href="{{ 'airline' }}" class="nav-link legitRipple">Air Line Code</a></li>
						<li class="nav-item"><a href="{{ 'supplier' }}" class="nav-link legitRipple">Suppliers</a></li>

						<li class="nav-item"><a href="{{ 'customer' }}" class="nav-link legitRipple">Customers</a></li>
						<li class="nav-item"><a href="{{ 'hotel' }}" class="nav-link legitRipple">Hotel</a></li>
						<li class="nav-item"><a href="{{ 'transportation' }}" class="nav-link legitRipple">Transportation</a></li>
						<li class="nav-item"><a href="{{ 'paymentmethod' }}" class="nav-link legitRipple">Payment Method</a></li>
					</ul>
				</li>
				<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link legitRipple"><i class="icon-stack"></i> <span>Starter kit</span></a>

					<ul class="nav nav-group-sub" data-submenu-title="Starter kit">
						<li class="nav-item"><a href="http://demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/material/seed/layout_nav_horizontal.html" class="nav-link legitRipple">Horizontal navigation</a></li>
						<li class="nav-item"><a href="http://demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/material/seed/sidebar_none.html" class="nav-link legitRipple">No sidebar</a></li>
						<li class="nav-item"><a href="http://demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/material/seed/sidebar_main.html" class="nav-link legitRipple">1 sidebar</a></li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link legitRipple">2 sidebars</a>
							<ul class="nav nav-group-sub">
								<li class="nav-item"><a href="http://demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/material/seed/sidebar_secondary.html" class="nav-link legitRipple">Secondary sidebar</a></li>
								<li class="nav-item"><a href="http://demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/material/seed/sidebar_right.html" class="nav-link legitRipple">Right sidebar</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link legitRipple">3 sidebars</a>
							<ul class="nav nav-group-sub">
								<li class="nav-item"><a href="http://demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/material/seed/sidebar_right_hidden.html" class="nav-link legitRipple">Right sidebar hidden</a></li>
								<li class="nav-item"><a href="http://demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/material/seed/sidebar_right_visible.html" class="nav-link legitRipple">Right sidebar visible</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link legitRipple">Content sidebars</a>
							<ul class="nav nav-group-sub">
								<li class="nav-item"><a href="http://demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/material/seed/sidebar_content_left.html" class="nav-link legitRipple">Left sidebar</a></li>
								<li class="nav-item"><a href="http://demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/material/seed/sidebar_content_right.html" class="nav-link legitRipple">Right sidebar</a></li>
							</ul>
						</li>
						<li class="nav-item"><a href="http://demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/material/seed/layout_boxed.html" class="nav-link legitRipple">Boxed layout</a></li>
						<li class="nav-item-divider"></li>
						<li class="nav-item"><a href="http://demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/material/seed/navbar_fixed_main.html" class="nav-link legitRipple">Fixed main navbar</a></li>
						<li class="nav-item"><a href="http://demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/material/seed/navbar_fixed_secondary.html" class="nav-link legitRipple">Fixed secondary navbar</a></li>
						<li class="nav-item"><a href="http://demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/material/seed/navbar_fixed_both.html" class="nav-link legitRipple">Both navbars fixed</a></li>
						<li class="nav-item"><a href="http://demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/material/seed/layout_fixed.html" class="nav-link legitRipple">Fixed layout</a></li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="{{ 'companyprofile' }}" class="nav-link legitRipple">
						<i class="icon-list-unordered"></i>
						<span>Company Setting</span>
						<span class="badge bg-blue-400 align-self-center ml-auto">2.2</span>
					</a>
				</li>
				<li class="nav-item"><a href="#" class="nav-link legitRipple"><i class="icon-width"></i> <span>Report</span></a></li>
				<li class="nav-item"><a href="/user" class="nav-link legitRipple"><i class="icon-width"></i> <span>Users</span></a></li>
				<!-- /main -->

				<!-- /page kits -->

			</ul>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">
							<div class="card-body d-md-flex align-items-md-center justify-content-md-between flex-md-wrap">
								<div class="d-flex align-items-center mb-3 mb-md-0 p-3">
									<a href="#" class="btn bg-transparent border-warning-400 text-warning-400 rounded-round border-2 btn-icon">
										<i class="icon-coins"></i>
									</a>
									<div class="ml-3">
										<h5 class="font-weight-semibold mb-0">{{ $invoices->total() }}</h5>
										<span class="text-muted">{{ $total_invoice }}</span>
									</div>
								</div>

								<div class="d-flex align-items-center mb-3 mb-md-0 p-3">
									<a href="#" class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon">
										<i class="icon-coin-dollar"></i>
									</a>
									<div class="ml-3">
										<h5 class="font-weight-semibold mb-0">06:25:00</h5>
										<span class="text-muted">{{ $service_fee }}</span>
									</div>
								</div>
								<div class="d-flex align-items-center mb-3 mb-md-0 p-3">
									<a href="#" class="btn bg-transparent border-success-400 text-success-400 rounded-round border-2 btn-icon">
										<i class="icon-price-tag"></i>
									</a>
									<div class="ml-3">
										<h5 class="font-weight-semibold mb-0">06:25:00</h5>
										<span class="text-muted">{{ $tax }}</span>
									</div>
								</div>

								<div>
									<a href="#" class="btn bg-teal-400"><i class="icon-statistics mr-2"></i> Report</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Dashboard</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="breadcrumb justify-content-center">
							<a href="#" class="breadcrumb-elements-item">
								<i class="icon-comment-discussion mr-2"></i>
								Support
							</a>

							<div class="breadcrumb-elements-item dropdown p-0">
								<a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear mr-2"></i>
									Settings
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
									<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
									<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">
                @yield('content')
			</div>
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</span>

					<ul class="navbar-nav ml-lg-auto">
						<li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
						<li class="nav-item"><a href="http://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
						<li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
	
	
	<script type="text/javascript" src="{{ URL::asset('js/compiled-4.8.0.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js//md.uploadfile.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js//md.rating.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/popper.min.js') }}"></script>
	<script src="{{ URL::asset('js/app.js') }}"></script>

</body>

</html>
