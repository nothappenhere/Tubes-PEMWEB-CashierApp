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
        @php
            $canViewDashboard = auth()
                ->user()
                ->can('view_dashboard');
            $canViewDashboardUserGuest = auth()
                ->user()
                ->can('view_dashboard_user_guest');
        @endphp

        @if ($canViewDashboard)
            Admin Dashboard
        @elseif ($canViewDashboardUserGuest)
            User Page
        @endif
    </title>

    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="{{ asset('admin_assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('admin_assets/css/black-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-8">
                                        <h2 class="card-title">Cart List Product</h2>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="{{ route('admin.product.show') }}" type="button"
                                            class="btn btn-warning mb-4">Back</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table tablesorter " id="">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center text-info">#</th>
                                                <th class="text-center text-info">Username</th>
                                                <th class="text-center text-info">Product Name</th>
                                                <th class="text-center text-info">Price</th>
                                                {{-- <th class="text-center text-info">Picture</th> --}}
                                                <th class="text-center text-info">Buying Date</th>
                                                <th class="text-center text-info"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($buyproduct->count() > 0)
                                                @foreach ($buyproduct as $item)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td class="text-center">{{ $item->user->username }}</td>
                                                        <td class="text-center">{{ $item->title }}</td>
                                                        <td class="text-center">Rp {{ $item->price }}</td>
                                                        {{-- <td class="text-center">
                                        <img src="{{ asset('storage/photo-product/' . $item->photo) }}"
                                        alt="Image-Product" width="150">
                                    </td> --}}
                                                        <td class="text-center">{{ $item->created_at }}</td>
                                                        <td class="text-right">
                                                            <div class="dropdown">
                                                                <a class="btn btn-sm btn-icon-only text-light"
                                                                    href="#" role="button" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"
                                                                    x-placement="bottom-end"
                                                                    style="position: absolute; transform: translate3d(-80px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    <a href="{{ route('admin.product.product-detail', ['id' => $item->id]) }}"
                                                                        class="dropdown-item">Detail</a>
                                                                    <a href="#" class="dropdown-item"
                                                                        onclick="confirmDelete({{ $item->id }})">Delete</a>
                                                                    <form id="deleteForm-{{ $item->id }}"
                                                                        action="{{ route('admin.product.product-delete', ['id' => $item->id]) }}"
                                                                        method="POST" style="display: none;"
                                                                        onsubmit="return confirm('Are you sure want to delete this product with ID {{ $item->id }}?')">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center pt-5 pb-5" colspan="6">Product Not Found!
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="text-left pt-lg-4" colspan="3">Total: Rp
                                                    {{ $totalPrice }}</th>
                                                {{-- <form action="{{ route('admin.product.pay') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="totalPrice"
                                                        value="{{ $totalPrice }}"> --}}

                                                    <th>
                                                        <!-- Tambahkan input untuk NO HP -->
                                                        <div class="form-group">
                                                            <label for="phone">Phone:</label>
                                                            <input type="text" name="phone" class="form-control"
                                                                placeholder="Phone Number" value="{{ old('phone') }}">
                                                            @error('phone')
                                                                <small>{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </th>

                                                    <th>
                                                        <!-- Tambahkan input untuk alamat -->
                                                        <div class="form-group">
                                                            <label for="address" class="text-left">Address:</label>
                                                            <input type="text" name="address" class="form-control"
                                                                placeholder="Address" value="{{ old('address') }}">
                                                            @error('address')
                                                                <small>{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </th>

                                                </form>
                                                <th class="text-right pt-lg-4" colspan="2">
                                                    <button type="submit" class="btn btn-primary"
                                                        id="pay-button">Pay</button>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
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

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($message = Session::get('success_payment'))
        <script>
            Swal.fire({
                title: "{{ $message }}",
                timer: 1500
            });
        </script>
    @endif

    <script>
        function confirmDelete(productId) {
            if (confirm('Are you sure want to delete this product with ID ' + productId + '?')) {
                document.getElementById('deleteForm-' + productId).submit();
            }
        }
    </script>

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
