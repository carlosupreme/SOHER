<x-app-layout>
  <div class="mx-auto flex max-w-7xl flex-col items-center gap-y-4 sm:mt-4 sm:px-6 lg:px-8">
    @can('user.index')
      {{ Breadcrumbs::render('user', $user) }}
    @else
      {{ Breadcrumbs::render('view-user', $user) }}
    @endcan()

    <div class="flex w-full flex-col overflow-hidden px-2 sm:px-0">
      <div class="flex w-full flex-col rounded-b-lg rounded-t-lg bg-white dark:bg-gray-800">
        <div id="background" class="relative h-36 w-full rounded-t-lg">
          <img id="user-photo"
               class="absolute -bottom-16 left-6 aspect-square h-32 w-32 rounded-full border-4 border-solid border-white object-cover dark:border-gray-800"
               src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
        </div>
        <div class="flex flex-col gap-y-2 px-6 pb-4 pt-16">
          <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">{{ $user->name }}</h1>
          <h2 class="text-md break-all font-bold text-gray-700 dark:text-gray-400">
            <i class="fa-solid fa-envelope"></i>&nbsp;
            {{ $user->email }}
          </h2>
          <h3 class="text-gray-700 dark:text-gray-400"><i class="fa-solid fa-phone text-indigo-500"></i>
            &nbsp;
            {{ $user->phone }}
          </h3>
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
        </div>
      </div>
      @livewire('reviews', ['userId' => $user->id])
    </div>
  </div>

  <script>
    function getAvgRGB(imgEl) {
      const blockSize = 5;
      const defaultRGB = {
        r: 127,
        g: 156,
        b: 245
      };
      const rgb = {
        r: 0,
        g: 0,
        b: 0
      };
      const canvas = document.createElement('canvas');
      const context = canvas.getContext && canvas.getContext('2d');
      let data, width, height;
      let i = -4;
      let length;
      let count = 0;

      if (!context) {
        return defaultRGB;
      }

      height = canvas.height = imgEl.naturalHeight || imgEl.offsetHeight || imgEl.height;
      width = canvas.width = imgEl.naturalWidth || imgEl.offsetWidth || imgEl.width;

      context.imageSmoothingEnabled = true;
      context.drawImage(imgEl, 0, 0);

      try {
        data = context.getImageData(0, 0, width, height);
      } catch (e) {
        return defaultRGB;
      }

      length = data.data.length;

      while ((i += blockSize * 4) < length) {
        ++count;
        rgb.r += data.data[i];
        rgb.g += data.data[i + 1];
        rgb.b += data.data[i + 2];
      }

      // ~~ used to floor values
      rgb.r = ~~(rgb.r / count);
      rgb.g = ~~(rgb.g / count);
      rgb.b = ~~(rgb.b / count);

      return rgb;
    }

    function getLighterColor({
                               r,
                               g,
                               b
                             }, howMuch) {
      r = (r + howMuch > 255) ? 255 : r + howMuch;
      g = (g + howMuch > 255) ? 255 : g + howMuch;
      b = (b + howMuch > 255) ? 255 : b + howMuch;

      return {
        rl: r,
        gl: g,
        bl: b
      };
    }

    document.addEventListener('DOMContentLoaded', e => {
      const imgEl = document.getElementById('user-photo');
      const {
        r,
        g,
        b
      } = getAvgRGB(imgEl);
      const {
        rl,
        gl,
        bl
      } = getLighterColor({
        r,
        g,
        b
      }, 20);
      const bgEl = document.getElementById('background');
      bgEl.style.background = `linear-gradient(to bottom, rgb(${rl},${gl},${bl}), rgb(${r},${g},${b}))`;
    })
  </script>


</x-app-layout>
