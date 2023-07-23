<a class="px-4 py-1 bg-orange-200 hover:bg-orange-300 text-orange-500 hover:text-orange-600" href="{{ route('publishers.edit', ['publisher' => $publisher->id]) }}">Edit</a>
<a class="px-4 py-1 bg-red-200 hover:bg-red-300 text-red-500 hover:text-red-600" href="{{ route('publishers.delete', ['publisher' => $publisher->id]) }}">Delete</a>
