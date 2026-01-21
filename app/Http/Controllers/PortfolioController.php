<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $data = [
            'nama' => 'Rasya Skp',
            'profesi' => 'Siswa SMK | Calon Web Developer',
            'deskripsi' => "Perkenalkan, nama lengkap saya Rasya. Saat ini saya masih bersekolah di SMK dan duduk di kelas 2.
Saya memiliki ketertarikan yang besar di bidang teknologi, khususnya dalam pengembangan website.
Saya terbiasa menggunakan HTML, CSS, dan PHP untuk membangun website yang modern, responsif, dan mudah digunakan.
Selama masa sekolah, saya terus belajar dan mengembangkan kemampuan melalui berbagai latihan dan project sederhana.
Saya percaya bahwa belajar melalui praktik langsung adalah cara terbaik untuk meningkatkan kemampuan.
Saya memiliki semangat belajar yang tinggi, disiplin, dan bertanggung jawab.
Ke depannya, saya bercita-cita menjadi web developer profesional dan menciptakan karya digital yang bermanfaat.",
            'github' => 'https://github.com/zynek123'
        ];

        return view('welcome', $data);
    }

    public function project()
    {
        $nama = 'Rasya';

        return view('project', compact('nama'));
    }
}
