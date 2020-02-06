<?php

namespace MeRRS;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class RequestPage extends Model
{
    use SoftDeletes;
    use Sortable;

    protected $table = "request";

    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'start', 'end', 'room', 'requestedBy', 'description'];


    /**
     * Get the user's full concatenated name.
     * -- Must postfix the word 'Attribute' to the function name
     *
     * @return string
     */

     public function getStartAttribute($value)
     {
         $dateStart = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
         $timeStart = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('H:i');

         return $this->start = ($timeStart == '00:00' ? $dateStart : $value);
     }

     public function getEndAttribute($value)
     {
         $dateEnd = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
         $timeEnd = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('H:i');

         return $this->end = ($timeEnd == '00:00' ? $dateEnd : $value);
     }


    public function user()
    {
        return $this->belongsTo('MeRRS\User', 'user_id');
    }
}

