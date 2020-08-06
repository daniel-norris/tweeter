<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->paginate(3),
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        // username is required to be unique but if you are patching it would 404 - so you need to ignore current user for patch requests
        $attributes = request()->validate([
            'username' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['file'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            // 'confirmed' looks for password_confirmation and makes sure the two match
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed']
        ]);

        // stores avatars in an avatars file and saves the path to this store in attributes
        if (request('avatar')) {
            $attributes['avatar'] =
                request('avatar')
                ->storeAs(
                    'avatars',
                    request('username') . '-avatar.' . request('avatar')->extension()
                );
        }

        $user->update($attributes);

        return redirect($user->path());
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
