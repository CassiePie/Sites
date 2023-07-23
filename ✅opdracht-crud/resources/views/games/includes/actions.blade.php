<a class="px-4 py-1 bg-green-200 hover:bg-green-300 text-green-500 hover:text-green-600" href="{{ route('games.update', $game->id) }}">Mark as complete</a>
<a class="px-4 py-1 bg-orange-200 hover:bg-orange-300 text-orange-500 hover:text-orange-600" href="{{ route('games.edit', $game->id) }}">Edit</a>
<a class="px-4 py-1 bg-red-200 hover:bg-red-300 text-red-500 hover:text-red-600" href="{{ route('games.delete', $game->id) }}">Delete</a>
