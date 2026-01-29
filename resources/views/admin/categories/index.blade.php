<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Categories - Admin</title>
</head>
<body>
    <h1>Gestion des Categories</h1>
    
    <p><a href="/categories/create">Ajouter une catégorie</a></p>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->description ?? '-' }}</td>
                    <td>
                        <a href="/categories/{{ $category->id }}/edit">Modifier</a> |
                        <form action="/categories/{{ $category->id }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Etes-vous sur?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Aucune categorie trouvee</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
