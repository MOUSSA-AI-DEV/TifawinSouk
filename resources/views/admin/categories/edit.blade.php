<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une catégorie - Admin</title>
</head>
<body>
    <h1>Modifier la catégorie</h1>
    
    <form action="/categories/{{ $category->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <p>
            <label for="name">Nom *</label><br>
            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required>
            @if($errors->has('name'))
                <br><span style="color: red;">{{ $errors->first('name') }}</span>
            @endif
        </p>

        <p>
            <label for="description">Description</label><br>
            <textarea id="description" name="description">{{ old('description', $category->description) }}</textarea>
            @if($errors->has('description'))
                <br><span style="color: red;">{{ $errors->first('description') }}</span>
            @endif
        </p>

        <p>
            <button type="submit">Mettre à jour</button>
            <a href="/categories">Annuler</a>
        </p>
    </form>
</body>
</html>
