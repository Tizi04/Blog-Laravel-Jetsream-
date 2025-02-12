<x-app-layout>
    <div class="max-w-3xl mx-auto py-12">
        <div class="bg-white border border-gray-300 rounded-lg shadow-md p-6">
            <!-- Título del post -->
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
                {{ $post->title }}
            </h1>

            <!-- Categoría -->
            <div class="text-center text-gray-700 mb-4">
                <div class="bg-blue-100 text-blue-600 px-4 py-2 rounded-lg shadow-sm">
                    <strong>Usuario:</strong> {{ $post->user->name ?? 'Desconocido' }}
                </div>
                <div class="mt-2 bg-green-100 text-green-600 px-4 py-2 rounded-lg shadow-sm">
                    📌 <strong>Categoría:</strong> {{ $post->category }}
                </div>
            </div>

            <!-- Contenido -->
            <div class="bg-gray-50 border border-gray-200 rounded-lg shadow-inner p-6">
                <p class="text-gray-700 text-center">
                    {{ $post->content }}
                </p>
            </div>

            <!-- Botones de acción -->
            @if (Auth::id() === $post->user_id)
                <!-- Solo mostrar el botón si el usuario es el creador -->
                <div class="flex justify-center space-x-4 mt-6">
                    <a href="{{ route('posts.edit', $post->id) }}"
                        class="bg-blue-600 text-black px-5 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
                        Editar
                    </a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-600 text-white px-5 py-2 rounded-lg shadow-md hover:bg-red-700 transition">
                            Eliminar
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
