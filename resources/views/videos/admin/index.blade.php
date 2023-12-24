@if (Auth::user()->is_admin == 1)<x-app-layout>

    <!-- resources/views/videos/index.blade.php -->

    <div class="container mx-auto p-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-xl font-semibold">Liste des video</h1>

                <a href="{{ route('annoces.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                    Voir les Annoces
                </a>
                <a href="{{ route('videos.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                    Ajouter une Video
                </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($videos as $video)
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <a href="{{ route('videos.show', $video->id) }}">
                        <video src="{{ asset('storage/videos/' . $video->chemin_vers_video) }}" alt="Video Thumbnail"
                            class="w-full h-32 object-cover"></video>
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mb-2">{{ $video->titre }}</h3>
                            <p class="text-gray-600">{{ $video->description }}</p>
                            <div class="mt-4 flex items-center">
                                <span class="text-sm text-gray-500">Publié le
                                    {{ $video->created_at->format('d/m/Y') }}</span>
                            </div>
                            <a href="{{ route('videos.show', $video) }}" class="text-indigo-600 hover:text-indigo-900">
                                <i class="fas fa-eye"></i> Voir
                            </a>
                            <div class="mt-4">
                                <a href="{{ route('videos.edit', $video->id) }}"
                                    class="text-blue-500 hover:underline mr-4">Éditer</a>
                                <form action="{{ route('videos.destroy', $video->id) }}" method="post"
                                    style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette vidéo?')">Supprimer</button>
                                </form>

                                <div class="left-56  relative  ">
                                    @if ($video->is_active)
                                        <form action="{{ route('videos.deactivate', $video->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
    
    
    
                                            <button type="submit"><label
                                                    class="relative inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" checked value="" class="sr-only peer">
                                                    <div class="  left-0  "></div>
                                                    <div
                                                        class="w-11 h-6 text-white bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                   <div class="-px-2 mr-4    left-0 start-1">1</div></div>
                                                </label></button>
                                        </form>
                                    @else
                                        <form action="{{ route('videos.activate', $video->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
    
    
                                            <button type="submit"><label
                                                    class="relative inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" value="" class="sr-only peer">
    
                                                    <div
                                                        class="w-11 h-6 text-red-500 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                        <div class="-px-2 bold ml-4  z-40  left-0 start-1">0</div></div>
                                                    </label></button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>


</x-app-layout>
@endif