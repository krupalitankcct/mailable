<?php

namespace mailcct\mailablecct\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailTemplate extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'id',
        'mailable',
        'mailable_type',
        'subject',
        'html_template',
        'text_template',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    
}
