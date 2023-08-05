<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-y-4 sm:mt-4">
        {{ Breadcrumbs::render('work', $work) }}
        {{--        MAKE IT GRID IN MEDIUM SCREENS : md:grid md:grid-cols-2 --}}
        <div class="flex flex-col gap-y-4 gap-x-5 ">
            <div class="flex flex-col gap-5 bg-white dark:bg-gray-800 sm:rounded-lg shadow-lg p-4">
                <div class="flex justify-between gap-12 md:gap-0">
                    <div class="flex flex-col gap-y-1">
                        <h1 class="text-gray-800 font-extrabold text-xl dark:text-gray-200 break-all">{{$work->title}}</h1>
                        <div class="flex items-center gap-x-2">
                            <a href="#" class="font-bold text-blue-500 hover:underline ">{{$work->client->name}}</a>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{$clientRate}}</p>
                        </div>
                    </div>
                    <img class="rounded-full w-12 h-12 sm:w-16 sm:h-16 object-cover"
                         src="{{$work->client->profile_photo_url}}"
                         alt="{{$work->client->name}}">
                </div>


                <div class="flex items-center gap-x-2">
                    <i class="fa-solid fa-location-dot text-red-500"></i>
                    <h2 class="text-gray-700 dark:text-gray-300">{{$work->location}}</h2>
                </div>

                <p class="ml-auto text-sm text-gray-500">{{$work->created_at}}</p>

                <div class="border-t border-gray-200 dark:border-gray-700"></div>

                <div class="flex items-center gap-2 overflow-scroll no-scrollbar">
                    @foreach($work->skills as $skill)
                        <span class="dark:text-gray-700 bg-blue-100 py-1 px-4 rounded-full">{{$skill}}</span>
                    @endforeach
                </div>

                <div>
                    <p class="text-gray-800 dark:text-gray-300 text-justify leading-relaxed">{{$work->description}}</p>
                </div>

                <a href="#work.show-photo"
                   class="flex items-center gap-x-2 relative bg-gray-100 w-fit p-2 rounded-xl" @disabled($work->photo)>
                    <i class="fa-solid fa-image text-green-500"></i> <span>Ver foto</span>
                </a>

                @if($work->photo)
                    <article id="work.show-photo"
                             class="p-2 sm:p-0 flex items-center justify-center fixed z-10 inset-0 backdrop-blur-sm bg-white/20 opacity-0 pointer-events-none transition-opacity">
                        <div class="relative">
                            <a href="#" class="absolute top-2 right-2"><i class="fa-solid fa-xmark text-3xl"></i></a>
                            <img
                                class="w-full select-none max-h-screen sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-7xl"
                                src="{{$work->photo}}" alt="Trabajo 1">
                        </div>
                    </article>
                @endif

                <div class="flex items-center flex-wrap gap-2 font-bold ">
                    <p class="text-gray-700 dark:text-gray-400">Presupuesto a negociar:</p>

                    @if($work->initial_budget === $work->final_budget)
                        <span class="bg-green-500 text-white px-2.5 py-1 rounded-lg shadow-sm"><i
                                class="fa-solid fa-dollar-sign"></i> &nbsp; {{$work->initial_budget}}</span>
                    @else
                        <p class="text-gray-700 dark:text-gray-400">De</p>
                        <span class="bg-green-500 text-white px-2.5 py-1 rounded-lg shadow-sm"><i
                                class="fa-solid fa-dollar-sign"></i> &nbsp; {{$work->initial_budget}}</span>
                        <p class="text-gray-700 dark:text-gray-400">a</p>
                        <span class="bg-green-500 text-white px-2.5 py-1 rounded-lg shadow-sm"><i
                                class="fa-solid fa-dollar-sign"></i> &nbsp; {{$work->final_budget}}</span>
                    @endif
                </div>

                <div>
                    <p class="text-gray-700 dark:text-gray-400"><i class="fa-regular fa-calendar"></i> &nbsp; Fecha
                        solicitada: <strong>{{$fechaSolicitada}}</strong></p>
                </div>

                <div class="border-t border-gray-200 dark:border-gray-700"></div>

                <a href="{{route('work.assign', $work)}}"
                   class="inline-flex items-center justify-center px-4 py-2.5 text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    <i class="fa-regular fa-handshake mr-2 -ml-1"></i>
                    Buscar trabajador
                </a>

            </div>

            {{--            TODO: IMPLEMENT A REVIEW PAGE--}}
            {{--            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg flex flex-col items-center justify-center">--}}
            {{--                <h2 class="text-gray-800 dark:text-gray-200 font-bold">Acerca de {{$work->client->name}}</h2>--}}
            {{--                <div class="flex items-center">--}}
            {{--                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"--}}
            {{--                         fill="currentColor" viewBox="0 0 22 20">--}}
            {{--                        <path--}}
            {{--                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>--}}
            {{--                    </svg>--}}
            {{--                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"--}}
            {{--                         fill="currentColor" viewBox="0 0 22 20">--}}
            {{--                        <path--}}
            {{--                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>--}}
            {{--                    </svg>--}}
            {{--                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"--}}
            {{--                         fill="currentColor" viewBox="0 0 22 20">--}}
            {{--                        <path--}}
            {{--                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>--}}
            {{--                    </svg>--}}
            {{--                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"--}}
            {{--                         fill="currentColor" viewBox="0 0 22 20">--}}
            {{--                        <path--}}
            {{--                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>--}}
            {{--                    </svg>--}}
            {{--                    <svg class="w-4 h-4 text-gray-300 mr-1 dark:text-gray-500" aria-hidden="true"--}}
            {{--                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">--}}
            {{--                        <path--}}
            {{--                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>--}}
            {{--                    </svg>--}}
            {{--                    <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">4.95 de 5</p>--}}

            {{--                    <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>--}}
            {{--                    <a href="#" class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white">73--}}
            {{--                        opiniones</a>--}}

            {{--                </div>--}}

            {{--            </div>--}}
        </div>
    </div>

</div>
