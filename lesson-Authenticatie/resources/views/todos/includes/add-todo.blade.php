<div class="flex justify-center mb-8">
    <form action="{{ route('todos.store') }}" method="post" class="flex justify-between gap-2 w-96" novalidate>
        @csrf
        <div class="flex-1">
            <input class="block w-full rounded p-2 bg-gray-100" type="text" name="content" id="content" placeholder="What are you up to?">
            @error('content')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <input type="submit" value="Add" class="block w-full cursor-pointer rounded bg-green-200 text-green-700 p-2">
        </div>
    </form>
</div>
