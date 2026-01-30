<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un produit - Admin</title>
</head>
<body>
    <h1>Ajouter un produit</h1>
    
    <form action="/produits" method="POST" enctype="multipart/form-data">
        @csrf
        
        <p>
            <label for="name">Nom *</label><br>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @if($errors->has('name'))
                <br><span style="color: red;">{{ $errors->first('name') }}</span>
            @endif
        </p>

        <p>
            <label for="description">Description</label><br>
            <textarea id="description" name="description">{{ old('description') }}"></textarea>
            @if($errors->has('description'))
                <br><span style="color: red;">{{ $errors->first('description') }}</span>
            @endif
        </p>

        <p>
            <label for="price">Prix *</label><br>
            <input type="number" id="price" name="price" step="0.01" min="0" value="{{ old('price') }}" required>
            @if($errors->has('price'))
                <br><span style="color: red;">{{ $errors->first('price') }}</span>
            @endif
        </p>

        <p>
            <label for="stock">Stock *</label><br>
            <input type="number" id="stock" name="stock" min="0" value="{{ old('stock') }}" required>
            @if($errors->has('stock'))
                <br><span style="color: red;">{{ $errors->first('stock') }}</span>
            @endif
        </p>

        <p>
            <label for="categorie_id">Catégorie *</label><br>
           <select id="categorie_id" name="categorie_id" required>
    <option value="">Sélectionner une catégorie</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}">
            {{ $category->name }}
        </option>
    @endforeach
</select>

            @if($errors->has('categorie_id'))
                <br><span style="color: red;">{{ $errors->first('categorie_id') }}</span>
            @endif
        </p>

        <p>
            <label for="image">Image</label><br>
            <input type="file" id="image" name="image" accept="image/*">
            @if($errors->has('image'))
                <br><span style="color: red;">{{ $errors->first('image') }}</span>
            @endif
        </p>

        <p>
            <button type="submit">Enregistrer</button>
            <a href="/produits">Annuler</a>
        </p>
    </form>
</body>
</html>
