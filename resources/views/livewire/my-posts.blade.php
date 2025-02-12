<div class="p-6">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">
        📌 Mis Posts
    </h2>

    <!-- Lista de Posts -->
    <div class="space-y-4">
        @foreach ($posts as $post)
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4 transition-all duration-300 
                        hover:shadow-xl hover:-translate-y-1 hover:bg-gray-100">
                <a href="{{ route('posts.show', $post) }}" class="block text-xl font-semibold text-gray-800 hover:text-blue-600 transition">
                    {{ $post->title }}
                </a>
                <p class="text-gray-500 text-sm mt-1">📅 {{ $post->created_at->format('d/m/Y') }}</p>
            </div>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="mt-8 flex justify-center">
        {{ $posts->links() }}
    </div>
</div>
