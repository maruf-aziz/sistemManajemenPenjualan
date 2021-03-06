<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <link href="/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  {{-- <link href="/assets/demo/demo.css" rel="stylesheet" /> --}}

  <script src="/assets/js/core/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

  <style>
    /* Center the loader */

    #loader {

      /* position: absolute;

      left: 50%;

      top: 50%;

      z-index: 1;

      width: 150px;

      height: 150px;

      margin: -75px 0 0 -75px;

      border: 16px solid #f3f3f3;

      border-radius: 50%;

      border-top: 16px solid #3498db;

      width: 120px;

      height: 120px;

      -webkit-animation: spin 2s linear infinite;

      animation: spin 2s linear infinite; */

      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url('/assets/img/loader.gif') 50% 50% no-repeat rgb(249,249,249);
      opacity: .8;

    }



    @-webkit-keyframes spin {

      0% { -webkit-transform: rotate(0deg); }

      100% { -webkit-transform: rotate(360deg); }

    }



    @keyframes spin {

      0% { transform: rotate(0deg); }

      100% { transform: rotate(360deg); }

    }



    /* Add animation to "page content" */

    .animate-bottom {

      position: relative;

      -webkit-animation-name: animatebottom;

      -webkit-animation-duration: 1s;

      animation-name: animatebottom;

      animation-duration: 1s

    }



    @-webkit-keyframes animatebottom {

      from { bottom:-100px; opacity:0 }

      to { bottom:0px; opacity:1 }

    }



    @keyframes animatebottom {

      from{ bottom:-100px; opacity:0 }

      to{ bottom:0; opacity:1 }

    }



    #myDiv {

      display: none;

    }

    .input-css{
      padding: .2em .2em .2em .2em;
      border: 1px solid #aaa;
      border-radius: .2em;
    }

    .select-css {
      display: block;
      font-size: 14px;
      font-family: sans-serif;
      font-weight: 700;
      color: #444;
      line-height: 1.5;
      padding: .3em 1.4em .5em .8em;
      width: 100%;
      max-width: 100%;
      box-sizing: border-box;
      margin: 0;
      border: 1px solid #aaa;
      box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
      border-radius: .2em;
      -moz-appearance: none;
      -webkit-appearance: none;
      appearance: none;
    }
    .select-css::-ms-expand {
      display: none;
    }
    .select-css:hover {
      border-color: #888;
    }
    .select-css:focus {
      border-color: #aaa;
      box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
      box-shadow: 0 0 0 3px -moz-mac-focusring;
      color: #222;
      outline: none;
    }
    .select-css option {
      font-weight:normal;
    }

    .bg-white{
      background-color: white;
    }
  </style>
  

</head>

