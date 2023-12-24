<x-app-layout>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Mise à Jour de l'Utilisateur</h2>
    
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="bg-white shadow-md p-4 rounded mb-4">
                <div class="mb-4">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" value="{{ $user->name }}">
                </div>
    
                <div class="mb-4">
                    <label for="prenom">Telephone:</label>
                    <input type="text" name="prenom" value="{{ $user->phone }}">
                </div>
    
                <div class="mb-4">
                    <label for="email">Adresse e-mail:</label>
                    <input type="email" name="email" value="{{ $user->email }}">
                </div>

                <div class="mb-4">
                    <label for="points">Points:</label>
                    <input type="points" name="points" value="{{ $user->points }}">
                </div>
                <!-- Ajoutez d'autres champs pour les détails de l'utilisateur au besoin -->
    
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à Jour</button>
            </div>
        </form>
    </div>
</x-app-layout>