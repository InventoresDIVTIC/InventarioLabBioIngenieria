<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;



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
       /*
        $user = $request->user();
    
        $photo = $request->file('photo');
    
        if ($photo) {
            $user->photo = $photo->store('users/photo');

            $photo->move(public_path('Profile-img'), $photo->getClientOriginalName());
        }*/

        // Obtiene el usuario actual
        $user = $request->user();

        // Obtiene la imagen seleccionada
        $photo = $request->file('photo');

        if ($photo) {
            $request->validate([
                'photo' => ['mimes:jpg,JPG,png,PNG,jpeg,JPEG', 'max:2048'], /*'image','max:2048' */ 
            ]);

            // Guarda la imagen en el proyecto
            $photoPath = $photo->move(public_path('Profile-img'), $photo->getClientOriginalName());

            // Obtiene solo el nombre de archivo de la ruta completa
            $photoName = basename($photoPath);
        
            // Concatena el nombre de archivo con la carpeta de destino
            $photoRelativePath = 'Profile-img/' . $photoName;
        
            // Guarda la ruta relativa de la imagen en la base de datos
            $user->photo = $photoRelativePath;
        
            $user->save();
        }


        // Guarda los datos del usuario
        $user->fill($request->validated());
    
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
    
        $user->save();
    
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    
}
