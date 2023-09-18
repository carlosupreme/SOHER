<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
  <div class="mb-4 sm:mt-4">
    {{ Breadcrumbs::render('work.edit', $work) }}
  </div>

  <div class="flex w-full md:grid md:grid-cols-5 md:gap-x-16">
    <div class="no-scrollbar col-span-3 flex flex-col gap-y-5 px-4 pb-6 md:h-[36rem] md:overflow-y-scroll">
      <div class="flex flex-col">
        <label for="title" class="mb-4">
          <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">Escribe el título de tu
            solicitud de trabajo</h3>
          <p class="text-gray-600 dark:text-gray-400">Sé breve y simple, deja los detalles para el
            siguiente
            apartado</p>
        </label>
        <x-input name="title" id="title" wire:model="title" type="text"
                 placeholder="Ejemplo: Necesito un plomero para reparar fuga de agua en baño" maxlength="70"/>

        <x-input-error for="title" class="ml-1"/>
      </div>

      <div class="flex flex-col">
        <label for="description" class="mb-4">
          <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">Explica detalladamente qué
            problema tienes</h3>
          <p class="text-gray-600 dark:text-gray-400">Especifíca todo lo que puedas, esto para agilizar el
            proceso de selección
            del profesional</p>
        </label>
        <textarea name="description" id="description" wire:model="description"
                  class="w-full resize-none rounded-lg border border-gray-300 bg-white p-2 text-gray-700 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                  placeholder="Necesito..." maxlength="2000" rows="8"></textarea>
        <x-input-error for="description" class="ml-1"/>
      </div>

      <div class="flex flex-col">
        <label for="description" class="mb-4">
          <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">Agrega que a categorias
            pertenece el trabajo</h3>
          <p class="text-gray-600 dark:text-gray-400">Selecciona al menos una</p>
        </label>
        <select name="skills" id="skills" wire:model="skills" multiple size="4"
                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-600 dark:focus:ring-blue-600">
          <option value="mecanica">Mecánica</option>
          <option value="plomeria">Plomeria</option>
          <option value="construccion">Construcción</option>
          <option value="electrica">Electrica</option>
        </select>
        <x-input-error for="skills" class="ml-1"/>
      </div>

      <div class="flex flex-col">
        <label for="location">
          <h3 class="mb-4 text-xl font-bold text-gray-800 dark:text-gray-200">¿En dónde se realizará el
            trabajo?</h3>
        </label>
        <x-input name="location" id="location" wire:model="location" type="text"
                 placeholder="Calle Diamante #111, Colonia Bugambilias, Santa Rosa Panzacola" maxlength="100"/>
        <x-input-error for="location" class="ml-1"/>
      </div>

      <div class="flex flex-col">
        <label for="budget">
          <h3 class="mb-4 text-xl font-bold text-gray-800 dark:text-gray-200">¿Cuál es el rango de precios que
            estás dispuesto a negociar?</h3>
        </label>
        <div
            class="flex flex-col items-center justify-center gap-y-4 lg:grid lg:grid-cols-2 lg:place-items-center lg:gap-4">
          <div class="flex items-center gap-x-4 whitespace-nowrap">
            <span class="text-gray-700 dark:text-gray-400">De</span>
            <div class="relative">
                            <span
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">$</span>
              <x-input type="number" name="initialBudget" id="initialBudget" class="pl-7"
                       min="1" wire:model="initialBudget" placeholder="0.00"/>
            </div>
          </div>
          <div class="flex items-center gap-x-4 whitespace-nowrap">
            <span class="text-gray-700 dark:text-gray-400">A</span>
            <div class="relative">
                            <span
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">$</span>
              <x-input type="number" name="initialBudget" id="initialBudget" class="pl-7"
                       min="1" wire:model="finalBudget" placeholder="0.00"/>
            </div>
          </div>
        </div>
        <x-input-error for="initialBudget"/>
        <x-input-error for="finalBudget"/>
      </div>

      <div class="flex flex-col">
        <label for="deadline">
          <h3 class="mb-4 text-xl font-bold text-gray-800 dark:text-gray-200">¿Cuándo estás disponible para
            recibir al
            trabajador?</h3>
        </label>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
          <div class="flex flex-col">
            <label for="day"
                   class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Día</label>
            <select name="day" id="day" wire:model="deadline.day"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-600 dark:focus:ring-blue-600">
              <option value="" disabled selected>Dia</option>
              @for ($i = 1; $i <= $daysInMonth; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>
          <div class="flex flex-col">
            <label for="month"
                   class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Mes</label>
            <select name="month" id="month" wire:model="deadline.month"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-600 dark:focus:ring-blue-600">
              <option value="" disabled selected>Mes</option>
              <option value="1">Enero</option>
              <option value="2">Febrero</option>
              <option value="3">Marzo</option>
              <option value="4">Abril</option>
              <option value="5">Mayo</option>
              <option value="6">Junio</option>
              <option value="7">Julio</option>
              <option value="8">Agosto</option>
              <option value="9">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Noviembre</option>
              <option value="12">Diciembre</option>
            </select>
          </div>
          <div class="flex flex-col">
            <label for="year"
                   class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Año</label>
            <select name="year" id="year" wire:model="deadline.year"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-600 dark:focus:ring-blue-600">
              <option value="" disabled selected>Año</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
            </select>
          </div>
        </div>

        <x-input-error for="deadline.*"/>
      </div>

      <div class="flex flex-col">
        <div class="mb-4">
          <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">Agrega una foto si
            deseas</h3>
          <p class="text-gray-600 dark:text-gray-400">Es opcional pero en algunos casos puede ser de mucha
            ayuda, puedes eliminarla si te equivocas de archivo</p>
          <x-input-error for="newPhoto"/>
        </div>
        <div class="flex w-full items-center justify-center">
          <label for="photo"
                 class="dark:hover:bg-bray-800 flex h-10 w-full cursor-pointer items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <p wire:loading.remove wire:target="newPhoto"
               class="text-sm text-gray-500 dark:text-gray-400">Click aqui para <strong
                  class="font-extrabold">{{ $photo ? ' cambiar la ' : ' subir una ' }}</strong> foto
              &nbsp; <i class="fa-solid fa-paperclip"></i></p>
            <div wire:loading wire:target="newPhoto">
              <x-loader/>
            </div>
            <input id="photo" type="file" class="hidden" wire:model="newPhoto"/>
          </label>
        </div>

        @if ($newPhoto && !$errors->has('newPhoto'))
          <div class="relative">
            <button wire:click="$set('newPhoto', '')"
                    class="absolute left-0 top-2 rounded-tl-lg bg-pink-400 px-4 py-2 text-white hover:bg-pink-700 focus:ring-4 focus:ring-pink-300">
              <i class="fa-solid fa-trash"></i> &nbsp; Eliminar
            </button>
            <img class="my-2 rounded-lg" src="{{ $newPhoto->temporaryUrl() }}"
                 alt="{{ $newPhoto->getClientOriginalName() }}" id="photoPreview">
          </div>
        @elseif($photo)
          <div class="relative">
            <button wire:click="$set('photo', '')"
                    class="absolute left-0 top-2 rounded-tl-lg bg-pink-400 px-4 py-2 text-white hover:bg-pink-700 focus:ring-4 focus:ring-pink-300">
              <i class="fa-solid fa-trash"></i> &nbsp; Eliminar
            </button>
            <img class="my-2 rounded-lg" src="{{ $photo }}" alt="{{ $work->title }}">
          </div>
        @endif
      </div>

      <button wire:click="submitForm"
              class="rounded-md border border-transparent bg-green-600 px-4 py-2.5 text-xs font-semibold uppercase tracking-widest text-white hover:bg-green-800 focus:ring-4 focus:ring-green-300 disabled:cursor-not-allowed disabled:bg-gray-500 md:hidden">
        Completar &nbsp; <i class="fa-solid fa-check"></i>
      </button>

    </div>
    <div class="relative col-span-2 hidden md:mt-20 md:flex md:flex-col md:gap-y-10">
      <h1 class="text-4xl font-bold tracking-wide text-gray-800 dark:text-gray-200">Empecemos a definir el
        problema ...</h1>
      <p class="text-lg text-gray-700 dark:text-gray-400">Deberás proporcionar información relevante para que
        encontremos al
        profesional más adecuado</p>
      <img src="{{ asset('assets/img/work-create.svg') }}" alt="Crear trabajo">
      <button wire:click="submitForm"
              class="absolute -top-20 right-0 rounded-md border border-transparent bg-green-600 px-4 py-2.5 text-xs font-semibold uppercase tracking-widest text-white hover:bg-green-800 focus:ring-4 focus:ring-green-300 disabled:cursor-not-allowed disabled:bg-gray-500">
        Completar &nbsp; <i class="fa-solid fa-check"></i>
      </button>
    </div>
  </div>
</div>
