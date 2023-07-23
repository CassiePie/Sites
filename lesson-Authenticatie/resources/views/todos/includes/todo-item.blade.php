<div class="flex gap-2 items-center justify-between">
    <p class="whitespace-nowrap opacity-50 {{ $todo->completed ? 'line-through' : '' }}">
        {{ $todo->content }}
    </p>
    <div class="flex gap-2">
        <form action="{{ route('todos.toggle', $todo) }}" method="post">
            @csrf
            @method('put')

            @if ($todo->completed)
                <button type="submit" class="w-8 h-8 bg-orange-100 text-orange-500 rounded-full">&CircleMinus;</button>
            @else
                <button type="submit" class="w-8 h-8 bg-green-100 text-green-500 rounded-full">&checkmark;</button>
            @endif
        </form>
        <form action="{{ route('todos.delete', $todo) }}" method="post">
            @csrf
            @method('delete')

            <button type="submit" class="w-8 h-8 bg-red-100 text-red-500 rounded-full">&times;</button>
        </form>
    </div>
</div>
