<div x-data="{ modalOpen: @entangle('open') }" x-show="modalOpen" class="fixed inset-0 z-50 overflow-y-auto">
  <div class="flex min-h-screen items-end justify-center px-4 text-center sm:block sm:p-0 md:items-center">
    <div x-cloak @click="modalOpen = false" x-show="modalOpen"
         x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-gray-500 bg-opacity-40 transition-opacity" aria-hidden="true"></div>
    <div x-cloak x-show="modalOpen" x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="my-20 inline-block w-full max-w-xl transform overflow-hidden rounded-lg bg-white p-4 text-left shadow-xl transition-all dark:bg-gray-800 2xl:max-w-2xl">
      <div class="flex items-center justify-between space-x-4">
        <h1 class="text-xl font-medium text-gray-800 dark:text-gray-200">Escribe una opinión de
          {{ $user?->name }}</h1>
        <button @click="modalOpen = false"
                class="text-gray-600 hover:text-gray-700 focus:outline-none dark:hover:text-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
               stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </button>
      </div>

      <div
          class="my-4 flex flex-col items-center justify-center gap-1 rounded-lg border border-dashed border-gray-600 p-2 sm:gap-2 sm:py-2">
        <p class="text-gray-500">¿Cómo fue tu experiencia? </p>
        <x-input-error for="rating"/>
        <div class="flex items-center gap-4">
          <div wire:click="$set('rating', 1)" @class([
                        'cursor-pointer rounded-lg hover:bg-amber-500 dark:hover:bg-gray-600 p-2',
                        'bg-amber-500 dark:bg-gray-600' => $rating === 1,
                        'bg-amber-200 dark:bg-gray-900' => $rating !== 1
                    ])>
            <img width="48" src="{{ asset('assets/img/Persevering Face.png') }}"
                 alt="{{ $rating_scale[1] }}" title="{{ $rating_scale[1] }}">
          </div>
          <div wire:click="$set('rating',2)" @class([
                        'cursor-pointer rounded-lg hover:bg-amber-500 dark:hover:bg-gray-600 p-2',
                        'bg-amber-500 dark:bg-gray-600' => $rating === 2,
                        'bg-amber-200 dark:bg-gray-900' => $rating !== 2
                    ])>
            <img width="48" src="{{ asset('assets/img/Confused Face.png') }}"
                 alt="{{ $rating_scale[2] }}" title="{{ $rating_scale[2] }}">
          </div>
          <div wire:click="$set('rating',3)" @class([
                       'cursor-pointer rounded-lg hover:bg-amber-500 dark:hover:bg-gray-600 p-2',
                        'bg-amber-500 dark:bg-gray-600' => $rating === 3,
                        'bg-amber-200 dark:bg-gray-900' => $rating !== 3
                    ])>
            <img width="48" src="{{ asset('assets/img/Face Without Mouth.png') }}"
                 alt="{{ $rating_scale[3] }}" title="{{ $rating_scale[3] }}">
          </div>
          <div wire:click="$set('rating',4)" @class([
                        'cursor-pointer rounded-lg hover:bg-amber-500 dark:hover:bg-gray-600 p-2',
                        'bg-amber-500 dark:bg-gray-600' => $rating === 4,
                        'bg-amber-200 dark:bg-gray-900' => $rating !== 4
                    ])>
            <img width="48" src="{{ asset('assets/img/Slightly Smiling Face.png') }}"
                 alt="{{ $rating_scale[4] }}" title="{{ $rating_scale[4] }}">
          </div>
          <div wire:click="$set('rating',5)" @class([
                        'cursor-pointer rounded-lg hover:bg-amber-500 dark:hover:bg-gray-600 p-2',
                        'bg-amber-500 dark:bg-gray-600' => $rating === 5,
                        'bg-amber-200 dark:bg-gray-900' => $rating !== 5
                    ])>
            <img width="48" src="{{ asset('assets/img/Star Struck.png') }}"
                 alt="{{ $rating_scale[5] }}" title="{{ $rating_scale[5] }}">
          </div>
        </div>
        <h3 class="text-gray-500">{{ $rating_scale[$rating] }}</h3>
      </div>

      <div class="flex flex-col items-center justify-center gap-2">
        <x-input class="w-full" type="text" placeholder="Titulo (opcional)" name="title" id="title"
                 wire:model.defer="title"/>
        <x-input-error for="title"/>
        <textarea name="review" id="review" wire:model.defer="review"
                  class="w-full resize-none rounded-lg border border-gray-300 bg-white p-2 text-gray-700 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                  placeholder="Escribe tu opinion (opcional)" maxlength="255" rows="4"></textarea>
        <x-input-error for="review"/>
      </div>

      <div class="mt-6 flex justify-end">
        <button wire:click="store"
                class="group inline-flex items-center justify-center rounded-lg bg-indigo-700 px-4 py-2.5 text-center text-white hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 dark:focus:ring-indigo-900">
          Publicar
        </button>
      </div>
    </div>
  </div>
</div>
