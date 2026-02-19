<x-layouts.auth :title="'Login • Wedding Invite Studio'" :heading="'Log in'" :subheading="'Masuk untuk mengelola undangan.'">
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-slate-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="mt-1 w-full rounded-xl border-slate-200 focus:border-indigo-400 focus:ring-indigo-400">
            @error('email') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">Password</label>
            <input type="password" name="password" required
                   class="mt-1 w-full rounded-xl border-slate-200 focus:border-indigo-400 focus:ring-indigo-400">
            @error('password') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="flex items-center justify-between">
            <label class="inline-flex items-center gap-2 text-sm text-slate-700">
                <input type="checkbox" name="remember" class="rounded border-slate-300">
                Remember me
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-700 hover:underline" href="{{ route('password.request') }}">
                    Forgot password?
                </a>
            @endif
        </div>

        <button class="w-full py-2.5 rounded-xl bg-slate-900 text-white shadow hover:opacity-90">
            Log in
        </button>

        <div class="text-sm text-center text-slate-600">
            Belum punya akun?
            <a class="text-indigo-700 hover:underline" href="{{ route('register') }}">Register</a>
        </div>
    </form>
</x-layouts.auth>
