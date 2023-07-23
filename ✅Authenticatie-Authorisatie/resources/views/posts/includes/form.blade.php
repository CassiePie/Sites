@csrf
<div class="form-content">

    <div class="form-element">
        <div>
            <label for="title">Title</label>
            @error('title')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>
        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
    </div>

    <div class="form-element">
        <div>
            <label for="subtitle">Subtitle</label>
            @error('subtitle')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>
        <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $post->subtitle) }}">
    </div>

    @if($post->id)
    <div class="form-element">
        <div>
            <label for="url">Url</label>
            @error('url')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>
        <input type="text" name="url" id="url" value="{{ old('url', $post->url) }}">
    </div>
    @endif

    <div>
        <label>
            <input type="checkbox" value="1" name="published" id="published" {{ old('published', $post->published) ? 'checked' : '' }}>
            Published
        </label>
        @error('published')
            <div class="form-error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-element">
        <div>
            <label for="status">Status</label>
            @error('status')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>
        <select name="status" id="status">
            @foreach (['draft', 'final'] as $option)
                <option value="{{ $option }}" {{ old('status', $post->status) == $option ? 'selected' : '' }}>
                    {{ ucfirst($option) }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-element">
        <div>
            <label for="content">Content</label>
            @error('content')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>
        <textarea name="content" id="content">{{ old('content', $post->content) }}</textarea>
    </div>

    <div>
        <input type="submit" value="{{ $buttonText ?? 'Save' }}">
    </div>

</div>
