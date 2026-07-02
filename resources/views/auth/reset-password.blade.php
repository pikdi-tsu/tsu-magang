<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Ulang Password - TSU</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'tsu-teal': '#086375',
                        'tsu-teal-dark': '#064e5c',
                    },
                    fontFamily: {
                        'sans': ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-[#4c9ca8] to-[#2c6e7a] font-sans min-h-screen flex items-center justify-center p-4">

    <div class="bg-white w-full max-w-[600px] rounded-[40px] shadow-2xl p-8 sm:p-12 flex flex-col items-center text-center">
        
        <div class="flex items-center gap-3 mb-8">
            <div class="w-25 h-30 flex-shrink-0">
                <img src="/images/logo_tsu.svg" alt="">
            </div>
            <div class="flex flex-col text-left">
                <span class="text-xs text-gray-800 leading-tight mt-1">Sistem Informasi Magang<br><span class="font-bold">UNIVERSITAS TIGA SERANGKAI</span></span>
            </div>
        </div>

        <h1 class="text-2xl font-bold text-black mb-4">Atur Ulang Kata Sandi</h1>
        
        <p class="text-black text-sm mb-6 leading-relaxed max-w-sm mx-auto">
            Silakan masukkan kata sandi baru Anda di bawah ini. Pastikan kata sandi minimal 8 karakter.
        </p>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6 w-full max-w-md text-left text-sm" role="alert">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.store') }}" class="w-full max-w-md text-left">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email Address -->
            <div class="mb-4">
                <label class="block text-black font-semibold text-sm mb-2 ml-1" for="email">
                    Email
                </label>
                <input id="email" type="email" name="email" value="{{ old('email', $email) }}" required autofocus
                    class="w-full border border-gray-400 px-4 py-3 rounded text-sm placeholder-gray-400 
                           focus:outline-none focus:border-tsu-teal focus:ring-1 focus:ring-tsu-teal transition bg-gray-100" readonly>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-black font-semibold text-sm mb-2 ml-1" for="password">
                    Kata Sandi Baru
                </label>
                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter"
                    class="w-full border border-gray-400 px-4 py-3 rounded text-sm placeholder-gray-300
                           focus:outline-none focus:border-tsu-teal focus:ring-1 focus:ring-tsu-teal transition">
            </div>

            <!-- Confirm Password -->
            <div class="mb-8">
                <label class="block text-black font-semibold text-sm mb-2 ml-1" for="password_confirmation">
                    Konfirmasi Kata Sandi Baru
                </label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Tulis ulang kata sandi baru"
                    class="w-full border border-gray-400 px-4 py-3 rounded text-sm placeholder-gray-300
                           focus:outline-none focus:border-tsu-teal focus:ring-1 focus:ring-tsu-teal transition">
            </div>

            <button type="submit"
                class="w-full bg-tsu-teal text-white font-bold py-3 rounded-lg
                       hover:bg-tsu-teal-dark transition shadow-md text-base">
                Simpan Kata Sandi
            </button>
        </form>

    </div>

</body>
</html>