<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-8">Menu</h1>
                    <a href="{{ route('menus.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add
                        Menu</a>
                    <table class="table-auto w-full mt-8">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Name </th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Series</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                                <tr>
                                    <td class="border px-4 py-2">{{ $menu->name }}</td>
                                    <td class="border px-4 py-2">{{ $menu->price }}</td>
                                    <td class="border px-4 py-2">{{ $menu->series->name }}</td>
                                    <td class="border px-4 py-2 text-center">
                                        <a href="{{ route('menus.show', $menu->id) }}"
                                            class="bg-yellow-300 hover:bg-yellow-700 text-white font-bold py-3 px-5 rounded">Details</a>
                                        <a href="{{ route('menus.edit', $menu->id) }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-5 rounded">Edit</a>
                                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
