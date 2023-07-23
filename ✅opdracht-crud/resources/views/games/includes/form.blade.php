<div class="grid gap-4">
    <div>
        <label class="block text-lg text-gray-500 mb-2" for="name">Name</label>
        @error('name')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
        <input class="px-4 py-2 rounded w-full bg-gray-200 shadow-inner" type="text" name="name" id="name" value="{{ old('name', $game->name) }}" required>


    </div>
    <div>
        <label class="block text-lg text-gray-500 mb-2" for="publisher_id">Publisher</label>
        @error('publisher_id')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
        <select class="px-4 py-2 rounded w-full bg-gray-200 shadow-inner" name="publisher_id" id="publisher_id">

            {{-- <option disabled>-- Select a publisher</option> --}}
            {{-- <option value="id" {{ old('publisher_id') }}>Publisher</option> --}}

            {{-- ------------------------------------------- --}}
            <option disabled selected>-- Select a publisher --</option>
            @foreach ($publishers as $publisher)
                <option value="{{ $publisher->id }}" {{ old('publisher_id') == $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}</option>
            @endforeach
            {{-- ------------------------------------------- --}}
            
        </select>
    </div>
    <div class="mt-4 py-4 border-t border-gray-300">
        <label class="block text-lg text-gray-500 flex items-center gap-2">
            <input type="checkbox" name="completed" id="completed" value="1" {{ old('completed', $game->completed) ? 'checked' : '' }}>   
            <span>Completed</span>
        </label>
    </div>
    <div>
        <input class="cursor-pointer inline-block px-4 py-2 bg-green-200 text-green-600 hover:bg-green-300 hover:text-green-700" type="submit" value="{{ $buttonText ?? 'Save' }}">
    </div>

</div>

{{-- @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
