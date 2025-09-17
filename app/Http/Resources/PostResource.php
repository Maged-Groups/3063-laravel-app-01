<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Post ID' => $this->id,
            'Title' => $this->title,
            'Content' => $this->body,
            'By' => $this->user->name,
            'By User ID' => $this->user->id,
            'Posted on' => $this->created_at->diffForHumans()
        ];
    }
}
