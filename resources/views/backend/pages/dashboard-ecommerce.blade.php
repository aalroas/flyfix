@extends('backend.layouts.contentLayoutMaster')

@section('title', 'Dashboard Ecommerce')

@section('vendor-style')


<link rel="stylesheet" href="https://jvectormap.com/css/jquery-jvectormap-2.0.5.css">
{{-- vendor css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
@endsection
@section('page-style')
{{-- Page css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/pages/card-analytics.css')) }}">
@endsection

@section('content')
{{-- Dashboard Ecommerce Starts --}}
<section id="dashboard-ecommerce">
  <div class="row">
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header d-flex flex-column align-items-start pb-0">
          <div class="avatar bg-rgba-primary p-50 m-0">
            <div class="avatar-content">
              <i class="feather icon-users text-primary font-medium-5"></i>
            </div>
          </div>
          <h2 class="text-bold-700 mt-1">92.6k</h2>
          <p class="mb-0">

          </p>

        </div>
        <div class="card-content">
          <div id="line-area-chart-1"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header d-flex flex-column align-items-start pb-0">
          <div class="avatar bg-rgba-success p-50 m-0">
            <div class="avatar-content">
              <i class="feather icon-credit-card text-success font-medium-5"></i>
            </div>
          </div>
          <h2 class="text-bold-700 mt-1">97.5k</h2>
          <p class="mb-0">Revenue Generated</p>
        </div>
        <div class="card-content">
          <div id="line-area-chart-2"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header d-flex flex-column align-items-start pb-0">
          <div class="avatar bg-rgba-danger p-50 m-0">
            <div class="avatar-content">
              <i class="feather icon-shopping-cart text-danger font-medium-5"></i>
            </div>
          </div>
          <h2 class="text-bold-700 mt-1">36%</h2>
          <p class="mb-0">Quarterly Sales</p>
        </div>
        <div class="card-content">
          <div id="line-area-chart-3"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header d-flex flex-column align-items-start pb-0">
          <div class="avatar bg-rgba-warning p-50 m-0">
            <div class="avatar-content">
              <i class="feather icon-package text-warning font-medium-5"></i>
            </div>
          </div>
          <h2 class="text-bold-700 mt-1">97.5K</h2>
          <p class="mb-0">Orders Received</p>
        </div>
        <div class="card-content">
          <div id="line-area-chart-4"></div>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-4 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Browser Statistics</h4>
        </div>
        <div class="card-content">
          <div class="card-body">

            @php
            $total = 0
            @endphp
            @foreach(json_decode($top_browsers, true) as $browser)
            @php
            $total = $total + $browser['sessions'];
            @endphp
            @endforeach
            @foreach(json_decode($top_browsers, true) as $browser)
            <div class="d-flex justify-content-between mb-25">
              <div class="browser-info">
                <p class="mb-25">{{ $browser['browser'] }}</p>
                <h4>@php
                  echo round($browser['sessions'] / $total * 100, 1) . '%';
                  @endphp
                </h4>
              </div>
            </div>
            <div class="progress progress-bar-primary mb-2">
              <div class="progress-bar"
                   role="progressbar"
                   aria-valuenow="{{round($browser['sessions'] / $total * 100, 1)}}"
                   aria-valuemin="{{round($browser['sessions'] / $total * 100, 1) }}"
                   aria-valuemax="100"
                   style="width:{{round($browser['sessions'] / $total * 100, 1) }}%"></div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between pb-0">
          <h4 class="card-title">Customers</h4>

        </div>
        <div class="card-content">
          <div class="card-body py-0">
            <div id="customer-chart2"></div>
          </div>
          <ul class="list-group list-group-flush customer-info">
            @foreach(json_decode($user_types, true) as $user_type)
            <li class="list-group-item d-flex justify-content-between ">
              <div class="series-info">
                <i class="fa fa-circle font-small-3 @if ($loop->first) text-primary  @else text-warning @endif"></i>
                <span class="text-bold-600"> {{ $user_type['type']}} </span>
              </div>
              <div class="product-result">
                <span>{{ $user_type['sessions']}}</span>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      </div>


  </div>


  </div>
</section>
{{-- Dashboard Ecommerce ends --}}
@endsection
@section('vendor-script')
{{-- vendor files --}}
<script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>


@endsection
@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>
<script>
  $(window).on("load", function() {

    var $primary = '#7367F0';
    var $success = '#28C76F';
    var $danger = '#EA5455';
    var $warning = '#FF9F43';
    var $info = '#00cfe8';
    var $primary_light = '#A9A2F6';
    var $danger_light = '#f29292';
    var $success_light = '#55DD92';
    var $warning_light = '#ffc085';
    var $info_light = '#1fcadb';
    var $strok_color = '#b9c3cd';
    var $label_color = '#e7e7e7';
    var $white = '#fff';
    // Customer Chart
    // -----------------------------
    var customerChartoptions = {
      chart: {
        type: 'pie',
        height: 330,
        dropShadow: {
          enabled: false,
          blur: 5,
          left: 1,
          top: 1,
          opacity: 0.2
        },
        toolbar: {
          show: false
        }
      },
      labels: ['New', 'Returning'],
      series: [
        @foreach(json_decode($user_types, true) as $user_type)
        @php echo $user_type['sessions'] @endphp,
        @endforeach
      ],
      dataLabels: {
        enabled: false
      },
      legend: {
        show: false
      },
      stroke: {
        width: 5
      },
      colors: [$primary, $warning],
      fill: {
        type: 'gradient',
        gradient: {
          gradientToColors: [$primary_light, $warning_light]
        }
      }
    }
    var customerChart = new ApexCharts(
      document.querySelector("#customer-chart2"),
      customerChartoptions
    );
    customerChart.render();
  });
</script>

@endsection
