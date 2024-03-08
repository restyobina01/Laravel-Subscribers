<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Provider;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        // Fetch subscribers with associated providers
        $subscribers = Subscriber::with('provider')->get();
        
        // Fetch provider names with their IDs
        $providers = Provider::pluck('sim_name', 'id');

        return view('subscribers.index', compact('subscribers', 'providers'));
    }
    
public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'provider_id' => 'required|exists:providers,id', // Ensure the provider_id exists in the providers table
        'number' => 'required|numeric', // Add validation for number field
    ]);

    // Create a new subscriber record
    Subscriber::create([
        'fname' => $validatedData['fname'],
        'lname' => $validatedData['lname'],
        'provider_id' => $validatedData['provider_id'],
        'number' => $validatedData['number'],
    ]);

    // Set success message
    $message = 'Subscriber added successfully!';

    // Redirect back with a status and message
    return redirect()->back()->with(['status' => 'success', 'message' => $message]);
}

public function edit($id)
{
    $subscriber = Subscriber::findOrFail($id);
    $providers = Provider::pluck('sim_name', 'id'); // Fetch provider names with their IDs
    return view('subscribers.edit', compact('subscriber', 'providers'));
}

public function update(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'provider_id' => 'required|exists:providers,id', // Ensure the provider_id exists in the providers table
        'number' => 'required|numeric', // Add validation for number field
    ]);

    // Find the subscriber and update its data
    $subscriber = Subscriber::findOrFail($id);
    $subscriber->update([
        'fname' => $validatedData['fname'],
        'lname' => $validatedData['lname'],
        'provider_id' => $validatedData['provider_id'],
        'number' => $validatedData['number'],
    ]);

    // Set success message
    $message = 'Subscriber updated successfully!';

    // Redirect to the subscriber index page after updating
    return redirect()->route('subscribers.index')->with(['status' => 'success', 'message' => $message]);
}
    
    public function destroy($id)
    {
        // Find the subscriber and delete it
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();

        // Set success message
        $message = 'Subscriber deleted successfully!';

        // Redirect back with a status and message
        return redirect()->back()->with(['status' => 'success', 'message' => $message]);
    }
}





