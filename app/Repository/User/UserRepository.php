<?php

namespace App\Repository\User;

use Illuminate\Database\Eloquent\Model;
use App\Repository\User\UserInterface;
use App\User;
use App\Role;

class UserRepository implements UserInterface
{
	private $user;

    public function all()
    {
    	$user= User::with('roles')->get();
    	return $user;
    }

    public function store($request)
    {
      // return $request->all();
    	$user = User::create([
          'name' => $request->input('name'),
          'email' => $request->input('email'),
          'password' => bcrypt($request->input('password'))
    	]);

        $user_role = $request->input('roles');
        // dd($user_role);
        // return $user_role;
        $user->roles()->attach($user_role);
    	return $user;
    }
     
    public function find($id)
    {
      $getuser = User::where('id', $id)
                ->with('roles')
                ->first();

      $getrole = Role::with(['users' => function($q) use ($getuser){
            $q->where('user_id', $getuser->id);
        }])->get();
       
       $user_with_role= [
         'getuser' => $getuser,
         'getrole' => $getrole
         ];

     return $user_with_role;
    }

    public function update($request, $id)
    {
        $updatedUser['name'] = $request->input('name');
        $updatedUser['email'] = $request->input('email');
        $updatedUser['password'] = bcrypt($request->input('password'));
        
        $user = User::findorFail($id);
        $user->update($updatedUser);

        $user_role = $request->input('roles');
        $user->roles()->sync($user_role);
    }

    public function delete($id)
    {
        $user = User::findorFail($id);
        $user->delete();
        return $user;
    }

}