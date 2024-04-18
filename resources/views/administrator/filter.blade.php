<div x-data="{ isActive: false }" class="relative">
    <div class="inline-flex items-center overflow-hidden rounded-md border bg-white">
        <a href="#" class="w-full border-e px-4 py-3 text-sm/none text-gray-600 hover:bg-gray-50 hover:text-gray-700">
            Filtrar
        </a>
        <button x-on:click="isActive = !isActive" class="h-full p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
            <span class="sr-only">Menu</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <div class="absolute end-0 z-10 mt-2 w-56 rounded-md border border-gray-100 bg-white shadow-lg" role="menu" x-cloak x-transition x-show="isActive" x-on:click.away="isActive = false" x-on:keydown.escape.window="isActive = false">
        <div class="p-2" id="">
            <label for="Option1" class="flex cursor-pointer items-start gap-4 mb-1">
                <div class="flex items-center">
                    &#8203;
                    <input type="checkbox" class="size-4 rounded border-gray-300" id="Option1" value="activo" />
                </div>
                <div>
                    <strong class="font-medium text-gray-900">Activos</strong>
                </div>
            </label>
            <label for="Option2" class="flex cursor-pointer items-start gap-4 mb-1">
                <div class="flex items-center">
                    &#8203;
                    <input type="checkbox" class="size-4 rounded border-gray-300" id="Option2" />
                </div>

                <div>
                    <strong class="font-medium text-gray-900">En proceso</strong>
                </div>
            </label>
            <label for="Option3" class="flex cursor-pointer items-start gap-4 mb-1">
                <div class="flex items-center">
                    &#8203;
                    <input type="checkbox" class="size-4 rounded border-gray-300" id="Option3" />
                </div>

                <div>
                    <strong class="font-medium text-gray-900">Rechazados</strong>
                </div>
            </label>
            <label for="Option4" class="flex cursor-pointer items-start gap-4 mb-1">
                <div class="flex items-center">
                    &#8203;
                    <input type="checkbox" class="size-4 rounded border-gray-300" id="Option4" />
                </div>

                <div>
                    <strong class="font-medium text-gray-900">Aceptados</strong>
                </div>
            </label>
        </div>
    </div>
</div>