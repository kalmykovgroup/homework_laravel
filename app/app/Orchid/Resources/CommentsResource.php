<?php

namespace App\Orchid\Resources;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class CommentsResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Comment::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {

        $users = [];
        foreach (DB::table('users')->get() as $user) {
            $users[$user->id] = $user->name;
        }

        $posts = [];
        foreach (DB::table('posts')->get() as $post) {
            $posts[$post->id] = $post->text;
        }

        return [
            Input::make('text')->title('Text'),
            Select::make('user_id')
                ->options($users)
                ->empty('No select')->title('User'),
            Select::make('post_id')
                ->options($posts)
                ->empty('No select')->title('Post'),


        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id'),

            TD::make('text', 'Text'),
            TD::make('user_id', 'User')->render(function ($post) {
                return DB::table('users')->where('id', $post->user_id)->first()->name;
            }),
            TD::make('post_id', 'Post'),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('id'),
            Sight::make('text', 'Text'),
            Sight::make('user_id', 'User')->render(function ($comment) {
                return DB::table('users')->where('id', $comment->user_id)->first()->name;
            }),
            Sight::make('post_id', 'Post')->render(function($comment){
                return strip_tags(DB::table('posts')->where('id', $comment->post_id)->first()->text);
            }),

        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}
