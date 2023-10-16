<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Update Character</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
        <a class="navbar-brand h1" href="{{ route('character.index') }}">D&D thingy</a>
    </div>
</nav>
<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h3>Update Character</h3>
            <form action="{{ route('character.update', $character->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="{{ $character->name }}" required>
                </div>
                <div class="form-group">
                    <label for="race">Race</label>
                    <input type="text" class="form-control" id="race" name="race"
                           value="{{ $character->race }}" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age"
                           value="{{ $character->age }}" required>
                </div>
                <div class="form-group">
                    <label for="backstory">Backstory</label>
                    <textarea class="form-control" id="backstory" name="backstory" rows="3" required>{{ $character->backstory }}</textarea>
                </div>
                <button type="submit" class="btn mt-3 btn-primary">Update Character</button>
                <a href="{{ route('character.index') }}" class="btn mt-3 btn-secondary">Back to Characters</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
