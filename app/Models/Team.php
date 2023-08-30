<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    public function members()
    {
        return $this->hasMany(Employee::class,'team_id');
    }

    public function children()
    {
        return $this->hasMany(Team::class, 'parent_team_id');
    }
}
