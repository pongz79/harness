<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    protected $guarded = [];

    public function toArray()
    {
        return [
            'release_date' => $this->getAttribute('release_date'),
            'keywords'     => $this->getAttribute('keywords'),
            'description'  => $this->getAttribute('description'),
            'certificate'  => $this->getAttribute('certificate'),
            'filename'     => $this->getAttribute('filename')
        ];
    }
}
