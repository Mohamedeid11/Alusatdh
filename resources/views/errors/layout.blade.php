
<html lang="en" data-bs-theme="light"><!--begin::Head--><head>
    <title>Metronic - The World's #1 Selling Bootstrap Admin Template by KeenThemes</title>
    <meta charset="utf-8">
    <meta name="description" content="
            The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo,
            Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony &amp; Laravel versions.
            Grab your copy now and get life-time updates for free.
        ">
    <meta name="keywords" content="
            metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js,
            Node.js, Flask, Symfony &amp; Laravel starter kits, admin themes, web design, figma, web development, free templates,
            free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button,
            bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon
        ">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Metronic - The World's #1 Selling Bootstrap Admin Template by KeenThemes">
    <meta property="og:url" content="https://keenthemes.com/metronic">
    <meta property="og:site_name" content="Metronic by Keenthemes">
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8/demo1/authentication/general/error-404.html">
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}">

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700">        <!--end::Fonts-->



    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css">
    <!--end::Global Stylesheets Bundle-->

    <!--begin::Google tag-->
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=G-L98VPZFG7E&amp;l=dataLayer&amp;cx=c"></script><script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-37564768-1');
    </script>
    <!--end::Google tag-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
    <style type="text/css">
        #dse-quicksearchdiv * {
            box-sizing: content-box;
        }

        #dse-quicksearchdiv svg {
            box-sizing: content-box;
        }

        #dse-disabledpopup * {
            box-sizing: content-box;
        }

        #dse-search:before {
            left: -4px !important;
            top: 38% !important;
            height: 6px !important;
            width: 6px !important;
            border: 1px solid #484644 !important;
            border-right: none !important;
            border-top: none !important;
            content: ' ' !important;
            background: #484644 !important;
            position: absolute !important;
            transform: rotate(45deg) !important;
        }

        #dse-disabledpopup:before {
            left: -4px !important;
            top: 38% !important;
            height: 6px !important;
            width: 6px !important;
            border: 1px solid #484644 !important;
            border-right: none !important;
            border-top: none !important;
            content: ' ' !important;
            background: #484644 !important;
            position: absolute !important;
            transform: rotate(45deg) !important;
        }

        .topArrow #dse-search:before {
            left: 50% !important;
            top: -4px !important;
            height: 6px !important;
            width: 6px !important;
            border: 1px solid #484644 !important;
            border-top: none !important;
            border-left: none !important;
            content: ' ' !important;
            background: #484644 !important;
            position: absolute !important;
            transform: rotate(225deg) !important;
        }

        .topArrow #dse-disabledpopup:before {
            left: 50% !important;
            top: -4px !important;
            height: 6px !important;
            width: 6px !important;
            border: 1px solid #484644 !important;
            border-top: none !important;
            border-left: none !important;
            content: ' ' !important;
            background: #484644 !important;
            position: absolute !important;
            transform: rotate(225deg) !important;
        }

        #dse-disabledpopup:hover:before,
        #dse-search:hover:before,
        #dse-moreoptions:hover,
        #dse-search:hover,
        #dse-copy:hover,
        #dse-disabledpopup:hover,
        #dse-lookup:hover,
        #dse-disableFeature:hover {
            background-color: #666 !important;
        }

        #dse-disabledpopup:active:before,
        #dse-search:active:before,
        #dse-moreoptions:active,
        #dse-search:active,
        #dse-copy:active,
        #dse-disabledpopup:active,
        #dse-lookup:active,
        #dse-disableFeature:active {
            background-color: #666 !important;
        }
    </style></head>
<!--end::Head-->

<!--begin::Body-->
<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
<!--begin::Theme mode setup on page load-->
<script>
    var defaultThemeMode = "light";
    var themeMode;

    if ( document.documentElement ) {
        if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if ( localStorage.getItem("data-bs-theme") !== null ) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }

        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }

        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }
</script>
<!--end::Theme mode setup on page load-->
<!--Begin::Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!--End::Google Tag Manager (noscript) -->

<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Page bg image-->
    <style>
        body {
            background-image: url({{asset('assets/media/auth/bg1.jpg')}});
        }

        [data-bs-theme="dark"] body {
            background-image: url({{asset('assets/media/auth/bg1-dark.jpg')}});
        }
    </style>
    <!--end::Page bg image-->
    
    <!--begin::Authentication - Signup Welcome Message -->
    <div class="d-flex flex-column flex-center flex-column-fluid">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center text-center p-10">
            <!--begin::Wrapper-->
            <div class="card card-flush w-lg-650px py-5">
                <div class="card-body py-15 py-lg-20">

                    <!--begin::Title-->
                    <h1 class="fw-bolder fs-2hx text-gray-900 mb-4">
                        Oops!
                    </h1>
                    <!--end::Title-->

                    <!--begin::Text-->
                    <div class="fw-semibold fs-2 text-gray-500 mb-7 ">
                        @yield('message')
                    </div>
                    <!--end::Text-->

                    <!--begin::Illustration-->
                    <div class="mb-3">
                        @yield('code')
                    </div>
                    <!--end::Illustration-->

                    <!--begin::Link-->
                    <div class="mb-0">
                        <a href="{{route('index')}}" class="btn btn-sm btn-primary">Return Home</a>
                    </div>
                    <!--end::Link-->

                </div>
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Authentication - Signup Welcome Message-->
</div>
<!--end::Root-->

