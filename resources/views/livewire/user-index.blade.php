<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-y-4 sm:mt-4">
    {{Breadcrumbs::render('users')}}

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 px-4 sm:px-0">
        <h1 class="flex-grow font-bold text-xl text-slate-800 dark:text-gray-200">Usuarios</h1>
        <x-input wire:model="search" type="search" placeholder="Buscar..."/>
        @livewire('user-create')
    </div>

    <div class="flex flex-col sm:grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 px-4 sm:px-0">
        @foreach($users as $user)
            <div
                class="w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow">
                <div class="flex flex-col items-center py-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{$user->profile_photo_url}}"
                         alt="{{$user->name}}"/>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$user->name}}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{$user->email}}</span>
                    <div class="flex mt-4 gap-x-3 md:mt-6">
                        <button wire:click="edit({{$user->id}})"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                            Editar
                        </button>
                        <button @disabled($user->id === $currentUserId) wire:click="confirmDelete({{$user->id}})"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-rose-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800 disabled:cursor-not-allowed disabled:opacity-50">
                            Eliminar
                        </button>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

    @livewire('user-edit')

    @livewire('delete-modal',[
             'modalId'=>'deleteUserModal',
             'action'=>'deleteUser',
             'title' => 'Eliminar usuario',
             'content' => '¿Está seguro de que desea eliminar este usuario? <br> <small>Esta acción es irreversible</small>'
    ])
</div>
