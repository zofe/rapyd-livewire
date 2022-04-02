<?php

namespace Zofe\Rapyd\Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Livewire\Livewire;
use Zofe\Rapyd\Tests\Models\Article;
use Zofe\Rapyd\Tests\TestCase;

class RapydTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_article_list()
    {
        $article = Article::find(1);

        Livewire::test('test-articles-table')
            ->set('search', substr($article->title, -10, 10))
            ->assertSee(substr($article->title, 0, 10));
    }

    public function test_article_view()
    {
        $article = Article::find(1);

        Livewire::test('test-articles-view', ['article' => $article])
            ->assertSee($article->title);
    }

    public function test_article_edit()
    {
        $article = Article::find(1);

        Livewire::test('test-articles-edit', ['article' => $article])
            ->set('article.title', 'modified title')
            ->call('update')
            ->assertRedirect('/test-demo/articles/view/1');

        $article->refresh();
        $this->assertEquals($article->title, 'modified title');
    }
}
