<?php

namespace App\Http\Livewire\Chart;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

use Livewire\Component;

class Index extends Component
{
    
    public function render()
    {
        $columnChartModel = 
        (LivewireCharts::ColumnChartModel())
        ->setTitle('Expenses by Type')
        ->addColumn('Food', 100, '#f6ad55')
        ->addColumn('Shopping', 200, '#fc8181')
        ->addColumn('Travel', 300, '#90cdf4');

        $pieChartModel = 
        (LivewireCharts::PieChartModel())
        ->setTitle('PieChart COVID-19')
        ->addSlice('Food', 100, '#f6ad55')
        ->addSlice('Shopping', 200, '#fc8181')
        ->addSlice('Travel', 300, '#90cdf4');
        return view('livewire.chart.index')
            ->with([
                'columnChartModel' => $columnChartModel,
                'pieChartModel' => $pieChartModel
            ]);
    }
}
