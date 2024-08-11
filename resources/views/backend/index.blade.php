@extends('backend.layouts.master')
@section('title', 'ECOSTASH || DASHBOARD')
@section('admin-active', 'active')
@section('main-content')
    <div class="container-fluid">
        @include('backend.layouts.notification')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Category -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Category</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ \App\Models\Category::countActiveCategory() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-sitemap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Products</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ \App\Models\Product::countActiveProduct() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cubes fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Order</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 me-3 font-weight-bold text-gray-800">
                                            {{ \App\Models\Order::countActiveOrder() }}</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <!-- Area Chart -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Faculty Points</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body" style="overflow:hidden">
                        <div id="pie_chart_faculty" style="width:100%;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Product</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body" style="overflow:hidden">
                        <div id="pie_chart_product" style="width:100%;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Row -->

            <!-- Pie Chart -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body" style="overflow:hidden">
                        <div id="pie_chart_user" style="width:100%;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Row -->

        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    {{-- pie chart --}}
    <script type="text/javascript">
        var analytics = <?php echo $users; ?>;
        var product = <?php echo $product; ?>;
        var faculty = <?php echo $faculty; ?>;

        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            userChart = () => {
                var data_user = google.visualization.arrayToDataTable(analytics);
                var options_user = {
                    title: 'Last 7 Days registered user'
                };
                var chart_user = new google.visualization.PieChart(document.getElementById('pie_chart_user'));
                chart_user.draw(data_user, options_user);
            }

            productChart = () => {
                var data_product = google.visualization.arrayToDataTable(product);
                var options_product = {
                    title: 'Product Count'
                };
                var chart_product = new google.visualization.PieChart(document.getElementById('pie_chart_product'));
                chart_product.draw(data_product, options_product);
            }

            facultyChart = () => {
                var data_faculty = google.visualization.arrayToDataTable(faculty);
                var options_faculty = {
                    title: 'Faculty Points'
                };
                var chart_faculty = new google.visualization.PieChart(document.getElementById('pie_chart_faculty'));
                chart_faculty.draw(data_faculty, options_faculty);
            }
            userChart()
            productChart()
            facultyChart()
        }
    </script>
@endpush
