@csrf

<div class="form-content">

    <div class="form-element">
        <div>
            <label for="name">Name</label>
            @error('name')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>
        <input type="text" name="name" id="name" value="{{ old('name', $comment->name) }}">
    </div>

    <div class="form-element">
        <div>
            <label for="content">Content</label>
            @error('content')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>
        <textarea name="content" id="content">{{ old('content', $comment->content) }}</textarea>
    </div>

    <div>
        <input type="submit" value="{{ $buttonText ?? 'Save' }}">
    </div>

</div>
