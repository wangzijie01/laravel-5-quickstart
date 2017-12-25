<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lineChart = $this->getLineChart();
        $barChart = $this->getBarChart();
        $pieChart = $this->getPieChart();

        return view('admin.dashboard.index', compact(['lineChart', 'barChart', 'pieChart']));
    }

    /**
     * LineChart.
     * @return mixed
     */
    protected function getLineChart()
    {
        $lineChart = app()->chartjs
            ->name('lineChart')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July'])
            ->datasets([
                [
                    'label' => '新关注',
                    'backgroundColor' => 'rgba(38, 185, 154, 0.31)',
                    'borderColor' => 'rgba(38, 185, 154, 0.7)',
                    'data' => [65, 59, 80, 81, 56, 55, 40],
                ],
                [
                    'label' => '取关数',
                    'backgroundColor' => 'rgba(252, 205, 86, .5)',
                    'borderColor' => 'rgba(236, 180, 37, .9)',
                    'data' => [12, 33, 44, 39, 49, 23, 70],
                ],
            ])
            ->options([
                'scales' => [
                    'yAxes' => [
                        [
                            'ticks' => [
                                'beginAtZero' => true,
                            ],
                        ],
                    ],
                ],
            ]);

        return $lineChart;
    }

    /**
     * BarChart.
     * @return mixed
     */
    protected function getBarChart()
    {
        $barChart = app()->chartjs
            ->name('barChart')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July'])
            ->datasets([
                [
                    'label' => '订单',
                    'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 205, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(201, 203, 207, 0.2)'],
                    'borderColor' => ['rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)', 'rgb(75, 192, 192)', 'rgb(54, 162, 235)', 'rgb(153, 102, 255)', 'rgb(201, 203, 207)'],
                    'borderWidth' => 1,
                    'fill' => false,
                    'data' => [65, 59, 80, 81, 56, 55, 45],
                ],

            ])
            ->options([
                'scales' => [
                    'yAxes' => [
                        [
                            'ticks' => [
                                'beginAtZero' => true,
                            ],
                        ],
                    ],
                ],
            ]);

        return $barChart;
    }

    /**
     * PieChart.
     * @return mixed
     */
    protected function getPieChart()
    {
        $pieChart = app()->chartjs
            ->name('pieChart')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['男', '女', '未知'])
            ->datasets([
                [
                    'backgroundColor' => ['#FF6384', '#36A2EB', '#fCCD56'],
                    'hoverBackgroundColor' => ['#FF6384', '#36A2EB', '#fCCD56'],
                    'data' => [69, 59, 40],
                ],
            ])
            ->options([]);

        return $pieChart;
    }
}
