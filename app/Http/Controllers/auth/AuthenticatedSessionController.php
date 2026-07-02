<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse|JsonResponse
    {
        $request->authenticate();

        $role = $request->user()->role;
        $loginType = $request->input('login_type');

        if ($loginType === 'mahasiswa' && $role !== 'mahasiswa') {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            throw ValidationException::withMessages([
                'email' => 'Halaman ini khusus Mahasiswa. Admin dan dosen silakan masuk dari Portal Admin.',
            ]);
        }

        if ($loginType === 'staff' && $role === 'mahasiswa') {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            throw ValidationException::withMessages([
                'email' => 'Halaman ini khusus Admin dan Dosen. Mahasiswa silakan masuk dari Portal Mahasiswa.',
            ]);
        }

        $request->session()->regenerate();

        $url = match ($request->user()->role) {
            'admin' => route('admin.dashboard', absolute: false),
            'dosen' => route('dosen.dashboard', absolute: false),
            default => route('mahasiswa.dashboard', absolute: false),
        };

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'redirect' => session()->pull('url.intended', $url)
            ]);
        }

        return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
