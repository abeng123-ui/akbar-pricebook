<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model {

    protected $table = 'product';

    public static $rules = [
        'onCreate' => [
            'name'          => 'required|string',
        ],
    ];

    public static $messages = [
        'required' => 'The :attribute field is required.',
        'string'   => 'The :attribute field must be a string.',
    ];

}
