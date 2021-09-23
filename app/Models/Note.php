<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model for Note
 */
class Note extends Model
{
    use HasFactory;

    /**
     * Table used by model
     *
     * @var string
     */
    protected $table='notes';

    protected $fillable = ['title', 'description'];
}
