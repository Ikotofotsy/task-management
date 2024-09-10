<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function registerPage(): View{
        return view('Authentication.register');
    }

    public function register(RegisterRequest $request): View{
        try{
            $request = $request->validated();
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password'])
            ]);
    
            Auth::login($user);

            return view('Tasks.index',[
                'user' => $user
            ]);
        } catch(Exception $e){

            return back()->withErrors([
                'errors' => $e->getMessage()
            ]);
        }
    }

    public function loginPage() : View{
        return view('Authentication.login');
    }

    public function login(LoginRequest $request): View | RedirectResponse{
        try{
            $credentials = $request->validated();
            if(Auth::attempt($credentials)){
               
                return view('Tasks.index',[
                    'user' => Auth::user()
                ]);
            }

            return back()->withErrors([
                'password' => 'Identifiant incorrect!'
            ])->onlyInput('email');
        } catch(Exception $e){
            return back()->withErrors([
                'errors' => $e->getMessage()
            ]);
        }
    }

    public function logout(): View | RedirectResponse{
        Auth::logout();
        
        return to_route('loginPage')->with('success', 'Deconnexion !');
    }
}
