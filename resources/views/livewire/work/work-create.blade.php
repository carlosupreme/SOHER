<div class="py-6 bg-white dark:bg-gray-900">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
        <div class="md:basis-1/3 md:gap-y-10 md:flex md:flex-col hidden md:mt-20">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200 tracking-wide">Empecemos a definir el
                problema ...</h1>
            <p class="text-lg text-gray-700 dark:text-gray-400">Deberás proporcionar información relevante para que
                encontremos al
                profesional más adecuado</p>
            <img src="{{ asset('assets/img/work-create.svg') }}" alt="Crear trabajo">
        </div>
        <div class="md:basis-1/2 md:ml-32 flex flex-col gap-y-5 px-10 md:px-0">
            <div class="flex flex-col">
                <div class="mb-4">
                    <h3 class="text-gray-800 dark:text-gray-200 font-bold text-xl mb-2">Escribe el título de tu
                        solicitud de trabajo</h3>
                    <p class="text-gray-600 dark:text-gray-400">Sé breve y simple, deja los detalles para el siguiente
                        apartado</p>
                </div>
                <div x-data="{content: '', limit:$refs.title.maxLength}"
                     class="flex items-center gap-x-1 bg-white border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-lg px-2 mb-1">
                    <x-input name="title" id="title" wire:model="title"
                             class="flex-grow w-full border-none focus:ring-0 text-gray-700" type="text"
                             placeholder="Ejemplo: Necesito un plomero para reparar fuga de agua en baño"
                             maxlength="70"
                             x-ref="title"
                             x-model="content"
                    />
                    <p class="text-gray-500 text-sm" x-text="content.length + '/' +  limit"></p>
                </div>
                <x-input-error for="title" class="ml-1"/>
            </div>

            <div class="flex flex-col">
                <div class="mb-4">
                    <h3 class="text-gray-800 dark:text-gray-200 font-bold text-xl mb-2">Explica detalladamente qué
                        problema tienes</h3>
                    <p class="text-gray-600 dark:text-gray-400">Especifíca todo lo que puedas, esto para agilizar el
                        proceso de selección
                        del profesional</p>
                </div>
                <div x-data="{content: '', limit:$refs.description.maxLength}"
                     class="flex flex-col gap-x-1 bg-white border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-lg p-2 mb-1">
                    <textarea name="description" id="description" wire:model="description"
                              class="dark:bg-gray-900 dark:text-gray-300 flex-grow w-full border-none focus:ring-0 text-gray-700 resize-none"
                              placeholder="Necesito..."
                              maxlength="2000"
                              rows="8"
                              x-ref="description"
                              x-model="content"
                    ></textarea>

                    <p class="text-gray-500 text-sm ml-auto" x-text="content.length + '/' +  limit"></p>
                </div>
                <x-input-error for="description" class="ml-1"/>
            </div>

            <div x-data="{ preview: '', alt: 'alt de prueba' }"
                class="flex flex-col">
                <h3 class="text-gray-800 dark:text-gray-200 font-bold text-xl mb-2">Agrega una foto o video si
                    deseas</h3>
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                           class="flex items-center justify-center w-full h-10 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <p class="text-sm text-gray-500 dark:text-gray-400"><span
                                class="font-semibold">Click para subir</span>
                            o arrastra aquí</p>
                        <input id="dropzone-file" type="file" accept="image/*" class="hidden" @change=""/>
                    </label>
                </div>
                <img class="my-2 rounded-lg" :src="preview" :alt="alt" id="photoPreview">
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const inputFile = document.getElementById("dropzone-file");
            const photoPreview = document.getElementById("photoPreview");
            document.addEventListener("change", (e) => {
                if (e.target === inputFile) {
                    let data = inputFile.files[0];
                    photoPreview.alt = data.name;
                    if (data) {
                        const reader = new FileReader();
                        reader.readAsDataURL(data);
                        reader.addEventListener("load", () => photoPreview.src = reader.result);
                    }
                }
            });
        </script>
    @endpush


</div>
