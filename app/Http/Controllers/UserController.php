<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\search;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Data Kader';

        $kader = User::role('Kader');

        $status = $request->input('status');
        $seacrhQuery = $request->strquery;


        if ($seacrhQuery) {
            $kader->where('name', 'like', '%' . strval($seacrhQuery) . '%');
        }


        if ($status == 'aktif') {
            $kader->where('status', 'aktif');
        } elseif ($status == 'non aktif') {
            $kader->where('status', 'non aktif');
        }

        $users = $kader->get();

        return view('user.index', compact('title', 'users', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nik' => 'required|unique|number|size:16',
            'username' => 'required',
            'password' => 'required|min:4',
        ]);

        $user = User::create([
            'name' => $request->name,
            'nik' => $request->nik,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole('Kader');

        return redirect()->route('users.index')->with('success', 'Berhasil menambahkan data kader');
    }

    public function update(Request $request, User $user)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'password' => 'nullable',
        //     'username' => 'nullable',
        //     'nik' => 'nullable',
        // ]);

        $user->update([
            'name' => $request->name,
            'nik' => $request->nik,
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'Data kader berhasil diperbarui');
    }

    public function updateUserStatus(Request $request, $id)
    {
        $users = User::findOrFail($id);

        if ($request->status == 'aktif') {
            $users->status = 'aktif';
        } elseif ($request->status == 'non aktif') {
            $users->status = 'non aktif';
        }

        $users->save();

        return redirect()->route('users.index')->with('success', 'Status kader berhasil diperbarui');
    }
}
