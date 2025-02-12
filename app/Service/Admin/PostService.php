<?php

namespace App\Service\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try
        {
            DB::beginTransaction();

            $tagIds = $data['tag_ids'] ?? null;
            unset($data['tag_ids']);


            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

            $post = Post::firstOrCreate($data);

            if (isset($tagIds))
            {
                $post->tags()->sync($tagIds);
            }

            DB::commit();
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            abort(500, $exception->getMessage());
        }
    }

    public function update($data, Post $post)
    {
        try
        {
            DB::beginTransaction();

            $tagIds = $data['tag_ids'] ?? null;
            unset($data['tag_ids']);

            if (isset($data['preview_image']))
            {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            $post->update($data);

            if (isset($tagIds))
            {
                $post->tags()->sync($tagIds);
            }

            DB::commit();
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            abort(500, $exception->getMessage());
        }

        return $post->fresh();
    }
}
