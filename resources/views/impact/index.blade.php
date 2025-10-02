<x-layouts.app :title="__('All Impact Stories')">

    <div class="mb-6">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>All Impact Stories</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3  gap-6">
        @forelse($impacts as $impact)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img
                    src="{{$impact->image}}"
                    alt="{{ $impact->name }}"
                    class="w-full h-48 object-cover rounded-t-lg mb-4"
                />

                <div class="p-5">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $impact->name }}</h3>
                        <div class="flex flex-row items-center gap-2">
                            <a href="{{ route('impact.edit', $impact) }}"><flux:icon.pencil-square class="text-green-600"/></a>
                            <form method="POST" action="{{ route('impact.destroy', $impact) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <flux:icon.trash class="text-red-600"/>
                                </button>
                            </form>
                        </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-10">
                <p class="text-gray-500">No nothing at the moment.</p>
            </div>
        @endforelse
    </div>


</x-layouts.app>

