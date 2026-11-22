<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()->orderBy('full_name')->get();

        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'max:50', 'unique:users,username'],
            'full_name' => ['required', 'string', 'max:100'],
        ]);

        User::create($data);

        return to_route('users.index')->with('status', 'User created.');
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'max:50', 'unique:users,username,'.$user->id],
            'full_name' => ['required', 'string', 'max:100'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        unset($data['avatar']);

        if ($request->hasFile('avatar')) {
            $uploaded = $request->file('avatar');
            $prepared = (new ImageManager(new Driver()))
                ->read($uploaded->getRealPath())
                ->scaleDown(width: 512, height: 512)
                ->toWebp(quality: 82)
                ->toString();
            $path = 'avatars/'.Str::uuid().'.webp';
            Storage::disk('public')->put($path, $prepared);

            $oldAvatar = $user->avatar;
            $data['avatar'] = $path;
            $user->update($data);

            if ($oldAvatar) {
                Storage::disk('public')->delete($oldAvatar);
            }
        } else {
            $user->update($data);
        }

        return to_route('users.index')->with('status', 'User updated.');
    }
}
