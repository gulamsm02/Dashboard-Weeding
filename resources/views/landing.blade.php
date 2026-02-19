<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Wedding Invite Studio</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="min-h-screen text-slate-900 bg-black overflow-x-hidden">

    <!-- BACKGROUND -->
    <div class="fixed inset-0 -z-30">
        <img src="{{ asset('images/hero.jpg') }}"
             class="w-full h-full object-cover scale-105"
             alt="Wedding Hero">
    </div>
    <div class="fixed inset-0 -z-20 bg-black/55"></div>
    <div class="fixed inset-0 -z-10 bg-gradient-to-b from-black/70 via-black/40 to-black/80"></div>

    <!-- PAGE WRAP (ini penting supaya konten selalu di atas background) -->
    <div class="relative z-10">

        <!-- NAVBAR -->
        <header class="sticky top-0 z-50">
            <div class="bg-white/10 backdrop-blur-xl border-b border-white/10">
                <nav class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-rose-500 to-indigo-500 shadow-lg"></div>
                        <div class="leading-tight">
                            <div class="font-semibold tracking-tight text-white">Wedding Invite Studio</div>
                            <div class="text-xs text-white/70">Create • Publish • Share</div>
                        </div>
                    </a>

                    <div class="flex items-center gap-2">
                        @auth
                            <a href="{{ route('admin.invitations.index') }}"
                               class="px-4 py-2 rounded-xl bg-white text-slate-900 font-medium shadow hover:opacity-90">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="px-4 py-2 rounded-xl border border-white/20 bg-white/10 text-white hover:bg-white/15 backdrop-blur">
                                Log in
                            </a>
                            <a href="{{ route('register') }}"
                               class="px-4 py-2 rounded-xl bg-white text-slate-900 font-medium shadow hover:opacity-90">
                                Register
                            </a>
                        @endauth
                    </div>
                </nav>
            </div>
        </header>

        <!-- HERO -->
        <main class="max-w-6xl mx-auto px-4 py-14">
            <section class="grid lg:grid-cols-2 gap-10 items-center">

                <!-- LEFT -->
                <div class="text-white">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 border border-white/15 backdrop-blur text-sm">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        Undangan digital elegan + masa aktif (expired)
                    </div>

                    <h1 class="mt-5 text-4xl lg:text-5xl font-semibold tracking-tight leading-tight">
                        Buat undangan pernikahan digital
                        <span class="bg-gradient-to-r from-rose-300 to-indigo-300 bg-clip-text text-transparent">lebih cepat</span>,
                        lebih rapi, lebih modern.
                    </h1>

                    <p class="mt-4 text-white/85 leading-relaxed">
                        Login sebagai admin, isi data undangan lewat form, lalu publish.
                        Kamu dapat link unik untuk dibagikan, dan undangan otomatis tidak bisa diakses setelah masa aktif habis.
                    </p>

                    <div class="mt-7 flex flex-wrap gap-3">
                        @auth
                            <a href="{{ route('admin.invitations.create') }}"
                               class="px-5 py-3 rounded-2xl bg-white text-slate-900 font-medium shadow hover:opacity-90">
                                Create Invitation
                            </a>
                            <a href="{{ route('admin.invitations.index') }}"
                               class="px-5 py-3 rounded-2xl border border-white/20 bg-white/10 text-white hover:bg-white/15 backdrop-blur">
                                View Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}"
                               class="px-5 py-3 rounded-2xl bg-white text-slate-900 font-medium shadow hover:opacity-90">
                                Mulai Sekarang
                            </a>
                            <a href="{{ route('login') }}"
                               class="px-5 py-3 rounded-2xl border border-white/20 bg-white/10 text-white hover:bg-white/15 backdrop-blur">
                                Saya sudah punya akun
                            </a>
                        @endauth
                    </div>

                    <div class="mt-10 grid sm:grid-cols-3 gap-3">
                        <div class="p-4 rounded-2xl bg-white/10 border border-white/15 backdrop-blur">
                            <div class="font-semibold">Admin Form</div>
                            <div class="text-sm text-white/75 mt-1">Isi data undangan dengan rapi.</div>
                        </div>
                        <div class="p-4 rounded-2xl bg-white/10 border border-white/15 backdrop-blur">
                            <div class="font-semibold">Link Unik</div>
                            <div class="text-sm text-white/75 mt-1">Publish → dapat link share.</div>
                        </div>
                        <div class="p-4 rounded-2xl bg-white/10 border border-white/15 backdrop-blur">
                            <div class="font-semibold">Expired</div>
                            <div class="text-sm text-white/75 mt-1">Otomatis nonaktif sesuai waktu.</div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT (Preview Card) -->
                <div class="relative">
                    <div class="rounded-3xl bg-white/12 border border-white/15 backdrop-blur-2xl shadow-2xl overflow-hidden">
                        <div class="p-6 border-b border-white/10 flex items-center justify-between text-white">
                            <div>
                                <div class="font-semibold">Preview Undangan</div>
                                <div class="text-xs text-white/70">Elegant • Modern • Romantic</div>
                            </div>
                            <div class="flex gap-2">
                                <span class="w-3 h-3 rounded-full bg-rose-400"></span>
                                <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                                <span class="w-3 h-3 rounded-full bg-emerald-400"></span>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="rounded-3xl bg-gradient-to-br from-rose-500 to-indigo-600 text-white p-7 shadow-lg">
                                <div class="text-sm opacity-90">Wedding Invitation</div>
                                <div class="text-3xl font-semibold mt-2">Andi & Rina</div>
                                <div class="opacity-90 mt-2">Sabtu, 12 Okt 2026 • 19:00 WIB</div>
                                <div class="mt-5 inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/20">
                                    <span class="w-2 h-2 rounded-full bg-white"></span>
                                    Link aktif sampai expired
                                </div>
                            </div>

                            <div class="mt-5 grid grid-cols-2 gap-3">
                                <div class="p-4 rounded-2xl bg-white/10 border border-white/15 text-white">
                                    <div class="font-medium">Gallery</div>
                                    <div class="text-sm text-white/70 mt-1">Foto prewedding</div>
                                </div>
                                <div class="p-4 rounded-2xl bg-white/10 border border-white/15 text-white">
                                    <div class="font-medium">Countdown</div>
                                    <div class="text-sm text-white/70 mt-1">Menuju hari H</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -z-10 -bottom-10 -right-10 w-44 h-44 rounded-full bg-indigo-300/30 blur-3xl"></div>
                </div>

            </section>

            <!-- FOOTER -->
            <footer class="mt-14 text-center text-sm text-white/70">
                © {{ date('Y') }} Wedding Invite Studio • Built with Laravel
            </footer>
        </main>
    </div>

</body>
</html>
