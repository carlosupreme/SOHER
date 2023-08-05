@unless ($breadcrumbs->isEmpty())
    <nav class="w-full flex px-5 py-3 text-gray-700 sm:rounded-lg bg-white dark:bg-gray-800" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 overflow-x-scroll no-scrollbar">
            @foreach ($breadcrumbs as $breadcrumb)
                @if(!$loop->last)
                    <li>
                        <div class="flex items-center">
                            @unless($loop->first)
                                <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="m1 9 4-4-4-4"/>
                                </svg>
                            @endunless
                            <a href="{{ $breadcrumb->url }}"
                               class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                {{ $breadcrumb->title }}
                            </a>
                        </div>
                    </li>
                @else
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="m1 9 4-4-4-4"/>
                            </svg>
                            <span
                                class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{$breadcrumb->title}}</span>
                        </div>
                    </li>
                @endif

            @endforeach
        </ol>
    </nav>
@endunless
