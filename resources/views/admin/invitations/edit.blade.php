<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Invitation
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-4">

            @if(session('success'))
                <div class="p-3 rounded bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.invitations.update', $invitation) }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium">Title</label>
                        <input name="title" class="w-full border rounded p-2"
                               value="{{ old('title', $invitation->title) }}" required>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium">Groom Name</label>
                            <input name="groom_name" class="w-full border rounded p-2"
                                   value="{{ old('groom_name', $invitation->data_json['groom_name'] ?? '') }}" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Bride Name</label>
                            <input name="bride_name" class="w-full border rounded p-2"
                                   value="{{ old('bride_name', $invitation->data_json['bride_name'] ?? '') }}" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium">Event Date</label>
                            <input type="date" name="event_date" class="w-full border rounded p-2"
                                   value="{{ old('event_date', $invitation->data_json['event_date'] ?? '') }}" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Event Time</label>
                            <input name="event_time" class="w-full border rounded p-2"
                                   value="{{ old('event_time', $invitation->data_json['event_time'] ?? '') }}" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Location</label>
                        <input name="location" class="w-full border rounded p-2"
                               value="{{ old('location', $invitation->data_json['location'] ?? '') }}" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Expired At</label>
                        <input type="datetime-local" name="expired_at" class="w-full border rounded p-2"
                               value="{{ old('expired_at', optional($invitation->expired_at)->format('Y-m-d\TH:i')) }}">
                    </div>

                    <div class="flex gap-3">
                        <button class="px-4 py-2 rounded bg-black text-white">Update Draft</button>
                        <a href="{{ route('admin.invitations.index') }}" class="px-4 py-2 rounded border">Back</a>
                    </div>
                </form>
            </div>

            <div class="bg-white shadow sm:rounded-lg p-6">
                <div class="font-semibold">Publish</div>

                @if($invitation->status === 'published')
                    <div class="mt-2 text-sm">
                        Link:
                        <a class="underline" target="_blank"
                           href="{{ url('/u/'.$invitation->slug).'?t='.$invitation->access_token }}">
                            {{ url('/u/'.$invitation->slug).'?t='.$invitation->access_token }}
                        </a>
                    </div>
                @else
                    <form method="POST" action="{{ route('admin.invitations.publish', $invitation) }}" class="mt-3">
                        @csrf
                        <button class="px-4 py-2 rounded bg-blue-600 text-white">Publish & Generate Link</button>
                    </form>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
