@php use App\Work\Domain\Status; @endphp
<div class="mx-auto flex max-w-7xl flex-col gap-y-4 sm:mt-4 sm:px-6 lg:px-8">
    {{ Breadcrumbs::render('my-works') }}

    <div class="flex flex-col gap-5 px-4 sm:px-0 md:flex-row md:items-center md:justify-between">
        <x-input class="flex-grow" placeholder="Buscar..." type="search" name="search" wire:model="search" />
        <select id="status" wire:model="status"
            class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 pr-8 text-sm capitalize text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
            <option value="">Todos</option>
            @foreach (Status::cases() as $statusCode)
                <option class="capitalize" value="{{ $statusCode->value }}"> {{ __($statusCode->value) }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4 flex flex-col gap-4 px-4 sm:mb-0 sm:px-0 lg:grid lg:grid-cols-2">
        @forelse($works as $work)
            <div
                class="flex flex-col gap-y-5 rounded-lg bg-white p-4 text-justify leading-relaxed text-gray-800 shadow-md dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:text-gray-400">
                <div class="flex flex-col gap-x-10 md:flex-row">
                    <a href="{{ route('work.show', $work->id) }}"
                        class="text-lg font-bold text-gray-950 hover:underline dark:text-gray-100">{{ $work->title }}
                    </a>
                    <p class="md:whitespace-nowrap">Publicado {{ $work->created_at }}</p>
                </div>
                <div class="flex items-center gap-x-2">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ $work->client->profile_photo_url }}"
                        alt="{{ $work->client->name }}" />
                    <a href="{{ route('user.show', $work->client->id) }}"
                        class="hover:underline dark:text-gray-200">{{ $work->client->name }}</a>
                </div>
                <div class="border-t border-gray-200 dark:border-gray-600"></div>
                <p>{{ $work->description }}</p>

                <div class="flex flex-wrap justify-items-start gap-2">
                    @foreach (json_decode($work->skills) as $skill)
                        <span
                            class="rounded-full bg-blue-100 px-4 py-1 first-letter:uppercase dark:text-gray-700">{{ $skill }}</span>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="flex flex-col items-center justify-center gap-y-2 overflow-hidden lg:col-span-2">
                <img class="h-56" src="{{ asset('assets/img/work-not-found.svg') }}" alt="Empty">
                <div>
                    <p class="text-center font-bold text-gray-800 dark:text-gray-200">No hay elementos</p>
                    @if ($search || $status)
                        <p class="text-center text-gray-800 dark:text-gray-200">Prueba con otra búsqueda.</p>
                    @endif
                </div>
            </div>
        @endforelse
    </div>

</div>
