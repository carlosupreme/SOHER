<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-y-4">
        <div class="flex items-center justify-between gap-x-4 flex-wrap">
            <h1 class="flex-grow font-bold text-xl text-slate-800 dark:text-gray-200">Usuarios</h1>
            <x-input wire:model="search" type="search" placeholder="Buscar..."/>
            @livewire('user-create')
        </div>

        {{-- TODO: IMPLEMENT ROLE FILTER AND GRID AND LIST VIEW
         <div class="bg-white px-1 py-2 flex justify-between rounded-xl">
                    <div class="flex gap-x-6 ">
                        <button
                            class="text-xs font-semibold uppercase rounded-xl px-4 py-2 bg-blue-500 text-gray-50">
                            Todos
                        </button>
                        @foreach($roles as $role)
                            <button wire:click="$set('roleFilter', '{{$role}}')"
                                class="text-slate-500 text-xs font-semibold uppercase rounded-xl px-4 py-2 hover:text-white hover:bg-blue-500 transition-colors ">{{__($role)}}</button>
                        @endforeach
                    </div>

                    <div class="flex gap-x-6">
                        <button @class(['rounded', 'border', 'border-gray-200', 'px-2',
                                'bg-blue-600' => $viewMode === 'grid',
                                'text-white' => $viewMode === 'grid'
                                ]) wire:click="$set('viewMode', 'grid')">
                            <i class="fa-solid fa-grip"></i>
                        </button>
                        <button @class(['rounded', 'border', 'border-gray-200', 'px-2',
                                'bg-blue-600' => $viewMode === 'list',
                                'text-white' => $viewMode === 'list'
                                ]) wire:click="$set('viewMode', 'list')">
                            <i class="fa-solid fa-list"></i></button>
                    </div>


                </div>
        --}}

{{--        @if($viewMode === 'grid')--}}
            <div class="grid grid-cols-4 grid-flow-row gap-4">
                @foreach($users as $user)
                    <div class="shadow-md rounded-xl pt-5 gap-y-4 flex flex-col items-center justify-center bg-white dark:bg-gray-800">
                        <img src="{{$user->profilePhotoUrl}}" alt="{{$user->name}}"
                             class="w-1/4 aspect-square rounded-full shadow-lg object-cover">
                        <div class="grid place-items-center">
                            <h2 class="text-lg text-slate-700 dark:text-gray-100 font-bold">{{$user->name}}</h2>
                            <h3 class="text-gray-400">{{$user->email}}</h3>
                        </div>
                        <div>
                            @foreach($user->getRoleNames() as $rol)
                                <span class="text-xs px-2 py-1 bg-blue-200 rounded-xl capitalize">{{__($rol) }}</span>
                            @endforeach
                        </div>
                        <div class="flex w-full">
                            <button
                                wire:click="edit({{($user->id)}})" @class(['w-full', 'py-2', 'bg-indigo-400' ,'text-white', 'hover:bg-indigo-700', 'focus:ring-4', 'focus:ring-indigo-300', 'rounded-bl-lg' => $currentUserId !== $user->id, 'rounded-b-lg'=> $currentUserId === $user->id])>
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            @if($currentUserId !== $user->id)
                                <button wire:click="confirmDelete({{($user->id)}})"
                                        class="w-full bg-pink-400 text-white hover:bg-pink-700 focus:ring-4 focus:ring-pink-300 rounded-br-lg">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
{{--        @elseif($viewMode === 'list')--}}
{{--            <div class="flex flex-col gap-y-1">--}}
{{--                @foreach($users as $user)--}}
{{--                    <div @class(['bg-white' => $currentUserId !== $user->id, 'bg-green-50' =>$currentUserId === $user->id,'shadow-md', 'rounded-xl', 'p-4', 'flex', 'items-center', 'w-full'])>--}}
{{--                        <img src="{{$user->profilePhotoUrl}}" alt="{{$user->name}}"--}}
{{--                             class="w-20 aspect-square rounded-full shadow-lg object-cover">--}}
{{--                        <div class="mx-5">--}}
{{--                            <h2 class="text-xl text-slate-700 font-bold">{{$user->name}}</h2>--}}
{{--                            <h3 class="text-lg text-slate-500">{{$user->email}}</h3>--}}
{{--                        </div>--}}
{{--                        <div class="flex gap-x-8">--}}
{{--                            @foreach($user->getRoleNames() as $rol)--}}
{{--                                <span--}}
{{--                                    class="px-4 py-1 bg-blue-200 rounded-xl capitalize text-slate-500">{{__($rol) }}</span>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}

{{--                        <div class="ml-auto flex items-center gap-x-5">--}}
{{--                            <button wire:click="edit({{($user->id)}})"--}}
{{--                                    class="bg-indigo-400 text-white hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 rounded-lg px-4 py-2">--}}
{{--                                <i class="fa-solid fa-pen"></i> &nbsp; Editar--}}
{{--                            </button>--}}
{{--                            @if($currentUserId !== $user->id)--}}
{{--                                <button wire:click="confirmDelete({{($user->id)}})"--}}
{{--                                        class="bg-pink-400 text-white hover:bg-pink-700 focus:ring-4 focus:ring-pink-300 rounded-lg px-4 py-2">--}}
{{--                                    <i class="fa-solid fa-trash"></i> &nbsp; Eliminar--}}
{{--                                </button>--}}
{{--                            @endif--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        @endif--}}


        @livewire('user-edit')


        @livewire('delete-modal',[
                 'modalId'=>'deleteUserModal',
                 'action'=>'deleteUser',
                 'title' => 'Eliminar usuario',
                 'content' => '¿Está seguro de que desea eliminar este usuario? <br> <small>Esta acción es irreversible</small>'
        ])

    </div>
</div>
