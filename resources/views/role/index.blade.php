<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-8">Role</h1>
                    <a href="{{ route('admin.role.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Role</a>
                    <table class="table-auto w-full mt-8">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Name </th>
                                <th class="px-4 py-2">Diplay Name</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td class="border px-4 py-2">{{ $role->name }}</td>
                                    <td class="border px-4 py-2">{{ $role->display_name }}</td>
                                    <td class="border px-4 py-2 text-center">

                                        <a href="{{ route('admin.role.edit', $role->id) }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-5 rounded">Edit</a>
                                        <form action="{{ route('admin.role.destroy', $role->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
