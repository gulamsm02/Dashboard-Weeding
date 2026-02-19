<x-layouts.auth :title="'Register • Wedding Invite Studio'" :heading="'Create Account'" :subheading="'Buat akun admin untuk membuat undangan.'">
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-slate-700">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus
                   class="mt-1 w-full rounded-xl border-slate-200 focus:border-indigo-400 focus:ring-indigo-400">
            @error('name') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   class="mt-1 w-full rounded-xl border-slate-200 focus:border-indigo-400 focus:ring-indigo-400">
            @error('email') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <div>
                <label class="block text-sm font-medium text-slate-700">Password</label>
                <input type="password" name="password" required
                       class="mt-1 w-full rounded-xl border-slate-200 focus:border-indigo-400 focus:ring-indigo-400">
                @error('password') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Confirm</label>
                <input type="password" name="password_confirmation" required
                       class="mt-1 w-full rounded-xl border-slate-200 focus:border-indigo-400 focus:ring-indigo-400">
            </div>
        </div>

        <button class="w-full py-2.5 rounded-xl bg-slate-900 text-white shadow hover:opacity-90">
            Register
        </button>

        <div class="text-sm text-center text-slate-600">
            Sudah punya akun?
            <a class="text-indigo-700 hover:underline" href="{{ route('login') }}">Log in</a>
        </div>
    </form>
</x-layouts.auth>
