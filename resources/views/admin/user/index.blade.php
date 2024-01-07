<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-6 text-xl font-medium font-display">Users Area</h1>
                    <div class="relative mb-4 overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        User ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Full Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Role
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email Address
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Phone Number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr class="border-b odd:bg-white even:bg-gray-50">
                                        <td class="px-6 py-4 uppercase">
                                            #{{ $user->id }}
                                        </td>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 capitalize whitespace-nowrap">
                                            {{ $user->name }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 capitalize whitespace-nowrap">
                                            {{ $user->role }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->phone_number ?? 'Not Set' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('admin.users.show', $user) }}"
                                                class="font-medium text-indigo-800 hover:underline">Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="border-b odd:bg-white even:bg-gray-50">
                                        <th colspan="5" scope="row"
                                            class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap">
                                            Users Data Not Found
                                        </th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="">
                        {{ $users->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
