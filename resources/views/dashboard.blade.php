@php use App\Work\Domain\Status; @endphp
<x-app-layout>
  <div class="py-6">
    <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8 flex flex-col gap-4 items-center">
      @can('work.create')
        <a href="{{route('work.create')}}"
           class="w-full text-white group hover:shadow-md shadow-blue-200 dark:shadow-blue-900 rounded-3xl bg-blue-600 hover:bg-blue-800 transition-all py-4 px-6 flex flex-col gap-y-4">
          <div class="font-bold flex justify-between py-4">
            <p class="text-2xl">Solicitar trabajo</p>
            <i class="fa-solid fa-briefcase text-4xl"></i>
          </div>

          <div class="flex flex-col gap-y-3">
            <p class="font-bold">Necesitas ayuda con algun servicio?</p>
            <p class="text-sm">Nosotros encontramos al profesional adecuado</p>
          </div>
        </a>
      @endcan

      @can('work.myworks')
        <div class="flex flex-col w-full">
          <div class="flex justify-between items-center py-4 font-bold">
            <h2 class="text-gray-500 uppercase tracking-wider text-xs">Mis solicitudes</h2>
            <a href="{{route('work.myworks')}}" class="text-blue-600 hover:underline">Ver todas</a>
          </div>

          <div
            class="w-full shadow-lg rounded-3xl bg-white dark:bg-gray-700 p-4 flex flex-col gap-y-2 shadow-gray-200 dark:shadow-gray-800">
            @foreach(Status::cases() as $statusCode)
              <x-dashboard-status-card :status="$statusCode" :href="route('work.myworks', ['status'=> $statusCode])"/>
            @endforeach
          </div>
        </div>
      @endcan
    </div>
  </div>
</x-app-layout>
