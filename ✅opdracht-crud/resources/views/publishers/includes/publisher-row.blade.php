<tr class="even:bg-gray-100 odd:bg-gray-200">
    <td class="p-2 text-lg flex flex-col">
        <a href="{{ route('publishers.show', $publisher->id) }}" class="hover:underline">{{ $publisher->name }}</a>
        <span class="text-gray-500 text-sm">{{ $publisher->games_count }} games</span>
    </td>
    <td class="p-2">
        <a href="{{ route('publishers.show', $publisher->id) }}" class="px-4 py-1 bg-blue-200 hover:bg-blue-300 text-blue-500 hover:text-blue-600">View</a>
        @include('publishers.includes.actions', ['publisher' => $publisher])
    </td>
</tr>