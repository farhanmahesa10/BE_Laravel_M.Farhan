<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];
         $data['users'] = User::with('profile')->get();
        return view('home',$data);
    }

    public function create(){
        return view('user.create');
    }
    public function store(Request $request){
        $request->validate([
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'email' => ['required','email','unique:users,email'],
            'username' => ['required','unique:users,username'],
            'nama_lengkap' => ['required'],
            'alamat' => ['required'],
            'pendidikan_terakhir' => ['required'],
            'no_telpon' => ['required'],
            'pekerjaan' => ['required'],
        ]);

       $user =  User::create([
           'email' => $request->email,
           'password' => $request->password,
           'username' => $request->username
       ]);
       Profile::create([
           'user_id' => $user->id,
           'alamat_ktp' => $request->alamat,
           'pekerjaan' => $request->pekerjaan,
           'nama_lengkap' => $request->nama_lengkap,
           'pendidikan_terakhir' => $request->pendidikan_terakhir,
           'nomor_telpon' => $request->no_telpon
       ]);
       return redirect('/home')->with('success',"success adding new user");
    }

    public function edit(User $user){
        $data = [];
        $data['user'] = $user;
        return view('user.edit',$data);
    }
    public function update(Request $request, User $user){
        $request->validate([
            'email' => ['required','email','unique:users,email,' . $user->id],
            'username' => ['required','unique:users,username,' . $user->id],
            'nama_lengkap' => ['required'],
            'alamat' => ['required'],
            'pendidikan_terakhir' => ['required'],
            'no_telpon' => ['required'],
            'pekerjaan' => ['required'],
        ]);
         User::where('id',$user->id)->update([
            'email' => $request->email,
            'username' => $request->username
        ]);
        Profile::where('user_id',$user->id)->update([
            'user_id' => $user->id,
            'alamat_ktp' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'nama_lengkap' => $request->nama_lengkap,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'nomor_telpon' => $request->no_telpon
        ]);
        return redirect('/home')->with('success',"success editing user data");
    }

    public function destroy(User $user){
        Profile::where('user_id',$user->id)->delete();
        $user->delete();
       return redirect('/home')->with('success',"success deleteing user");
    }
}