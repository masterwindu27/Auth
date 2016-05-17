<?php


namespace App\Http\Controllers\MojAuth;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Symfony\Component\DomCrawler\Form;
use App\User;
use Hash;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function index()
    {
        //return redirect('login');
        return view('admin');
    }

    public function proba(Request $request)
    {
        $isuser = $this->validacija($request->username,$request->password);
        
        if ($isuser == true){
            return redirect('admin');
        }
        return view('auth.login');
    }

    public function validacija($username, $password)
    {
        $user = User::where('username', $username)->first();
        $checkPass = Hash::check($password, $user->password);

        if ($checkPass == true) {
            return true;
        }
        else{
            return false;
        }
    }

    public function register(Request $request)
    {

        $this->validate($request,[
            'username' => 'required|unique:users',
            'email' => 'email|required|unique:users',
            'password' => 'min:6|required|confirmed',
        ]);

        User::create([
          'name' => $request->name,
          'username' => $request->username,
          'email' => $request->email,
          'password' => Hash::make($request->password),
        ]);


        return redirect('login');

    }
}