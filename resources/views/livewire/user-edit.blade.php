<div>
  <x-dialog-modal wire:model="open">
    <x-slot name="title">
      <h2><strong>Editar Usuario</strong></h2>
    </x-slot>
    <x-slot name="content">
      <div class="grid grid-cols-2 gap-4">
        <div class="col-span-2 md:col-span-1">
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-2"
                 for="nombre">Nombre</label>
          <x-input class="w-full" wire:model="nombre" type="text" name="nombre" id="nombre"/>
          <x-input-error for="nombre"/>
        </div>

        <div class="col-span-2 md:col-span-1">
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-2"
                 for="correo">Correo</label>
          <x-input class="w-full" wire:model="correo" type="text" name="correo" id="correo"/>
          <x-input-error for="correo"/>
        </div>

        <div class="col-span-2">
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-2"
                 for="role">Roles</label>
          <div class="flex flex-wrap gap-8 w-full mt-1">
            @foreach($rolesOptions as $role)
              <label class="block text-sm font-medium text-gray-700" for="{{$role['id']}}">
                <input class="focus:ring-indigo-500 text-indigo-600 border-gray-300 rounded w-5 h-5"
                       id="{{$role['id']}}" type="checkbox" wire:model="roles" value="{{$role['id']}}">
                <span class="ml-2 cursor-pointer dark:text-gray-400">{{__($role['name'])}}</span>
              </label>
            @endforeach
          </div>
          <x-input-error for="roles"/>
        </div>

      </div>

    </x-slot>
    <x-slot name="footer">
      <x-secondary-button wire:click="resetValues" class="mr-2">Cancelar</x-secondary-button>
      <button wire:click="updateUser"
              class="px-4 py-2.5 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
        Editar
      </button>
    </x-slot>
  </x-dialog-modal>
</div>
