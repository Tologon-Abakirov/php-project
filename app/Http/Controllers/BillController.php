<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::all();
        return view('bills.index', compact('bills'));
    }

    public function show()
    {
        $bills = Bill::all();
        return view('bills.index', compact('bills'));
    }

    public function create()
    {
        $providers = Provider::all();
        $users = User::all();
        return view('bills.create', compact('providers', 'users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required',
            //'due_date' => 'required|date',
            //'description' => 'string',
            'provider_id' => 'required|exists:providers,id',
            // Убрали 'name' из правил валидации
            'user_id' => 'required|exists:users,id',
        ]);

        // Вместо Bill::create($validatedData);
        $bill = new Bill($validatedData);
        $bill->name = $request->input('name'); // Добавили 'name' вручную
        $bill->due_date = $request->input('due_date'); // Добавили 'due_date' вручную
        $bill->description = $request->input('description');

        $bill->save();

        return redirect(route('bills.index'))->with('success', 'Bill added successfully');
    }


    public function edit(Bill $bill)
    {
        $providers = Provider::all();
        $users = User::all();
        return view('bills.edit', compact('bill', 'providers', 'users'));
    }

    public function update(Request $request, Bill $bill)
    {
        $validatedData = $request->validate([
            'amount' => 'required',
            'due_date' => 'required|date',
            'description' => 'string',
            'provider_id' => 'required|exists:providers,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $bill->update($validatedData);

        return redirect('/bills')->with('success', 'Bill updated successfully');
    }

    public function destroy(Bill $bill)
    {
        $bill->delete();
        return redirect(route('bills.index'))->with('success', 'Bill deleted successfully');
    }
}
