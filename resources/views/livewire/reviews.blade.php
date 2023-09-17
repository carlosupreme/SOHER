<div id="reviews" class="my-4 flex w-full flex-col gap-y-4 rounded-b-lg rounded-t-lg bg-white p-4 dark:bg-gray-800">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-x-2">
            <h2 class="text-2xl font-extrabold text-gray-800 dark:text-gray-200">Opiniones</h2>
            <p class="text-gray-600 dark:text-gray-400">{{ $reviews->count() }}</p>
        </div>
        <x-button wire:click="create">Opinar &nbsp; <i class="fa-solid fa-pen"></i></x-button>
    </div>
    {{--  Filters  --}}
    {{--  <div class="flex gap-x-4"> --}}
    {{--    <div class="relative flex text-gray-800 dark:text-gray-200"> --}}
    {{--      <x-dropdown align="left" width="48"> --}}
    {{--        <x-slot name="trigger"> --}}
    {{--              <span class="inline-flex rounded-md"> --}}
    {{--                  <button type="button" --}}
    {{--                          class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150"> --}}
    {{--                      Verificados --}}
    {{--                      <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" --}}
    {{--                           viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> --}}
    {{--                          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/> --}}
    {{--                      </svg> --}}
    {{--                  </button> --}}
    {{--              </span> --}}
    {{--        </x-slot> --}}

    {{--        <x-slot name="content"> --}}
    {{--          <x-dropdown-link href="#reviews"> --}}
    {{--            Todos --}}
    {{--          </x-dropdown-link> --}}
    {{--        </x-slot> --}}
    {{--      </x-dropdown> --}}
    {{--    </div> --}}
    {{--    <div class="relative flex text-gray-800 dark:text-gray-200"> --}}
    {{--      <x-dropdown align="left" width="48"> --}}
    {{--        <x-slot name="trigger"> --}}
    {{--              <span class="inline-flex rounded-md"> --}}
    {{--                  <button type="button" --}}
    {{--                          class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150"> --}}
    {{--                      Todos --}}
    {{--                      <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" --}}
    {{--                           viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> --}}
    {{--                          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/> --}}
    {{--                      </svg> --}}
    {{--                  </button> --}}
    {{--              </span> --}}
    {{--        </x-slot> --}}

    {{--        <x-slot name="content"> --}}
    {{--          <x-dropdown-link href="#reviews" class="flex"> --}}
    {{--            <svg class="mr-1 h-4 w-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" --}}
    {{--                 fill="currentColor" --}}
    {{--                 viewBox="0 0 22 20"> --}}
    {{--              <path --}}
    {{--                      d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/> --}}
    {{--            </svg> --}}
    {{--          </x-dropdown-link> --}}
    {{--          <x-dropdown-link href="#reviews" class="flex"> --}}
    {{--            @for ($i = 1; $i <= 2; $i++) --}}
    {{--              <svg class="mr-1 h-4 w-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" --}}
    {{--                   fill="currentColor" --}}
    {{--                   viewBox="0 0 22 20"> --}}
    {{--                <path --}}
    {{--                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/> --}}
    {{--              </svg> --}}
    {{--            @endfor --}}
    {{--          </x-dropdown-link> --}}
    {{--          <x-dropdown-link href="#reviews" class="flex"> --}}
    {{--            @for ($i = 1; $i <= 3; $i++) --}}
    {{--              <svg class="mr-1 h-4 w-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" --}}
    {{--                   fill="currentColor" --}}
    {{--                   viewBox="0 0 22 20"> --}}
    {{--                <path --}}
    {{--                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/> --}}
    {{--              </svg> --}}
    {{--            @endfor --}}
    {{--          </x-dropdown-link> --}}
    {{--          <x-dropdown-link href="#reviews" class="flex"> --}}
    {{--            @for ($i = 1; $i <= 4; $i++) --}}
    {{--              <svg class="mr-1 h-4 w-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" --}}
    {{--                   fill="currentColor" --}}
    {{--                   viewBox="0 0 22 20"> --}}
    {{--                <path --}}
    {{--                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/> --}}
    {{--              </svg> --}}
    {{--            @endfor --}}
    {{--          </x-dropdown-link> --}}
    {{--          <x-dropdown-link href="#reviews" class="flex"> --}}
    {{--            @for ($i = 1; $i <= 5; $i++) --}}
    {{--              <svg class="mr-1 h-4 w-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" --}}
    {{--                   fill="currentColor" --}}
    {{--                   viewBox="0 0 22 20"> --}}
    {{--                <path --}}
    {{--                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/> --}}
    {{--              </svg> --}}
    {{--            @endfor --}}
    {{--          </x-dropdown-link> --}}
    {{--        </x-slot> --}}
    {{--      </x-dropdown> --}}
    {{--    </div> --}}
    {{--  </div> --}}
    <div class="border-t border-gray-200 dark:border-gray-700"></div>
    <section class="flex flex-col gap-y-4">
        @foreach ($reviews as $review)
            <article class="flex flex-col gap-y-4">
                <div class="flex flex-col gap-y-2">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('user.show', ['user' => $review->from_user->id]) }}"
                            class="font-bold text-gray-800 hover:underline dark:text-gray-300">{{ $review->from_user->name }}</a>
                        <h4 class="text-gray-600 dark:text-gray-500">{{ $review->created_at }}</h4>
                    </div>
                    <div class="flex items-center">
                        @for ($i = 1; $i <= round(number_format($review->rating, 1)); $i++)
                            <svg class="mr-1 h-4 w-4 text-yellow-300" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                        @endfor
                        @for ($i = 1; $i <= 5 - round(number_format($review->rating, 1)); $i++)
                            <svg class="mr-1 h-4 w-4 text-gray-300 dark:text-gray-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                        @endfor
                    </div>
                </div>
                <h1 class="text-justify font-bold text-gray-800 dark:text-gray-200">{{ $review->title }}</h1>
                <p class="text-justify text-gray-800 dark:text-gray-300">{{ $review->review }}</p>
            </article>
            @unless ($loop->last)
                <div class="border-t border-gray-200 dark:border-gray-700"></div>
            @endunless
        @endforeach
    </section>

    @livewire('create-review-modal')
</div>
