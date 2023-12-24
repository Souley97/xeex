<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
   
    public function index()
    {
        $users = User::all();
        $surveys = Survey::all();
        $users = User::paginate(8);
        

        return view('admin.users.index', compact('users','surveys'));
    }
    public function show($id)
{
    $user = User::find($id); // Récupérez l'utilisateur par son ID

    return view('admin.users.show', compact('user'));
}
public function edit($id)
{
    $user = User::find($id); // Récupérez l'utilisateur par son ID

    return view('admin.users.update', compact('user'));
}


public function destroy($id)
{
    $user = User::find($id);

    if (!$user) {
        return redirect()->route('users.index')->with('error', 'L\'utilisateur n\'existe pas.');
    }

    $user->delete();

    return redirect()->route('users.index')->with('success', 'L\'utilisateur a été supprimé avec succès.');
}


public function update(Request $request, $id)
{
    $user = User::find($id); // Récupérez l'utilisateur par son ID

    // Validez et mettez à jour les données de l'utilisateur
    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        // Ajoutez d'autres règles de validation au besoin
    ]);

    $user->update($request->all());

    return redirect()->route('users.show', $user->id);
}

public function roles (){
    $roles = Roles::all();
    return view('admin.settings.roles.index', compact('roles'));
}
public function create_role(){
    return view('admin.settings.roles.create');
}
public function store_role(Request $request)
{
    // Validez et enregistrez le sondage
    Roles::create($request->all());
    return redirect()->route('roles.index');
}

public function show_role($id)
{
    $role = Roles::find($id); // Récupérez l'utilisateur par son ID

    return view('admin.settings.roles.show', compact('role'));
}
public function edit_role($id)
{
    $role = Roles::find($id); // Récupérez l'utilisateur par son ID

    return view('admin.settings.roles.update', compact('role'));
}

public function update_role(Request $request, $id)
{
    $user = User::find($id); // Récupérez l'utilisateur par son ID
    $roles = Roles::find($id); // Récupérez l'utilisateur par son ID

    // Validez et mettez à jour les données de l'utilisateur
    $request->validate([
        'name' => 'required',
      
        // Ajoutez d'autres règles de validation au besoin
    ]);

    $user->update($request->all());
    $roles->update($request->all());

    return redirect()->route('roles.show', $roles->id);
}


}
