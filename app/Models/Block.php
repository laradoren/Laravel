<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Block extends Model
{
    use Sortable;
    use HasFactory;
    protected $guarded = [];
    public $sortable = ['id', 'title', 'main_content', 'author', 'likes', 'created_at', 'updated_at'];
}
