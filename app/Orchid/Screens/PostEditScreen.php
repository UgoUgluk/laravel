<?php

namespace App\Orchid\Screens;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Support\Facades\Alert;


class PostEditScreen extends Screen
{
    /**
     * @var Post
     */
    public $post;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Post $post): array
    {
        return [
            'post' => $post
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->post->exists ? 'admin.Edit post' : 'admin.Creating a new post';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return "admin.Blog posts";
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('admin.Create post')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->post->exists),

            Button::make('admin.Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->post->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->post->exists),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('post.title')
                    ->title('admin.Title')
                    ->placeholder('admin.Attractive but mysterious title')
                    ->help('admin.Specify a short descriptive title for this post.'),

                TextArea::make('post.description')
                    ->title('Description')
                    ->rows(3)
                    ->maxlength(200)
                    ->placeholder('admin.Brief description for preview'),

                Relation::make('post.author')
                    ->title('admin.Author')
                    ->fromModel(User::class, 'name'),

                Quill::make('post.body')
                    ->title('admin.Main text'),

            ])
        ];
    }

    /**
     * @param Post    $post
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Post $post, Request $request)
    {
        $post->fill($request->get('post'))->save();

        Alert::info('admin.You have successfully created an post.');

        return redirect()->route('platform.post.list');
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Post $post)
    {
        $post->delete();

        Alert::info('admin.You have successfully deleted the post.');

        return redirect()->route('platform.post.list');
    }
}