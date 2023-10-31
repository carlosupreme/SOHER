<div class="w-full">
    <span class="text-gray-800 dark:text-gray-200 text-2xl font-bold">Solicitudes</span>
    <div class="max-w-2xl mx-auto">
        <canvas id="chart"></canvas>
    </div>
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