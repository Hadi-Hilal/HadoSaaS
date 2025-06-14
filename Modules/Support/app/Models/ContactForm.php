<?php

namespace Modules\Support\Models;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    protected $fillable = ['ip_address', 'name', 'email', 'mobile', 'subject', 'message'];
}
