@unless ($breadcrumbs->isEmpty())
    <nav class="w-full">
        <ol class="p-4 sm:rounded-lg flex flex-wrap bg-white dark:bg-gray-800 shadow text-sm text-gray-800 dark:text-white">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <li>
                        <a href="{{ $breadcrumb->url }}" class="text-blue-600 hover:text-blue-900 hover:underline focus:text-blue-900 focus:underline">
                            {{ $breadcrumb->title }}
                        </a>
                    </li>
                @else
                    <li>
                        {{ $breadcrumb->title }}
                    </li>
                @endif

                @unless($loop->last)
                    <li class="text-gray-500 px-2">
                        /
                    </li>
                @endif

            @endforeach
        </ol>
    </nav>
@endunless
