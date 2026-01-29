<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une catégorie - Admin</title>
</head>
<body>
    <h1>Ajouter une catégorie</h1>
    
    <form action="/categories" method="POST">
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
            <button type="submit">Enregistrer</button>
            <a href="/categories">Annuler</a>
        </p>
    </form>
</body>
</html>
