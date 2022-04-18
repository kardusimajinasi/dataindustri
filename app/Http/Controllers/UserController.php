<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller //menajemen admin
{

    public function index()
    {
        $data = User::where('is_admin', 1)->get(); //menambil data dari tabel user yang memiliki is_admin = 1 (admin)
        return view('users/index', compact('data'));
    }


    //membuat admin
    public function create()
    {
        return view('users/create');
    }

    //menampilkan data admin
    public function store(Request $request)
    {   


        $storeData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'is_admin' => 'required',
        
        ]);
        $storeData['password'] = Hash::make($request->password);
        $data = User::create($storeData);

        return redirect('/users')->with('completed', 'User has been saved!');
    }

    public function show($id)
    {
        //
    }

    //melakukan ubah admin
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('users/edit', compact('data'));
    }

    //melakukan update admin
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'is_admin' => 'required',
        ]);
        $updateData['password'] = Hash::make($request->password);
        User::whereId($id)->update($updateData);
        return redirect('/users')->with('completed', 'User has been updated');
    }

    //menghapus admin
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        return redirect('/users')->with('completed', 'User has been deleted');
    }
}