<!--begin::Javascript-->
<script>
    var hostUrl = {{asset("assets/")}};
</script>

<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->


<!--end::Javascript-->


<svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1002"></defs><polyline id="SvgjsPolyline1003" points="0,0"></polyline><path id="SvgjsPath1004" d="M0 0 "></path></svg><div id="dse-quicksearch" style="position: fixed; z-index: 10000; display: none;">
    <div id="dse-disabledpopup" style="cursor: pointer;display: block;position: relative;width: fit-content;padding: 8px;line-height: 16px;border: 1px solid #666;border-radius: 6px;background-color: #484644;font-style: normal;font-weight: normal;color:  #fff;font-size: 13px;font-family: Roboto,Arial,Helvetica,sans-serif;box-shadow: 0px 3px 4px 0px rgba(0,0,0,.14);">
        <span style="
            float: left;
            padding: 0px 12px 0px 4px;
            ">
            You've turned off quick searches.
        </span>
        <span id="dse-undo" style="padding: 0px 4px 0px 8px;">
            <span style="
               width: 15px;
               height: 15px;
               float: left;
               ">
                <svg enable-background="new 0 0 16 16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path d="m14.259 2.75c-1.159-1.16-2.688-1.744-4.207-1.743-1.52-.001-3.049.583-4.208 1.743l-2.843 2.827v-2.57c0-.552-.448-1-1-1h-.016c-.552 0-.984.448-.984 1v5c0 .552.432.993.984.993h5.016c.552 0 1-.441 1-.993s-.448-1-1-1h-2.601l2.859-2.843c.774-.773 1.779-1.156 2.793-1.157 1.014.001 2.019.384 2.793 1.157.772.774 1.155 1.778 1.156 2.793-.001 1.014-.384 2.019-1.157 2.793l-4.543 4.543c-.391.391-.391 1.024 0 1.414.391.391 1.024.391 1.414 0l4.543-4.543c1.16-1.159 1.743-2.688 1.742-4.207.002-1.52-.582-3.048-1.741-4.207z" fill="#fff"></path>
                    <path d="m0 0h16v16h-16z" fill="none"></path>
                </svg>
            </span>
            Undo
        </span>
    </div>
    <div id="dse-quicksearchdiv" style="display: inline-block;position: relative;height: 32px;border: 1px solid #666;border-radius: 6px;background-color: #484644; font-style: normal;font-weight: normal;color:  #fff;font-size: 13px;font-family: Roboto,Arial,Helvetica,sans-serif;box-shadow: 0px 3px 4px 0px rgba(0,0,0,.14);">
        <div id="dse-search" style="border-radius: 5px 0px 0px 5px;height:-webkit-fill-available;height:-moz-fit-content;float: left;line-height: 15px;text-align: center;cursor: pointer;box-sizing: border-box;">
            <span style="
               float: left;
               padding: 8px 12px 8px 8px;
               height: -webkit-fill-available;
               ">
                Web
                search
            </span>
        </div>
        <div style="        border-left: 1px solid #D2D0CE;
            float: left;
            margin: 0px;
            top: 0;
            height: 32px;
            "></div>
        <div style="height:-webkit-fill-available;height:-moz-fit-content;float: left;padding: 8px 12px 8px 12px;line-height: 15px;text-align: center;cursor: pointer;" id="dse-copy">
            Copy
        </div>
        <div style="        border-left: 1px solid #D2D0CE;
            height: 32px;
            float: left;
            margin: 0px;
            top: 0;
            "></div>
        <div id="dse-moreoptions" style="border-radius: 0px 5px 5px 0px;height:-webkit-fill-available;height:-moz-fit-content;width: 16px;float: left;padding: 8PX 8px 0px 8px;text-align: center; cursor: pointer;position: relative;">
            <span style="width: 16px;">
                <svg enable-background="new 0 0 16 16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path d="m1.5 6.5c-.828 0-1.5.672-1.5 1.5s.672 1.5 1.5 1.5 1.5-.672 1.5-1.5-.672-1.5-1.5-1.5zm6.5 0c-.828 0-1.5.672-1.5 1.5s.672 1.5 1.5 1.5 1.5-.672 1.5-1.5-.672-1.5-1.5-1.5zm6.5 0c-.828 0-1.5.672-1.5 1.5s.672 1.5 1.5 1.5 1.5-.672 1.5-1.5-.672-1.5-1.5-1.5z" fill="#fff"></path>
                    <path d="m0 0h16v16h-16z" fill="none"></path>
                </svg>
            </span>
        </div>
        <div>
            <span style="width: 160px;border: 1px solid #666;border-radius: 6px;position: absolute;top: 40px;left: 105px;box-shadow: 0px 3px 4px 0px rgba(0,0,0,.14);background-color: #484644;overflow: hidden;" id="dse-popup">
                <div style="padding: 8px 12px;line-height: 15px;font-size: 13px;cursor: pointer;text-align: left;" id="dse-lookup">
                    Define
                </div>
                <hr style="        border: 0.5px solid #D2D0CE;
                  margin: 0;
                  cursor: default;
                  height: 0px;
                  background-color: #3b3a39;">
                <div style="padding: 8px 12px;line-height: 15px;font-size: 13px;cursor: pointer;text-align: left;" id="dse-disableFeature">
                    Turn off quick searches
                </div>
            </span>
        </div>
    </div>


</div>
</body>
<!--end::Body-->
</html>


