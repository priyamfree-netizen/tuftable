<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesktopApplication extends Model
{
    use HasFactory;

    const WINDOWS_FILE_PATH = 'https://tuftable.com/app/download/windows';
    const MAC_FILE_PATH = 'https://tuftable.com/app/download/macos';
    const LINUX_FILE_PATH = 'https://tuftable.com/app/download/linux';

    protected $guarded = ['id'];
    protected $table = 'desktop_applications';

    public function getIsActiveAttribute()
    {
        return $this->windows_file_path || $this->mac_file_path || $this->linux_file_path;
    }
}
