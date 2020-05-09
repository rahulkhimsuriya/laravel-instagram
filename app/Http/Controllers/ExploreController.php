<?php

  namespace App\Http\Controllers;

  use App\User;
  use Illuminate\Http\Request;

  class ExploreController extends Controller {

    public function index()
    {
      $users = auth()->user()->explore();

      return view('explore.index', compact('users'));
    }

  }
