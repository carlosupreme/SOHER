<div class="w-full">
    <a href="{{route('work.index')}}" class="w-full flex flex-col gap-y-3">
        <span class="text-gray-800 dark:text-gray-200 text-2xl font-bold">Solicitudes</span>
        <canvas id="chart"></canvas>
    </a>
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.js" integrity="sha512-6HrPqAvK+lZElIZ4mZ64fyxIBTsaX5zAFZg2V/2WT+iKPrFzTzvx6QAsLW2OaLwobhMYBog/+bvmIEEGXi0p1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener('livewire:load', function() {
            const config = {
                type: 'doughnut',
                data: @this.data,
            };

            new Chart(document.getElementById("chart"), config)
        })
    </script>
    @endpush
</div>