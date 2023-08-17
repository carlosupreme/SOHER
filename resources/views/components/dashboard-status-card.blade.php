<a {{$attributes}}
   class="group flex gap-x-2 items-center justify-between pr-4 rounded-xl bg-white hover:bg-gray-100 dark:bg-gray-700 hover:dark:bg-gray-600 cursor-pointer transition-colors">
  <div class="flex gap-x-2 items-center">
    <div @class(["rounded-xl font-bold text-lg w-12 h-12 text-white grid place-items-center",$status->tailwindBgColor()])>
      {!! $status->htmlIcon() !!}
    </div>
    <h2 class="text-gray-800 dark:text-gray-200 font-bold first-letter:uppercase text-sm">{{ __($status->value) }}</h2>
  </div>
  <span class="text-gray-700 dark:text-gray-300 font-bold text-xs">{{ $counter }}</span>
</a>
