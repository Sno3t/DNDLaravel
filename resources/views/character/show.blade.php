<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Posts</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
        <a class="navbar-brand h1" href={{ route('character.index') }}>D&D thingy</a>
        <div class="justify-end ">
            <div class="col ">
                <a class="btn btn-sm btn-success" href={{ route('character.create') }}>Add character</a>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <h1>{{ $character->name }}</h1>
    <p><strong>Race:</strong> {{ $character->race }}</p>
    <p><strong>Age:</strong> {{ $character->age }}</p>
    <p><strong>Backstory:</strong></p>
    <p>{{ $character->backstory }}</p>

    {{-- Add more character details here if needed --}}

    <a href="{{ route('character.edit', $character->id) }}" class="btn btn-primary">Edit Character</a>
    <form method="POST" action="{{ route('character.destroy', $character->id) }}" style="display:inline;">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this character?')">Delete Character
        </button>
    </form>
    <a href="{{ route('character.index') }}" class="btn btn-secondary">Back to Characters</a>
</div>
</body>
</html>
