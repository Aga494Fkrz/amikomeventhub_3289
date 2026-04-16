<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama (beranda)
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Menampilkan halaman profil praktikan
     */
    public function profil()
    {
        return view('profil');
    }

    /**
     * Menampilkan halaman katalog event
     */
    public function katalog()
    {
        return view('katalog');
    }

    /**
     * Menampilkan halaman bantuan / FAQ
     */
    public function bantuan()
    {
        return view('bantuan');
    }

    /**
     * Menampilkan halaman kontak
     */
    public function kontak()
    {
        return view('contact');
    }
}