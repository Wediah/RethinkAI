<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        @php
            $allUpcomingEventsCount = \App\Models\Events::where('date', '>=', now())->count();
            $allEventsCount = \App\Models\Events::count();
            $allImpactsCount = \App\Models\Impact::count();
            $allContactUsCount = \App\Models\ContactUs::count();
            $allAttendeesCount = \App\Models\EventAttendees::count();

            $allContactUs = \App\Models\ContactUs::paginate(20);
        @endphp

        <div class="grid auto-rows-min gap-4 md:grid-cols-5">
            <!-- Upcoming Events -->
            <div class="relative bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-xl border border-blue-200 dark:border-blue-700 p-6 group hover:shadow-lg transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-blue-100 dark:bg-blue-800 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <flux:text class="text-blue-700 dark:text-blue-300 font-medium">Upcoming Events</flux:text>
                <flux:heading size="xl" class="mt-2 tabular-nums text-blue-900 dark:text-blue-100">{{ $allUpcomingEventsCount }}</flux:heading>
                <div class="absolute bottom-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>

            <!-- Total Events -->
            <div class="relative bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-xl border border-green-200 dark:border-green-700 p-6 group hover:shadow-lg transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-green-100 dark:bg-green-800 rounded-lg">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                </div>
                <flux:text class="text-green-700 dark:text-green-300 font-medium">Total Events</flux:text>
                <flux:heading size="xl" class="mt-2 tabular-nums text-green-900 dark:text-green-100">{{ $allEventsCount }}</flux:heading>
                <div class="absolute bottom-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
            </div>

            <!-- Impacts Stories -->
            <div class="relative bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-xl border border-purple-200 dark:border-purple-700 p-6 group hover:shadow-lg transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-purple-100 dark:bg-purple-800 rounded-lg">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                </div>
                <flux:text class="text-purple-700 dark:text-purple-300 font-medium">Impacts Stories</flux:text>
                <flux:heading size="xl" class="mt-2 tabular-nums text-purple-900 dark:text-purple-100">{{ $allImpactsCount }}</flux:heading>
                <div class="absolute bottom-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-12 h-12 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
            </div>

            <!-- Event Attendees -->
            <div class="relative bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 rounded-xl border border-orange-200 dark:border-orange-700 p-6 group hover:shadow-lg transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-orange-100 dark:bg-orange-800 rounded-lg">
                        <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>
                <flux:text class="text-orange-700 dark:text-orange-300 font-medium">Event Attendees</flux:text>
                <flux:heading size="xl" class="mt-2 tabular-nums text-orange-900 dark:text-orange-100">{{ $allAttendeesCount }}</flux:heading>
                <div class="absolute bottom-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-12 h-12 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Reach Outs -->
            <div class="relative bg-gradient-to-br from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20 rounded-xl border border-red-200 dark:border-red-700 p-6 group hover:shadow-lg transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-red-100 dark:bg-red-800 rounded-lg">
                        <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <flux:text class="text-red-700 dark:text-red-300 font-medium">Reach Outs</flux:text>
                <flux:heading size="xl" class="mt-2 tabular-nums text-red-900 dark:text-red-100">{{ $allContactUsCount }}</flux:heading>
                <div class="absolute bottom-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-12 h-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Contact Messages Table -->
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900">
            <!-- Table Header -->
            <div class="px-6 py-4 border-b border-neutral-200 dark:border-neutral-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Contact Messages</h3>
                <p class="text-sm text-gray-500 dark:text-neutral-400 mt-1">Recent inquiries and messages from visitors</p>
            </div>

            <!-- Table Container -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-neutral-50 dark:bg-neutral-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-neutral-400 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Name</span>
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                </svg>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-neutral-400 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Email Address</span>
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                </svg>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-neutral-400 uppercase tracking-wider">Message</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-neutral-400 uppercase tracking-wider">Date</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                    @forelse ($allContactUs as $contact)
                        <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-800 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center">
                                        <span class="text-sm font-medium text-blue-600 dark:text-blue-400">{{ strtoupper(substr($contact->name, 0, 1)) }}</span>
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $contact->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 dark:text-white">{{ $contact->email }}</div>
                                <div class="text-xs text-gray-500 dark:text-neutral-400 mt-1">
                                    <a href="mailto:{{ $contact->email }}" class="hover:text-blue-600 dark:hover:text-blue-400 flex items-center space-x-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>Reply</span>
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900 dark:text-white max-w-xs">
                                    <div class="line-clamp-2">{{ Str::limit($contact->message, 120) }}</div>
                                    @if (strlen($contact->message) > 120)
                                        <button onclick="toggleMessage({{ $contact->id }})" class="text-xs text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 mt-1">Read more</button>
                                        <div id="full-message-{{ $contact->id }}" class="hidden mt-2 text-sm text-gray-600 dark:text-neutral-300">
                                            {{ $contact->message }}
                                            <button onclick="toggleMessage({{ $contact->id }})" class="text-xs text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 mt-1 block">Show less</button>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-neutral-400">
                                {{ $contact->created_at->format('M j, Y') }}
                                <div class="text-xs text-gray-400 dark:text-neutral-500">{{ $contact->created_at->format('g:i A') }}</div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400 dark:text-neutral-500">
                                    <svg class="w-12 h-12 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                    </svg>
                                    <p class="text-lg font-medium">No messages yet</p>
                                    <p class="text-sm mt-1">Contact form messages will appear here</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($allContactUs->hasPages())
                <div class="px-6 py-4 border-t border-neutral-200 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-700 dark:text-neutral-300">
                            Showing <span class="font-medium">{{ $allContactUs->firstItem() }}</span> to <span class="font-medium">{{ $allContactUs->lastItem() }}</span> of <span class="font-medium">{{ $allContactUs->total() }}</span> results
                        </div>

                        <div class="flex space-x-1">
                            @if($allContactUs->onFirstPage())
                                <span class="px-3 py-1 text-sm text-gray-400 dark:text-neutral-600 bg-white dark:bg-neutral-700 border border-neutral-300 dark:border-neutral-600 rounded cursor-not-allowed">Previous</span>
                            @else
                                <a href="{{ $allContactUs->previousPageUrl() }}" class="px-3 py-1 text-sm text-gray-700 dark:text-neutral-300 bg-white dark:bg-neutral-700 border border-neutral-300 dark:border-neutral-600 rounded hover:bg-gray-50 dark:hover:bg-neutral-600 transition-colors">Previous</a>
                            @endif

                            @foreach($allContactUs->getUrlRange(1, $allContactUs->lastPage()) as $page => $url)
                                @if($page == $allContactUs->currentPage())
                                    <span class="px-3 py-1 text-sm text-white bg-blue-600 border border-blue-600 rounded">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="px-3 py-1 text-sm text-gray-700 dark:text-neutral-300 bg-white dark:bg-neutral-700 border border-neutral-300 dark:border-neutral-600 rounded hover:bg-gray-50 dark:hover:bg-neutral-600 transition-colors">{{ $page }}</a>
                                @endif
                            @endforeach

                            @if($allContactUs->hasMorePages())
                                <a href="{{ $allContactUs->nextPageUrl() }}" class="px-3 py-1 text-sm text-gray-700 dark:text-neutral-300 bg-white dark:bg-neutral-700 border border-neutral-300 dark:border-neutral-600 rounded hover:bg-gray-50 dark:hover:bg-neutral-600 transition-colors">Next</a>
                            @else
                                <span class="px-3 py-1 text-sm text-gray-400 dark:text-neutral-600 bg-white dark:bg-neutral-700 border border-neutral-300 dark:border-neutral-600 rounded cursor-not-allowed">Next</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        function toggleMessage(contactId) {
            const fullMessage = document.getElementById(`full-message-${contactId}`);
            const readMoreBtn = event.target;

            if (fullMessage.classList.contains('hidden')) {
                fullMessage.classList.remove('hidden');
                readMoreBtn.textContent = 'Show less';
            } else {
                fullMessage.classList.add('hidden');
                readMoreBtn.textContent = 'Read more';
            }
        }
    </script>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</x-layouts.app>
