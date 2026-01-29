<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits - Admin</title>
</head>
<body>
    <h1>Gestion des Produits</h1>
    
    <p><a href="/produits/create">Ajouter un produit</a></p>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produits as $produit)
                <tr>
                    <td>{{ $produit->id }}</td>
                    <td>
                        @if($produit->image)
                            <img src="/images/produits/{{ $produit->image }}" alt="{{ $produit->name }}" width="50" height="50">
                        @else
                            <div style="width: 50px; height: 50px; background: #f0f0f0;">No img</div>
                        @endif
                    </td>
                    <td>{{ $produit->name }}</td>
                    <td>{{ number_format($produit->price, 2) }} €</td>
                    <td @if($produit->stock < 5) style="color: red; font-weight: bold;" @endif>{{ $produit->stock }}</td>
                    <td>{{ $produit->categorie->name ?? 'Non défini' }}</td>
                    <td>
                        <a href="/produits/{{ $produit->id }}/edit">Modifier</a> |
                        <form action="/produits/{{ $produit->id }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Etes-vous sur?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Aucun produit trouve</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
