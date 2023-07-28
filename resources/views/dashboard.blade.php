<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center items-center">

            <a href="{{route('work.create')}}"
               class="group shadow-lg rounded-lg bg-orange-50 dark:bg-gray-700 hover:bg-orange-400 dark:hover:bg-orange-400 transition-colors p-4 flex flex-col gap-y-4 items-center">
                <div
                    class="rounded-full bg-orange-500 text-white grid place-items-center p-5 text-2xl border-white border-4">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
                <h2 href="" class="group-hover:text-white text-xl text-orange-700 dark:text-orange-400 font-extrabold">
                    Crear solicitud</h2>
            </a>

        </div>
    </div>
</x-app-layout>
