<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Invitation
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.invitations.store') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium">Title</label>
                        <input name="title" class="w-full border rounded p-2" value="{{ old('title') }}" required>
                        @error('title') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium">Groom Name</label>
                            <input name="groom_name" class="w-full border rounded p-2" value="{{ old('groom_name') }}" required>
                            @error('groom_name') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Bride Name</label>
                            <input name="bride_name" class="w-full border rounded p-2" value="{{ old('bride_name') }}" required>
                            @error('bride_name') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium">Event Date</label>
                            <input type="date" name="event_date" class="w-full border rounded p-2" value="{{ old('event_date') }}" required>
                            @error('event_date') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Event Time</label>
                            <input name="event_time" class="w-full border rounded p-2" value="{{ old('event_time') }}" placeholder="19:00" required>
                            @error('event_time') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Location</label>
                        <input name="location" class="w-full border rounded p-2" value="{{ old('location') }}" required>
                        @error('location') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Expired At (optional)</label>
                        <input type="datetime-local" name="expired_at" class="w-full border rounded p-2" value="{{ old('expired_at') }}">
                        @error('expired_at') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="flex gap-3">
                        <button class="px-4 py-2 rounded bg-black text-white">Save Draft</button>
                        <a href="{{ route('admin.invitations.index') }}" class="px-4 py-2 rounded border">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
