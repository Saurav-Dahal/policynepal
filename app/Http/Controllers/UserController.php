<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\User\UserInterface;
use App\User;
use App\Role;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class UserController extends Controller
{
    private $user;

	public function __construct(UserInterface $user) 
	{
       $this->user = $user;
	}

    public function login(Request $request)
    {
       $this->validate($request, [
         'email' => 'required|email',
         'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
    
      try{
           if (!$token = JWTAuth::attempt($credentials))
            {
                return response()->json(['error'=> 'Invalid credentials.'], 401);
            }
         }catch(JWTException $e)
          {
           return response()->json(['error'=> 'Could not create token.'], 500);
          }
        return response()->json(['token' => $token], 200);
    }


    public function allUser()
    {
        $alluser = $this->user->all();
        return response()->json(['user' => $alluser], 201);
    }

     public function store(Request $request)
    {
       $this->validate($request, [
         'name' => 'required',
         'email' => 'required|email|unique:users',
         'password' => 'required'
      ]);
       
       $this->user->store($request);
       return response()->json(['message' => 'User created successfully.'], 201);

    }

    public function edit($id)
    {
      $user = $this->user->find($id);
      return response()->json(['all_user' => $user['getuser'], 'user_role' => $user['getrole']], 200);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
         'name' => 'required',
         'email' => 'required|email',
         'password' => 'required'
      ]);
       
       $this->user->update($request, $id);
       return response()->json(['message' => 'User updated successfully.'], 201);
    }
    
    public function delete($id)
    {
       $user = $this->user->delete($id);
       if($user)
       {
         return response()->json(['message' => 'User deleted successfully.'], 201);
       }else
       {
         return response()->json(['message' => 'Some problem occured while deleting user.'], 201);
       }
       
    }
    
}
