<?php

namespace App\Orchid\Resources;

use App\Models\Post;
use Orchid\Screen\TD;
use Orchid\Screen\Sight;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;

use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Illuminate\Database\Eloquent\Model;

class PostResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Post::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    { 
        return [
            Quill::make('text')->title('Text')->rows(5),
            Select::make('mark')
            ->options(
               array_combine(range(1, 10), range(1, 10))
            )->title('Mark'),


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

            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),

            TD::make('text', 'Text')->render(function($post){
                return strip_tags($post->text);
            }),
            TD::make('mark', 'Mark'),
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
            Sight::make('id', 'Id'),
            Sight::make('created_at', 'Created')->render(function ($post){
                return $post->created_at->format('Y-M-d H-i');
            }),
            Sight::make('updated_at', 'Updated')->render(function ($post){
                return $post->updated_at->format('Y-M-d H-i');
            }),
            Sight::make('text', 'Text'),
            Sight::make('mark', 'Mark'),
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

    public function save(ResourceRequest $request, Model $model): void{

        $model->user_id = auth()->user()->id;

        parent::save($request, $model);
    }
}
