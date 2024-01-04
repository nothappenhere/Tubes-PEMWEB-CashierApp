<!--
=========================================================
* * Black Dashboard - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/black-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)


* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Profile Settings
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="{{ asset('admin_assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('admin_assets/css/black-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('admin_assets/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper">
      <!-- Sidebar -->
        @include('layouts.sidebar')
      <!-- End of Sidebar -->

    <div class="main-panel">
      <!-- navbar -->
        @include('layouts.navbar')
      <!-- End of navbar -->

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h2 class="title">Edit Profile</h2>
              </div>
              <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address (disabled)</label>
                        <input type="email" class="form-control" disabled="" placeholder="{{ auth()->user()->email }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" value="{{ auth()->user()->username }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" placeholder="Password">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Me</label>
                        <textarea rows="4" cols="80" class="form-control" placeholder="You can describe yourself" value="Mike"></textarea>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary">Save</button>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card card-user">
              <div class="card-body">
                <p class="card-text">
                  <div class="author">
                    <div class="block block-one"></div>
                    <div class="block block-two"></div>
                    <div class="block block-three"></div>
                    <div class="block block-four"></div>
                    <a href="javascript:void(0)">
                      <img class="avatar" src="{{ asset('admin_assets/img/emilyz.jpg') }}" alt="...">
                      <h5 class="title">{{ auth()->user()->name }}</h5>
                    </a>
                    <p class="description">
                      Ceo/Co-Founder
                    </p>
                  </div>
                </p>
                <div class="card-description">
                  Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                </div>
              </div>
              <div class="card-footer">
                <div class="button-container">
                  <button href="javascript:void(0)" class="btn btn-icon btn-round btn-facebook">
                    <i class="fab fa-facebook-f"></i>
                  </button>
                  <button href="javascript:void(0)" class="btn btn-icon btn-round btn-twitter">
                    <i class="fab fa-instagram"></i>
                  </button>
                  <button href="javascript:void(0)" class="btn btn-icon btn-round btn-google">
                    <i class="fab fa-github"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
        @include('layouts.footer')
      <!-- End of Footer -->
    </div>
  </div>

  <!-- Plugins -->
    @include('layouts.plugins')
  <!-- End of Plugins -->

  <!--   Core JS Files   -->
  <script src="{{ asset('admin_assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- Chart JS -->
  <script src="{{ asset('admin_assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('admin_assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('admin_assets/js/black-dashboard.min.js?v=1.0.0') }}"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('admin_assets/demo/demo.js') }}"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
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

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
</body>

</html>