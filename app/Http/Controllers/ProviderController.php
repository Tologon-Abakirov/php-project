<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::all();
        return view('providers.index', compact('providers'));
    }

    public function create()
    {
        return view('providers.create');
    }

    public function store(Request $request)
    {
        // Валидация входных данных
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Добавьте другие правила валидации по необходимости
        ]);

        // Создание провайдера
        $provider = Provider::create($validatedData);

        // Редирект после успешного добавления
        return redirect('/providers')->with('success', 'Provider added successfully');
    }

    public function show(Provider $provider)
    {
        return view('providers.show', compact('provider'));
    }

    public function edit(Provider $provider)
    {
        return view('providers.edit', compact('provider'));
    }

    public function update(Request $request, Provider $provider)
    {
        // Валидация входных данных для редактирования
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Добавьте другие правила валидации по необходимости
        ]);

        // Обновление данных провайдера
        $provider->update($validatedData);

        // Редирект после успешного редактирования
        return redirect('/providers')->with('success', 'Provider updated successfully');
    }

    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect('/providers')->with('success', 'Provider deleted successfully');
    }
}
