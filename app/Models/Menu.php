<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;  

    protected $table = 'menus';  
    
    protected $primaryKey = 'idmenu';  

    protected $fillable = [  
        'idkategori',  
        'nama_menu',  
        'harga',  
        'deskripsi',  
        'foto',  
    ];  

    public function kategori()  
    {  
        return $this->belongsTo(Kategori::class, 'idkategori');  
    }  
}
