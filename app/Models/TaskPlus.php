<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskPlus extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'descr', 'long_descr'
    ];

    public function toggleComplete() {
        $this->completed = !$this->completed;
        $this->save();
    }

}
