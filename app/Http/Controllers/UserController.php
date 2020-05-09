<?php

  namespace App\Http\Controllers;

  use App\User;
  use Illuminate\Http\Request;
  use Intervention\Image\Facades\Image;

  class UserController extends Controller {

    public function show(User $user)
    {
      return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
      return view('users.edit', compact('user'));
    }

    public function update(User $user)
    {
      $validateData = request()->validate([
        'avatar' => ['file', 'image', 'mimes:jpeg,png'],
        'name' => ['required', 'min:3', 'max:255', 'string'],
        'username' => ['required', 'min:3', 'max:255', 'unique:users,username' . $user->id],
        'bio' => ['min:5', 'max:255', 'string'],
      ]);

      if (request()->hasFile('avatar')) {
        $imagePath = request('avatar')->store('avatars', 'public');

        $image = Image::make(public_path('storage/' . $imagePath))->fit(300, 300);
        $image->save();

        $validateData['avatar'] = $imagePath;
      }

      auth()->user()->update($validateData);

      $user->refresh();

      return redirect($user->getProfileUrl())->withSuccess('Profile updated successfully.');
    }

  }
