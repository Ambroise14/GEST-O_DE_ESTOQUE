<?php

namespace App\Services;

use App\Models\Employe;
use App\Models\Endereco;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageService
{
   public static function uploadimage($path,UploadedFile $file){
    $name=$file->getClientOriginalName();
    return $file->move($path,$name);
   }
}
