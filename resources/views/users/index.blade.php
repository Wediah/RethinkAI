<x-layouts.app :title="__('All Event')">

    <div class="mb-6">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>All Event</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    @php
        $users = App\Models\User::all();
    @endphp

    <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-700 overflow-hidden">
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-neutral-200 dark:border-neutral-700">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">User Management</h3>
                    <p class="text-sm text-gray-500 dark:text-neutral-400 mt-1">Manage user roles and permissions</p>
                </div>
                <div class="text-sm text-gray-500 dark:text-neutral-400">
                    Total Users: {{ $users->count() }}
                </div>
            </div>
        </div>

        <!-- Table Container -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-neutral-50 dark:bg-neutral-800">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-neutral-400 uppercase tracking-wider">
                        User
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-neutral-400 uppercase tracking-wider">
                        Contact
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-neutral-400 uppercase tracking-wider">
                        Role
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-neutral-400 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                @forelse($users as $user)
                    <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-800 transition-colors duration-150">
                        <!-- User Info -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                    <span class="text-sm font-medium text-white">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </span>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $user->name }}
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-neutral-400">
                                        Joined {{ $user->created_at->format('M j, Y') }}
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Contact Info -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">{{ $user->email }}</div>
                            @if($user->phone)
                                <div class="text-sm text-gray-500 dark:text-neutral-400 mt-1">{{ $user->phone }}</div>
                            @else
                                <div class="text-xs text-gray-400 dark:text-neutral-500 italic">No phone</div>
                            @endif
                        </td>

                        <!-- Role Status -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($user->is_admin)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Admin
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    User
                                </span>
                            @endif
                        </td>

                        <!-- Actions -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            @if(!$user->is_admin)
                                <form action="{{ route('users.make-admin', $user) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                            onclick="return confirm('Are you sure you want to make {{ $user->name }} an admin?')"
                                            class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Make Admin
                                    </button>
                                </form>
                            @else
                                @if($user->id !== auth()->id())
                                    <form action="{{ route('users.remove-admin', $user) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                                onclick="return confirm('Are you sure you want to remove admin privileges from {{ $user->name }}?')"
                                                class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            Remove Admin
                                        </button>
                                    </form>
                                @else
                                    <span class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full text-gray-400 bg-gray-100 dark:bg-gray-800 cursor-not-allowed">
                                        Current User
                                    </span>
                                @endif
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-400 dark:text-neutral-500">
                                <svg class="w-12 h-12 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                                <p class="text-lg font-medium">No users found</p>
                                <p class="text-sm mt-1">User accounts will appear here</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <!-- Summary Stats -->
        <div class="px-6 py-4 border-t border-neutral-200 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800">
            <div class="flex items-center justify-between text-sm text-gray-600 dark:text-neutral-400">
                <div class="flex space-x-4">
                <span class="flex items-center">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                    {{ $users->where('is_admin', true)->count() }} Admins
                </span>
                    <span class="flex items-center">
                    <span class="w-2 h-2 bg-gray-400 rounded-full mr-2"></span>
                    {{ $users->where('is_admin', false)->count() }} Users
                </span>
                </div>
                <div>
                    Last updated: {{ now()->format('M j, Y g:i A') }}
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

</x-layouts.app>
