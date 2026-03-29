<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Profile;
use Illuminate\Http\Request;


return new class extends Migration
{
    /**
     * Reverse the migrations.
     */public function up()
{
    Schema::create('profile', function (Blueprint $table) {
        $table->id();
        $table->string('foto')->nullable();
        $table->timestamps();
    });
}

public function uploadFoto(Request $request)
{
    $request->validate([
        'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $file = $request->file('foto');
    $namaFile = time().'.'.$file->getClientOriginalExtension();
    $file->move(public_path('img'), $namaFile);

    $profile = Profile::first();

    
    if (!$profile) {
        Profile::create([
            'foto' => $namaFile
        ]);
    } else {
        $profile->update([
            'foto' => $namaFile
        ]);
    }

    return back()->with('success', 'Foto berhasil diupdate!');
}

};
