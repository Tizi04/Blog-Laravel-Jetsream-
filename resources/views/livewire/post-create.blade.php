<div class="p-6">
    <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Crear Nuevo Post</h1>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 p-4 rounded-lg mb-6">
            {{ session('message') }}
        </div>
    @endif

    <!-- Errores -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded-lg mb-6">
            <h2 class="font-semibold mb-2">Errores:</h2>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario -->
    <form wire:submit.prevent="store" class="space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700">Título:</label>
            <input type="text" wire:model="title"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 shadow-sm focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Slug:</label>
            <input type="text" wire:model="slug"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 shadow-sm focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Categoría:</label>
            <input type="text" wire:model="category"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 shadow-sm focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Contenido:</label>
            <textarea wire:model="content"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 shadow-sm focus:ring focus:ring-blue-300"></textarea>
        </div>

        <div class="text-center">
            <button type="submit"
                class="bg-blue-600 text-black px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                Crear Post
            </button>
        </div>
    </form>
</div>
