<div class="flex items-center">
  @for ($i = 1; $i <= $stars; $i++)
    <svg class="mr-1 h-4 w-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
         fill="currentColor"
         viewBox="0 0 22 20">
      <path
              d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
    </svg>
  @endfor
  @for ($i = 1; $i <= 5 - $stars; $i++)
    <svg class="mr-1 h-4 w-4 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
         fill="currentColor" viewBox="0 0 22 20">
      <path
              d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
    </svg>
  @endfor
  <div class="ml-2 flex items-center gap-x-1.5">
    <p class="text-sm font-medium text-gray-500 dark:text-gray-400"> {{ $rate }} de 5</p>
    <span class="h-1 w-1 rounded-full bg-gray-500 dark:bg-gray-400"></span>
    <a href="#"
       class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white">{{ $reviews }}
      opiniones</a>
  </div>
</div>
