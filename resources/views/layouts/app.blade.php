<!DOCTYPE html>
<!--
Author:
    1.Norita
    2.Nawa
    3.Asilah
    4.Izzah
    5.Nurin
Bootstrap Name: Metronic
laravel Version: 11.45.1
PHP Version: 8.3.19
Website: https://service_desk.com
-->
<html lang="en">
	<head><base href=""/>
        <title>{{ config('app.name') }} &bull; @yield('title')</title>
		<meta charset="utf-8" />
		<meta name="description" content="Service Desk" />
		<meta name="keywords" content="Sevice Desk" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Service Desk" />
		<meta property="og:url" content="https://service_desk.com" />
		<meta property="og:site_name" content="G9" />
		{{-- <link rel="shortcut icon" href="{{ asset ('metronic/assets/media/logoservicedesk.png')}}" /> --}}
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        @yield('css_after')
		<link href="{{ asset ('metronic/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset ('metronic/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
	</head>
	<body id="kt_body" class="aside-enabled" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on">
		{{-- <script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script> --}}
        <div class="page-loader page-loader flex-column bg-dark bg-opacity-25">
            <span class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </span>
        </div>
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
                @include('layouts.leftsidebar')
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<div id="kt_header" style="" class="header align-items-stretch">
                        <div class="header-brand">
                            <a href="" class="logo text-center">
                                <span class="logo-lg">
                                {{-- <img alt="Logo" src="{{ asset ('metronic/assets/media/logos/ppst.png')}}" alt=""/> --}}
                            </span>
                            </a>
                            <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-minimize" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
                                <i class="ki-duotone ki-entrance-right fs-1 me-n1 minimize-default">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <i class="ki-duotone ki-entrance-left fs-1 minimize-active">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <div class="d-flex align-items-center d-lg-none me-n2" title="Show aside menu">
                                <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
                                    <i class="ki-duotone ki-abstract-14 fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            </div>
                        </div>
                        <div class="toolbar d-flex align-items-stretch">
                            <div class="container-xxl py-6 py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">
                                <div class="page-title d-flex justify-content-center flex-column me-5">
                                    <h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">@yield('page-header')</h1>
                                    <ul class="breadcrumb fs-7 pt-1 fw-semibold">
										<li class="breadcrumb-item text-dark">
                                            @yield('breadcrumbs')
                                         </li>
                                    </ul>
                                </div>
                                <div class="d-flex align-items-stretch overflow-auto pt-3 pt-lg-0">
                                    <div class="d-flex align-items-center" style="padding-right: 10px">
                                        <div class="d-flex">
                                            <a href="#" class="text-black text-hover-primary fs-6 fw-bold"></a>
                                            <h2 class="d-flex flex-column text-dark fw-bold fs-6 mb-0">{{ Illuminate\Support\Str::title(optional(Auth::user())->name) }}</h2>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center" style="padding-right: 5px">
                                        <div class="d-flex">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-35px">

                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="btn btn-sm btn-icon btn-icon-muted btn-active-icon-primary" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-night-day theme-light-show fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                                <span class="path6"></span>
                                                <span class="path7"></span>
                                                <span class="path8"></span>
                                                <span class="path9"></span>
                                                <span class="path10"></span>
                                            </i>
                                            <i class="ki-duotone ki-moon theme-dark-show fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                                            <div class="menu-item px-3 my-0">
                                                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                                                    <span class="menu-icon" data-kt-element="icon">
                                                        <i class="ki-duotone ki-night-day fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                            <span class="path4"></span>
                                                            <span class="path5"></span>
                                                            <span class="path6"></span>
                                                            <span class="path7"></span>
                                                            <span class="path8"></span>
                                                            <span class="path9"></span>
                                                            <span class="path10"></span>
                                                        </i>
                                                    </span>
                                                    <span class="menu-title">Light</span>
                                                </a>
                                            </div>
                                            <div class="menu-item px-3 my-0">
                                                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                                    <span class="menu-icon" data-kt-element="icon">
                                                        <i class="ki-duotone ki-moon fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                    <span class="menu-title">Dark</span>
                                                </a>
                                            </div>
                                            <div class="menu-item px-3 my-0">
                                                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                                                    <span class="menu-icon" data-kt-element="icon">
                                                        <i class="ki-duotone ki-screen fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                            <span class="path4"></span>
                                                        </i>
                                                    </span>
                                                    <span class="menu-title">System</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<div class="post d-flex flex-column-fluid" id="kt_post">
                            @yield('content')
						</div>
					</div>
                    <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<div class="text-dark order-2 order-md-1">
								Service Desk
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-duotone ki-arrow-up">
				<span class="path1"></span>
				<span class="path2"></span>
			</i>
		</div>
		<script>var hostUrl = "assets/";</script>
		<script src="{{ asset ('metronic/assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{ asset ('metronic/assets/js/scripts.bundle.js')}}"></script>
        @yield('js_after')
        @yield('scripts')
		{{-- <script src="https://unpkg.com/sweetalert2@11.9.0/dist/sweetalert2.all.js"></script> --}}
        @include('sweetalert::alert')
	</body>
</html>
