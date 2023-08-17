<x-app-layout>
  <div class="mx-auto flex max-w-7xl flex-col items-center gap-y-4 sm:mt-4 sm:px-6 lg:px-8">
    {{ Breadcrumbs::render('user', $user) }}

    <div class="mx-10 flex w-full flex-col rounded-b-lg bg-white dark:bg-gray-800 sm:mx-0">
      <div class="relative h-36 w-full rounded-t-lg bg-gradient-to-r from-rose-400 to-orange-300">
        <img
                class="absolute -bottom-16 left-6 aspect-square h-32 w-32 rounded-full border-4 border-solid border-white object-cover dark:border-gray-800"
                src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
      </div>

      <div class="ml-6 mt-16 flex flex-col gap-y-2 pb-4">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">{{ $user->name }}</h1>

        <x-rating :client="$user"/>
        <p class></p>
        <h2 class="text-lg font-bold text-gray-700 dark:text-gray-400">{{ $user->email }}</h2>
        <div class="flex gap-x-2 py-2 text-xs font-bold tracking-wide text-white">
          @foreach ($user->roles as $role)
            <span @class([
                            'px-2 py-1 rounded-lg cursor-default',
                            'bg-blue-500' => $role->name === 'admin',
                            'bg-indigo-500' => $role->name === 'client',
                            'bg-green-500' => $role->name === 'worker',
                        ])>
                            {{ __($role->name) }}
                        </span>
          @endforeach
        </div>
        <h3 class="text-gray-700 dark:text-gray-400"><i class="fa-solid fa-phone text-indigo-500"></i> &nbsp;
          {{ $user->phone }}
        </h3>
      </div>
    </div>

  </div>
</x-app-layout>
