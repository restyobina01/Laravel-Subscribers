<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::all();
        return view('providers.index', compact('providers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sim_name' => 'required|string|max:255',
        ]);

        Provider::create($validatedData);

        return redirect()->route('providers.index')->with(['status' => 'success', 'message' => 'Provider added successfully!']);
    }

    public function edit($id)
    {
        $provider = Provider::findOrFail($id);
        return view('providers.edit', compact('provider'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'sim_name' => 'required|string|max:255',
        ]);

        $provider = Provider::findOrFail($id);
        $provider->update($validatedData);

        return redirect()->route('providers.index')->with(['status' => 'success', 'message' => 'Provider updated successfully!']);
    }

    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete();

        return redirect()->route('providers.index')->with(['status' => 'success', 'message' => 'Provider deleted successfully!']);
    }
}
