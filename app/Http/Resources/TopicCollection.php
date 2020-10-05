<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TopicCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        // // return ['data' => $this->collection];
        return[
            'id'=> $this->id,
            'topic'=> $this->topic,
            'subj_id'=> $this->subj_id
        ];

    }
}
