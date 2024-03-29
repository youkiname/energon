<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistrationMail;

class UserController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data['roles'] = Role::orderBy('id', 'desc')->get();
    }

    public function index()
    {
        $this->data['users'] = User::all();
        return view('admin.users.index', $this->data);
    }

    public function show(User $user)
    {
        $this->data['user'] = $user;
        $this->data['tasks'] = Task::where('creator_id', $user->id)
                               ->orWhere('target_user_id', $user->id)
                               ->get();
        return view('admin.users.show', $this->data);
    }

    public function create()
    {
        return view('admin.users.create', $this->data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'photo' => [
                'image', 'mimes:jpg,png,jpeg,gif', 'max:2048',
                'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
            ]
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->settings([
            'notification_email' => 1
        ]);


        if ($request->send_email) {
            Mail::to($request->email)->send(new UserRegistrationMail($request->email, $request->password));
            event(new Registered($user));
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'Пользователь ' . $user->name . ' добавлен.');


    }

    public function edit(User $user)
    {
        $this->data['user'] = $user;
        return view('admin.users.edit', $this->data);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role_id' => ['required'],
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('admin.users.show', ['user' => $user])
        ->with('success', "Успешно");
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'Пользователь ' . $user->name . ' удален.');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        if ($user->trashed()) {
            $user->restore();
        }
        return redirect()->route('admin.users.index')
            ->with('success', 'Пользователь ' . $user->name . ' восстановлен.');
    }

    public function trash()
    {
        $this->data['users'] = User::onlyTrashed()->get();
        return view('admin.users.index', $this->data);
    }

    public function tasks(User $user)
    {
        return view('admin.users.tasks', $this->data);
    }
}
