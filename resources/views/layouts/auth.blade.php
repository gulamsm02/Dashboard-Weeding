<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title ?? 'Wedding Invite Studio' }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-rose-50 via-white to-indigo-50 text-slate-900">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-40 -left-40 w-[520px] h-[520px] rounded-full bg-rose-200/40 blur-3xl"></div>
        <div class="absolute top-20 -right-40 w-[560px] h-[560px] rounded-full bg-indigo-200/40 blur-3xl"></div>
        <div class="absolute bottom-[-200px] left-1/2 -translate-x-1/2 w-[700px] h-[700px] rounded-full bg-amber-200/30 blur-3xl"></div>
    </div>

    <div class="relative min-h-screen">
        <header class="max-w-6xl mx-auto px-4 py-6 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-rose-500 to-indigo-500 shadow-lg"></div>
                <div>
                    <div class="font-semibold tracking-tight">Wedding Invite Studio</div>
                    <div class="text-xs text-slate-600">Create • Publish • Share</div>
                </div>
            </a>
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}"
                   class="px-4 py-2 rounded-xl border border-slate-200 bg-white/70 backdrop-blur hover:bg-white">
                    Log in
                </a>
                <a href="{{ route('register') }}"
                   class="px-4 py-2 rounded-xl bg-slate-900 text-white shadow hover:opacity-90">
                    Register
                </a>
            </div>
        </header>

        <main class="max-w-6xl mx-auto px-4 pb-16">
            <div class="grid lg:grid-cols-2 gap-10 items-center mt-6">
                <!-- left: marketing -->
                <section class="hidden lg:block">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/70 border border-slate-200 backdrop-blur text-sm">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        Login admin untuk kelola undangan
                    </div>

                    <h1 class="mt-5 text-4xl font-semibold tracking-tight leading-tight">
                        Kelola undangan digital dengan
                        <span class="bg-gradient-to-r from-rose-600 to-indigo-600 bg-clip-text text-transparent">tampilan premium</span>.
                    </h1>

                    <p class="mt-4 text-slate-700 leading-relaxed">
                        Buat, publish, bagikan link, dan atur masa aktif undangan. Semua rapi di dashboard.
                    </p>

                    <div class="mt-8 grid grid-cols-2 gap-3">
                        <div class="p-4 rounded-2xl bg-white/70 border border-slate-200 backdrop-blur">
                            <div class="font-semibold">Link Unik</div>
                            <div class="text-sm text-slate-600 mt-1">Auto generate saat publish.</div>
                        </div>
                        <div class="p-4 rounded-2xl bg-white/70 border border-slate-200 backdrop-blur">
                            <div class="font-semibold">Expired</div>
                            <div class="text-sm text-slate-600 mt-1">Nonaktif otomatis sesuai waktu.</div>
                        </div>
                    </div>
                </section>

                <!-- right: card -->
                <section>
                    <div class="bg-white/70 border border-slate-200 backdrop-blur shadow-xl rounded-3xl overflow-hidden">
                        <div class="p-6 border-b border-slate-200">
                            <div class="font-semibold text-lg">{{ $heading ?? 'Welcome' }}</div>
                            <div class="text-sm text-slate-600 mt-1">{{ $subheading ?? '' }}</div>
                        </div>

                        <div class="p-6">
                            {{ $slot }}
                        </div>
                    </div>

                    <div class="mt-4 text-center text-xs text-slate-600">
                        © {{ date('Y') }} Wedding Invite Studio
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>
</html>
