<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function Categorie(){
        return $this->belongsTo(Categorie::class);  //BelongsTo ar jonno model and funtion same hoba
                                                    //model and migration name (s) cara anno kno //partokko thakta parbana 
            }
}
