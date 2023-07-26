<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-y-4">
        <div class="flex items-center justify-between">
            <x-input placeholder="Buscar..." type="search" name="search" wire:model="search"/>
            {{ $works->links() }}
        </div>

        @foreach($works as $work)
            <div
                class="text-gray-800 dark:text-gray-400 leading-relaxed text-justify bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent p-4 rounded-lg shadow-md flex flex-col gap-y-5">
                <div class="flex gap-x-10">
                    <a href="{{route('work.show', $work->id)}}"
                       class="text-gray-950 dark:text-gray-100 font-bold text-lg hover:underline">{{$work->title}} </a>
                    <p class="first-letter:uppercase whitespace-nowrap">{{$work->created_at}}</p>
                </div>
                <div class="flex gap-x-2 items-center">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ $work->client->profile_photo_url }}"
                         alt="{{ $work->client->name}}"/>
                    <a href="{{'#gotoClientShow'. $work->client->id}}" class="dark:text-gray-200 hover:underline">{{$work->client->name}}</a>
                </div>
                <div class="border-t border-gray-200 dark:border-gray-600"></div>
                <p>{{$work->description}}</p>

                <span class="dark:text-gray-700 bg-blue-100 mr-auto py-1 px-4 rounded-full">{{$work->skills}}</span>
            </div>
        @endforeach

    </div>
</div>
