<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-8">Edit Permission</h1>
                    <form action="{{ route('admin.role.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Name Field -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <!-- Display Name Field -->
                        <div class="mb-4">
                            <label for="display_name" class="block text-gray-700 text-sm font-bold mb-2">Display
                                Name</label>
                            <input type="text" name="display_name" id="display_name"
                                value="{{ old('display_name', $role->display_name) }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <!-- Description Field -->
                        <div class="mb-4">
                            <label for="description"
                                class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                            <textarea name="description" id="description"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description', $role->description) }}</textarea>
                        </div>

                        <!-- Permissions Checkboxes -->
                        <div class="mb-4">
                            <label for="permissions"
                                class="block text-gray-700 text-sm font-bold mb-2">Permissions</label>
                            <div class="grid grid-cols-3 gap-4">
                                @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox" id="permission-{{ $permission->id }}"
                                            name="permissions_id[]" value="{{ $permission->id }}"
                                            class="form-check-input"
                                            {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                        <label for="permission-{{ $permission->id }}"
                                            class="text-gray-600">{{ $permission->display_name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>