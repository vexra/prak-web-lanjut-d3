<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->kelasModel = new Kelas();
    }

    public function profile($nama = "", $kelas = "", $npm = "") 
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];

        return view('profile', $data);
    }

    public function index()
     {
        $data = [
        'title' => 'List User',
        'users' => $this->userModel->getUser(),
        ];
        
        return view('list_user', $data);
    }

    public function create()
    {
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(Request $request)
    {       
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255|unique:user,npm',
            'kelas_id' => 'required|exists:kelas,id',  
        ]);

        $user = User::create($validatedData);

        return redirect('/users');
    }
}
