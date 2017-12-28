<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $guarded = [];

    public static function allFor($model, $model_id)
    {
        $records = self::where(['commentable_id' => $model_id, 'commentable_type' => $model])
            ->orderBy('created_at', 'ASC')->get();
        $comments = [];
        $by_id = [];
        foreach ($records as $record) {
            if ($record->reply) {
                $by_id[$record->reply]->attributes['replies'][] = $record;
            } else {
                $record->attributes['replies'] = [];
                $by_id[$record->id] = $record;
                $comments[] = $record;
            }
        }
        return $comments;
    }
}