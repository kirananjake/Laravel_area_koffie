<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    
    protected $table = 'kategoris';  
    
    protected $primaryKey = 'idkategori';  

    protected $fillable = [  
        'nama_kategori',  
    ];  

    
    public function menus()  
    {  
        return $this->hasMany(Menu::class, 'idkategori');  
    }  

}
