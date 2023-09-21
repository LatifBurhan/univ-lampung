<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormProfilPegawai extends Model
{
    protected $table = 'form_profil_pegawai';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nip_pegawai',
        'nama_pegawai',
        'ttl_pegawai',
        'email_pegawai',
        'jenis_kelamin',
        'website_pegawai',
        'keahlian',
        'pas_foto',
        'file_name',
        'file_type',
    ];

    public function users() {
        return $this->hasOne(User::class);
    }


}
