<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePreferencesController extends Controller
{
    /**
     * Save the user preferences to the database.
     */
    public function index()
    {
        // Render the preferences view
        return view('profile.preferences');
    }

    public function update(Request $request)
    {
        // Validate input
        $request->validate([
            'preference1' => 'required|integer|in:0,1,2',
            'preference2' => 'required|integer|in:0,1,2',
            'preference3' => 'required|integer|in:0,1,2',
            'preference4' => 'required|integer|in:0,1,2',
        ]);

        // Save the preference in the database
        $user = Auth::user(); // Get the authenticated user
        $user->preference1 = $request->preference1;
        $user->preference2 = $request->preference2;
        $user->preference3 = $request->preference3;
        $user->preference4 = $request->preference4;

        $user->save(); // Save the updated user data to the database

        // Redirect back with a success message
        return redirect()->route('profile.edit')->with('status', 'Preferences updated successfully!');
    }
}
