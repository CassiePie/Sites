<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Schrijf een review</h1>
    
    <form method="post" action="/review">
        @csrf
        <div>
            <label for="name">Naam:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="review">Review:</label>
            <textarea id="review" name="review" required>{{ old('review') }}</textarea>
            @error('review')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="score">Score:</label>
            <input type="number" id="score" name="score" value="{{ old('score') }}" min="0" max="10" required>
            @error('score')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <input type="checkbox" id="privacy" name="privacy" required>
            <label for="privacy">I accept the privacy conditions</label>
            @error('privacy')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>