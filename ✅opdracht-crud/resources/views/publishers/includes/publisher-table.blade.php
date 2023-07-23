<table class="w-full text-left shadow-2xl">
    <tr class="bg-gray-300">
        <th class="p-2">Publisher</th>
        <th class="p-2">Actions</th>
    </tr>
    @foreach ($publishers as $publisher)
        @include('publishers.includes.publisher-row', ['publisher' => $publisher])
    {{-- @include('publishers.includes.publisher-row')
    @include('publishers.includes.publisher-row')
    @include('publishers.includes.publisher-row')
    @include('publishers.includes.publisher-row') --}}
    @endforeach
</table>
