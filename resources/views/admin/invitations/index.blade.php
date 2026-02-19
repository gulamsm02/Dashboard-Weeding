<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-slate-900 leading-tight">Invitations</h2>
                <p class="text-sm text-slate-600">Kelola draft, publish, dan link undangan.</p>
            </div>
            <a href="{{ route('admin.invitations.create') }}"
               class="px-4 py-2 rounded-xl bg-slate-900 text-white shadow hover:opacity-90">
                + Create
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-4">

            @if(session('success'))
                <div class="p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-2xl border border-slate-200 overflow-hidden">
                <div class="p-4 border-b border-slate-200 flex items-center justify-between">
                    <div class="font-semibold text-slate-900">List</div>
                    <div class="text-xs text-slate-500">Tip: Publish untuk dapat link</div>
                </div>

                <div class="p-4">
                    @if($invitations->isEmpty())
                        <div class="text-slate-600">Belum ada undangan.</div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                <tr class="text-left text-slate-600 border-b">
                                    <th class="py-2">Title</th>
                                    <th>Status</th>
                                    <th>Expired</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invitations as $inv)
                                    @php
                                        $link = $inv->status === 'published'
                                            ? url('/u/'.$inv->slug).'?t='.$inv->access_token
                                            : null;
                                    @endphp
                                    <tr class="border-b last:border-b-0">
                                        <td class="py-3 font-medium text-slate-900">{{ $inv->title }}</td>
                                        <td>
                                            <span class="px-2 py-1 rounded-lg text-xs border
                                                {{ $inv->status === 'published'
                                                    ? 'bg-indigo-50 border-indigo-200 text-indigo-700'
                                                    : 'bg-slate-50 border-slate-200 text-slate-700' }}">
                                                {{ $inv->status }}
                                            </span>
                                        </td>
                                        <td class="text-slate-700">{{ $inv->expired_at?->format('Y-m-d H:i') ?? '-' }}</td>
                                        <td class="py-3 text-right space-x-3">
                                            <a class="underline text-slate-800 hover:text-slate-950"
                                               href="{{ route('admin.invitations.edit', $inv) }}">Edit</a>

                                            @if($link)
                                                <a class="underline text-indigo-700 hover:text-indigo-900"
                                                   href="{{ $link }}" target="_blank">Open</a>

                                                <button type="button"
                                                        class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50"
                                                        onclick="navigator.clipboard.writeText('{{ $link }}'); this.innerText='Copied'; setTimeout(()=>this.innerText='Copy',1200);">
                                                    Copy
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
