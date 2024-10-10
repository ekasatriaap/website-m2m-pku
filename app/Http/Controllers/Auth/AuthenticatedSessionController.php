<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    protected $title = "Login";
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $data = [
            "title" => $this->title,
            "logo" => getSettingWebsite('logo')
        ];
        return view('auth.login', $data);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $guard = match (true) {
                $user->isRoot() => 'root',
                $user->isOperator() => 'operator',
                $user->isAdmin() => 'admin',
                default => null,
            };

            if ($guard) {
                Auth::guard($guard)->login($user);
                return redirect(route('cms.dashboard', absolute: false));
            }
        }

        return redirect(route('login'))->withErrors(['login' => 'Credentials are incorrect']);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard(activeGuard())->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
