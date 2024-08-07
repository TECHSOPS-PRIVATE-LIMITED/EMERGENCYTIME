<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return View
     */
    public function create(): View
    {
        return view('site.authentication.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param Request $request
     * @return RedirectResponse
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
//        'email:rfc,dns'
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string','email','max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
//            'terms' => ['required', 'accepted'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        try {
            $user->assignRole('user');
        } catch (Exception $e) {
            return to_route('register')->with('error', $e->getMessage());
        }

       event(new Registered($user));

        Auth::login($user);

        // Check the role of the logged-in user and redirect accordingly
        if ($user->hasRole('admin') || $user->hasRole('super-admin')) {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/');
        }
    }
}
