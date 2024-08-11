@extends('user.layouts.master')
@section('title', 'TrashECO || DASHBOARD')
@section('users-active', 'active')
@section('main-content')
    <div class="container-fluid">
        @include('user.layouts.notification')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Area Chart -->
            <div class="col-12 col-md-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Income & Withdraw</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body" style="overflow:hidden">
                        <div id="pie_chart_money" style="width:100%;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-12 col-md-6">
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
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    {{-- pie chart --}}
    <script type="text/javascript">
        var product = <?php echo $product; ?>;
        var money = <?php echo $money; ?>;

        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            productChart = () => {
                var data_product = google.visualization.arrayToDataTable(product);
                var options_product = {
                    title: 'Product Count'
                };
                var chart_product = new google.visualization.PieChart(document.getElementById('pie_chart_product'));
                chart_product.draw(data_product, options_product);
            }

            moneyChart = () => {
                var data_money = google.visualization.arrayToDataTable(money);
                var options_money = {
                    title: 'Income & Withdraw'
                };
                var chart_money = new google.visualization.PieChart(document.getElementById('pie_chart_money'));
                chart_money.draw(data_money, options_money);
            }
            productChart()
            moneyChart()
        }
    </script>
@endpush
