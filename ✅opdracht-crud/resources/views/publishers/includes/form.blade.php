<div class="grid gap-4">
    <div>
        <label class="block text-lg text-gray-500 mb-2" for="name">Name</label>
        @error('name')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
        <input class="px-4 py-2 rounded w-full bg-gray-200 shadow-inner" type="text" name="name" id="name" value="{{ old('name') ?? $publisher->name }}">
    </div>
    <div>
        <input class="cursor-pointer inline-block px-4 py-2 bg-green-200 text-green-600 hover:bg-green-300 hover:text-green-700" type="submit" value="{{ $buttonText ?? 'Save' }}">
    </div>
</div>
