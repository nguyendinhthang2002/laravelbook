<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function getAll()
    {
        // $groups = DB::table($this->table)
        // ->orderBy('name', 'ASC')
        // ->get();

        $groups = Group::orderBy('name', 'ASC')->get();

        return $groups;
    }
}
