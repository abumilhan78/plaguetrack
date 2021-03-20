<div>
    <div class="card-body">
        <div class="row">
            <livewire:livewire-column-chart
            :column-chart-model="$columnChartModel"/>
        </div>
        <div class="row mt-5">
            <livewire:livewire-pie-chart
            :pie-chart-model="$pieChartModel" style="width: 50vh; height:50vh;"/>
        </div>
        

<livewire:scripts />
@livewireChartsScripts
    </div>
</div>
