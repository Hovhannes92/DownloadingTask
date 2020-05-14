<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const PENDING = 0;
    const DOWNLOADING = 1;
    const COMPLETE = 2;
    const ERROR = 4;

    protected $fillable = [
        'url', 'status'
    ];

    public function getStatus()
    {
        switch ($this->status) {
            case self::PENDING;
                return 'Pending';
            case self::DOWNLOADING;
                return 'Downloading';
            case self::COMPLETE;
                return 'Complete';
            case self::ERROR;
                return 'Error';
        }
    }

    public function downloading()
    {
        $this->update(['status' => self::DOWNLOADING]);
    }

    public function complete()
    {
        $this->update(['status' => self::COMPLETE]);
    }

    public function error()
    {
        $this->update(['status' => self::ERROR]);
    }

    public function isCompleted()
    {
        return $this->status == self::COMPLETE;
    }
}