<body class="" onload="myFunction()" style="margin:0;">
  <div id="loader"></div>
  <div style="display:none;" id="myDiv" class="animate-bottom">
    <div class="wrapper ">
      <div class="sidebar" data-color="purple" data-background-color="white" data-image="/assets/img/sidebar-1.jpg">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo"><a href="/" class="simple-text logo-normal">
          {{-- PT.SAMUDERA INDAH <br>INTERMEDIKA --}}

          <img src="{{ url('/images/logo/logo.png')}}" style="width: 30%" alt="">
          </a></div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item {{ Request::segment(1) == '' | Request::segment(1) == 'home' ? 'active' : '' }}">
              <a class="nav-link" href="/">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item {{ Request::segment(1) == 'users' ? 'active' : '' }}">
              <a class="nav-link" href="/users">
                <i class="material-icons">person</i>
                <p>Profile</p>
              </a>
            </li>
            
            @if (auth()->user()->role == 'admin')              
              <li class="nav-item {{ Request::segment(1) == 'suppliers' ? 'active' : '' }}">
                <a class="nav-link" href="/suppliers">
                  <i class="material-icons">assignment_ind</i>
                  <p>Supplier</p>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'customers' ? 'active' : '' }}">
                <a class="nav-link" href="/customers">
                  <i class="material-icons">people</i>
                  <p>Pelanggan</p>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'products' | Request::segment(1) == 'brands' | Request::segment(1) == 'units' ? 'active' : '' }}">
                <a class="nav-link" href="/products">
                  <i class="material-icons">library_books</i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'transactions' ? 'active' : '' }}">
                <a class="nav-link" href="/transactions">
                  <i class="material-icons">monetization_on</i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'purchases' ? 'active' : '' }}">
                <a class="nav-link" href="/purchases">
                  <i class="material-icons">add_shopping_cart</i>
                  <p>Pembelian</p>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'retur_pembelian' | Request::segment(1) == 'retur_penjualan'  ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">cached</i>
                    Retur
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/retur_pembelian">Retur Pembelian</a>
                  <a class="dropdown-item" href="/retur_penjualan">Retur Penjualan</a>
                </div>
              </li>

            @elseif(auth()->user()->role == 'sales')

              <li class="nav-item {{ Request::segment(1) == 'products' | Request::segment(1) == 'brands' | Request::segment(1) == 'units' ? 'active' : '' }}">
                <a class="nav-link" href="/products">
                  <i class="material-icons">library_books</i>
                  <p>Produk</p>
                </a>
              </li>

            @endif    
            
            <li class="nav-item dropdown {{ Request::segment(1) == 'report_product' | Request::segment(1) == 'report_penjualan' | Request::segment(1) == 'report_pembelian' | Request::segment(1) == 'report_retur_penjualan' | Request::segment(1) == 'report_retur_pembelian' ? 'active' : '' }}">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">dynamic_feed</i>
                  Laporan
              </a>
              <div class="dropdown-menu">
                @if (auth()->user()->role == 'sales')
                    <a class="dropdown-item" href="/report_product">Laporan Barang</a>   
                @else
                  <a class="dropdown-item" href="/report_product">Laporan Barang</a>
                  <a class="dropdown-item" href="/report_penjualan">Laporan Penjualan</a>
                  <a class="dropdown-item" href="/report_pembelian">Laporan Pembelian</a>
                  <a class="dropdown-item" href="/report_retur_penjualan">Laporan Retur Penjualan</a>
                  <a class="dropdown-item" href="/report_retur_pembelian">Laporan Retur Pembelian</a>
                @endif												
                
                {{-- <div class="dropdown-divider"></div> --}}
              </div>
            </li>
            <li class="nav-item active-pro ">
              <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class="material-icons">report</i>
                <p>Log Out</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <a class="navbar-brand" href="javascript:;">
                @yield('title_pages')
              </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
              <ul class="navbar-nav">
                {{-- <li class="nav-item dropdown">
                  <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">notifications</i>
                    <span class="notification">5</span>
                    <p class="d-lg-none d-md-block">
                      Some Actions
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Mike John responded to your email</a>
                    <a class="dropdown-item" href="#">You have 5 new tasks</a>
                    <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                    <a class="dropdown-item" href="#">Another Notification</a>
                    <a class="dropdown-item" href="#">Another One</a>
                  </div>
                </li> --}}
                <li class="nav-item dropdown">
                  <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">person</i>
                    <p class="d-lg-none d-md-block">
                      Account
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                    <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->

        @yield('content')
        

        {{-- <footer class="footer">
          <div class="container-fluid">
            <nav class="float-left">
              <ul>
                <li>
                  <a href="https://www.creative-tim.com">
                    Creative Tim
                  </a>
                </li>
                <li>
                  <a href="https://creative-tim.com/presentation">
                    About Us
                  </a>
                </li>
                <li>
                  <a href="http://blog.creative-tim.com">
                    Blog
                  </a>
                </li>
                <li>
                  <a href="https://www.creative-tim.com/license">
                    Licenses
                  </a>
                </li>
              </ul>
            </nav>
            <div class="copyright float-right">
              &copy;
              <script>
                document.write(new Date().getFullYear())
              </script>, made with <i class="material-icons">favorite</i> by
              <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
            </div>
          </div>
        </footer> --}}
      </div>
    </div>
    {{-- <div class="fixed-plugin">
      <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
          <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
          <li class="header-title"> Sidebar Filters</li>
          <li class="adjustments-line">
            <a href="javascript:void(0)" class="switch-trigger active-color">
              <div class="badge-colors ml-auto mr-auto">
                <span class="badge filter badge-purple" data-color="purple"></span>
                <span class="badge filter badge-azure" data-color="azure"></span>
                <span class="badge filter badge-green" data-color="green"></span>
                <span class="badge filter badge-warning" data-color="orange"></span>
                <span class="badge filter badge-danger" data-color="danger"></span>
                <span class="badge filter badge-rose active" data-color="rose"></span>
              </div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li class="header-title">Images</li>
          <li class="active">
            <a class="img-holder switch-trigger" href="javascript:void(0)">
              <img src="/assets/img/sidebar-1.jpg" alt="">
            </a>
          </li>
          <li>
            <a class="img-holder switch-trigger" href="javascript:void(0)">
              <img src="/assets/img/sidebar-2.jpg" alt="">
            </a>
          </li>
          <li>
            <a class="img-holder switch-trigger" href="javascript:void(0)">
              <img src="/assets/img/sidebar-3.jpg" alt="">
            </a>
          </li>
          <li>
            <a class="img-holder switch-trigger" href="javascript:void(0)">
              <img src="/assets/img/sidebar-4.jpg" alt="">
            </a>
          </li>
        </ul>
      </div>
    </div> --}}
  </div>
  <!--   Core JS Files   -->
  
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="/assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  {{-- <script src="/assets/js/plugins/sweetalert2.js"></script> --}}
  <!-- Forms Validations Plugin -->
  <script src="/assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="/assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  {{-- <script src="/assets/js/plugins/jquery.dataTables.min.js"></script> --}}
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="/assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="/assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="/assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="/assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="/assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="/assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
  <!-- Chartist JS -->
  <script src="/assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  {{-- <script src="/assets/demo/demo.js"></script> --}}
  
  @yield('footer')
  <script>

    // Loading Page
    
    var myVar;
    
    
    
    function myFunction() {
    
    myVar = setTimeout(showPage, 100);
    
    }
    
    
    
    function showPage() {
    
    document.getElementById("loader").style.display = "none";
    
    document.getElementById("myDiv").style.display = "block";
    
    }
    
    </script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });

    $(document).ready(function() {
        $('#example').DataTable();
        $('table.display').DataTable({
          "pageLength": 5,
          // "ordering": false,
          "lengthMenu": [[5, 20, 50, -1], [5, 20, 50, "All"]]
        });
        $('#transaksi').DataTable({
          "pageLength": 10,
          "ordering": false,
          "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]]
        });
        $('#produk').DataTable({
          "pageLength": 20,
          "ordering": false,
          "lengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]]
        });
    } );

    
  </script>
</body>

</html>