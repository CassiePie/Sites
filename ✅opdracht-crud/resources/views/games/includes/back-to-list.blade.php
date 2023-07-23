<div class="py-4 flex items-center gap-2">
    <a class="bg-blue-200 hover:bg-blue-300 text-blue-600 px-4 py-2 inline-block" href="{{ route('games.index') }}">&larr; Back to list</a>

    @if($showLink ?? false)
        <a class="bg-blue-200 hover:bg-blue-300 text-blue-600 px-4 py-2 inline-block" href="{{ route('games.show', $game->id) }}">&larr; Back to game</a>
    @endif
</div>
