<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function index()
    {
        $user = Auth::user();
        return view('layouts.backend.profile.index', compact('user'));
    }

    /**
     * Show the form for editing the user's profile.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('layouts.backend.profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            return redirect()->route('profile.index')
                ->with('success', 'Profil berhasil diperbarui.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update the user's avatar.
     */
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        try {
            Log::info('Avatar update started for user: ' . $user->id);

            // Hapus avatar lama jika ada
            if ($user->avatar && Storage::exists('public/avatars/' . $user->avatar)) {
                Log::info('Deleting old avatar: ' . $user->avatar);
                Storage::delete('public/avatars/' . $user->avatar);
            }

            // Simpan avatar baru
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                Log::info('File uploaded: ' . $file->getClientOriginalName() . ', Size: ' . $file->getSize());
                
                $fileName = 'avatar_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
                
                // Simpan file ke storage
                $file->storeAs('public/avatars', $fileName);
                Log::info('File stored as: ' . $fileName);
                
                // Cek apakah file benar-benar tersimpan
                if (Storage::exists('public/avatars/' . $fileName)) {
                    Log::info('File successfully stored in storage');
                } else {
                    Log::error('File failed to store in storage');
                    return redirect()->back()
                        ->with('error', 'Gagal menyimpan file ke server.');
                }
                
                // Update database dengan cara yang lebih reliable
                $user->avatar = $fileName;
                $user->save();
                
                Log::info('Database updated with new avatar: ' . $fileName);
                
                // Refresh user data
                Auth::user()->refresh();
            }

            return redirect()->route('profile.index')
                ->with('success', 'Foto profil berhasil diperbarui.');

        } catch (\Exception $e) {
            Log::error('Avatar update error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat mengupload foto: ' . $e->getMessage());
        }
    }

    /**
     * Remove the user's avatar.
     */
    public function removeAvatar()
    {
        $user = Auth::user();

        try {
            // Hapus avatar dari storage
            if ($user->avatar && Storage::exists('public/avatars/' . $user->avatar)) {
                Storage::delete('public/avatars/' . $user->avatar);
            }

            // Hapus referensi avatar dari database
            $user->avatar = null;
            $user->save();

            return redirect()->route('profile.index')
                ->with('success', 'Foto profil berhasil dihapus.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus foto: ' . $e->getMessage());
        }
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.']);
        }

        try {
            // CARA 1: Jika menggunakan casting 'hashed', cukup set password langsung
            $user->password = $request->new_password;
            $user->save();

            // ATAU CARA 2: Jika tidak menggunakan casting, gunakan Hash::make
            // $user->password = Hash::make($request->new_password);
            // $user->save();

            return redirect()->route('profile.index')
                ->with('success', 'Password berhasil diperbarui.');

        } catch (\Exception $e) {
            Log::error('Password update error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}