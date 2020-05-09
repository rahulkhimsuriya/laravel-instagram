<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\Hash;

  class PasswordChangeController extends Controller {

    public function change()
    {
      return view('passwordchange.change');
    }

    public function update()
    {
      $validateData = request()->validate([
        'old_password' => ['required', function($attribute, $value, $fail) {
          if (! Hash::check($value, Auth::user()->password)) {
            $fail('Old Password didn\'t match');
          }
        }],
        'password' => ['required', 'min:8', 'string'],
        'password_confirmation' => ['required', 'string', 'same:password'],
      ]);

      auth()->user()->update(['password' => Hash::make($validateData['password'])]);

      return redirect(route('users.show', [auth()->user()]));
    }

  }
