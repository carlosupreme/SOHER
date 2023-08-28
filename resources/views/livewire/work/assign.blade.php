<x-dialog-modal id="assignModal" wire:model="open">
  <x-slot name="title">
    Asignar trabajador
  </x-slot>
  <x-slot name="content">
    <div class="flex flex-col w-full gap-y-4 overflow-y-auto max-h-96 no-scrollbar">
      @foreach($workers as $worker)
        <button wire:click="$set('selected',{{$worker->id}})"
            @class(['transition-colors flex w-full border-0 outline-0 items-center gap-x-2 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 rounded-xl',
                    'bg-gray-50 dark:bg-gray-700' => $selected === $worker->id
            ])>
          <img class="h-10 w-10 rounded-full object-cover" src="{{ $worker->profile_photo_url }}"
               alt="{{ $worker->name }}"/>
          <h1>{{$worker->name}}</h1>
        </button>
      @endforeach
    </div>
  </x-slot>
  <x-slot name="footer">
    <x-secondary-button wire:click="$set('open', false)">Cancelar</x-secondary-button>
    @if($selected !== -1)
      <x-button class="ml-2" wire:click="assign">Aceptar</x-button>
    @endif
  </x-slot>
</x-dialog-modal>
