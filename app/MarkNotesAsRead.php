<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarkNotesAsRead extends Model
{
    protected $table = 'mark_notes_as_reads';
    protected $fillable = ['sender_id','sender_role_id','is_read','note_id','reader_id'];

    public function note()
    {
        return $this->hasOne('\App\Notification','id','note_id');
    }
}