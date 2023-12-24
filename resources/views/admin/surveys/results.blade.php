<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Résultats du Sondage</h1>

        <div class="border border-gray-300 rounded-lg p-4">
            <h2 class="text-lg font-semibold">{{ $survey->titre }}</h2>
            <p class="text-gray-600 mb-4">{{ $survey->description }}</p>

            <h3 class="text-lg font-semibold mb-2">Résultats :</h3>
            <ul>
                @foreach ($questions as $question)
                    <li class="mb-4">
                        <p class="font-semibold">{{ $question->texte }}</p>
                        <ul>
                            @foreach ($question->answers as $answer)
                                <li>
                                    @if ($answer->is_correct)
                                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                    @else
                                        <i class="fas fa-times-circle text-red-500 mr-2"></i>
                                    @endif
                                    {{ $answer->response }}
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>