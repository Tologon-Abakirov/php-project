<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Валидация входных данных
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            // Добавьте другие правила валидации по необходимости
        ]);

        // Создание пользователя
        $user = User::create($validatedData);

        // Редирект после успешного добавления
        return redirect('/users')->with('success', 'User added successfully');
    }

      public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('users.index'))->with('success', 'User deleted successfully');
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // Добавьте другие правила валидации, если необходимо
        ]);

        $user->update($validatedData);

        return redirect(route('users.index'))->with('success', 'User updated successfully');
    }

    // Добавьте другие методы контроллера, если необходимо
}