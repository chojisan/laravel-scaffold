@extends('layouts.backend')

@section('content')
<dashboard-view inline-template>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <card type="default" header-classes="bg-transparent">
                    <div slot="header" class="row align-items-center">
                        <div class="col">
                            <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                            <h5 class="h3 text-white mb-0">Sales value</h5>
                        </div>
                        <div class="col">
                            <ul class="nav nav-pills justify-content-end">
                                <li class="nav-item mr-2 mr-md-0">
                                    <a class="nav-link py-2 px-3"
                                       href="#"
                                       :class="{active: bigLineChart.activeIndex === 0}"
                                       @click.prevent="initBigChart(0)">
                                        <span class="d-none d-md-block">Month</span>
                                        <span class="d-md-none">M</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-2 px-3"
                                       href="#"
                                       :class="{active: bigLineChart.activeIndex === 1}"
                                       @click.prevent="initBigChart(1)">
                                        <span class="d-none d-md-block">Week</span>
                                        <span class="d-md-none">W</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <line-chart
                            :height="350"
                            ref="bigChart"
                            :chart-data="bigLineChart.chartData"
                            :extra-options="bigLineChart.extraOptions"
                    >
                    </line-chart>

                </card>
            </div>

            <div class="col-xl-4">
                <card header-classes="bg-transparent">
                    <div slot="header" class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                            <h5 class="h3 mb-0">Total orders</h5>
                        </div>
                    </div>

                    <bar-chart
                            :height="350"
                            ref="barChart"
                            :chart-data="redBarChart.chartData"
                    >
                    </bar-chart>
                </card>
            </div>
        </div>
        <!-- End charts-->

        <!--Tables-->

        <!--End tables-->
    </div>
</dashboard-view>
@endsection
