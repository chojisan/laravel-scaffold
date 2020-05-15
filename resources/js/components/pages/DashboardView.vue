<script>
//import DashboardNavbar from "../partials/DashboardNavbar";

// Charts
import * as chartConfigs from "../bootstrap/Charts/config";
import LineChart from "../bootstrap/Charts/LineChart";
import BarChart from "../bootstrap/Charts/BarChart";

// Tables
//import SocialTrafficTable from './Dashboard/SocialTrafficTable';
//import PageVisitsTable from './Dashboard/PageVisitsTable';

export default {
    components: {
        //DashboardNavbar,
        LineChart,
        BarChart
    },
    data() {
        return {
            bigLineChart: {
                allData: [
                    [0, 20, 10, 30, 15, 40, 20, 60, 60],
                    [0, 20, 5, 25, 10, 30, 15, 40, 40]
                ],
                activeIndex: 0,
                chartData: {
                    datasets: [],
                    labels: []
                },
                extraOptions: chartConfigs.blueChartOptions
            },
            redBarChart: {
                chartData: {
                    labels: ["Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [
                        {
                            label: "Sales",
                            data: [25, 20, 30, 22, 17, 29]
                        }
                    ]
                }
            }
        };
    },
    methods: {
        initBigChart(index) {
            let chartData = {
                datasets: [
                    {
                        label: "Performance",
                        data: this.bigLineChart.allData[index]
                    }
                ],
                labels: ["May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
            };
            this.bigLineChart.chartData = chartData;
            this.bigLineChart.activeIndex = index;
        }
    },
    mounted() {
        this.initBigChart(0);
    }
};
</script>

<style></style>
