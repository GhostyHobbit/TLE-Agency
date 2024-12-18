<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Get the user
        $user = $request->user();

        // Update the user's fields (including email)
        $user->fill($request->validated());

        // If email has changed, reset email verification
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Save the user model
        $user->save();

        // Redirect back to the profile page with a success message
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Instantly update the user's profile picture.
     */
    public function updatePicture(Request $request)
    {
        // Validate the incoming request for profile picture options
        $request->validate([
            'profile_picture' => 'required|string|in:picture1.jpg,picture2.jpg,picture3.jpg,picture4.jpg,picture5.jpg',
        ]);

        // Update the user's profile picture
        $user = Auth::user();
        $user->profile_picture = $request->input('profile_picture');
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Profile picture updated successfully.',
            'profile_picture' => $user->profile_picture,
        ]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validate the password input before deletion
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Log the user out before deletion
        Auth::logout();

        // Delete the user from the database
        $user->delete();

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the home page after deletion
        return Redirect::to('/');
    }
}
