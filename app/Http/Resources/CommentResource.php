<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Id' => $this->id,
            'Comment' => $this->comment,
            'Post Id' => $this->post_id,
            'By' => $this->user->name,
            'By ID' => $this->user->id,
            'Commented on' => $this->created_at->diffForHumans()
        ];
    }
}
