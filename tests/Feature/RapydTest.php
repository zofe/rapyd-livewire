<?php

namespace Zofe\Rapyd\Tests\Feature;

use Livewire\Livewire;
use Zofe\Rapyd\Demo\Http\Controllers\DemoController;
use Zofe\Rapyd\Demo\Models\DemoArticle;
use Zofe\Rapyd\Tests\TestCase;

class RapydTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        (new DemoController())->schema();
    }

    public function test_article_list()
    {
        $article = DemoArticle::find(1);
        
        Livewire::test('rapyd::demo-articles-table')
            ->set('search', substr($article->title, -10, 10))
            ->assertSee(substr($article->title, 0, 10));
    }
}
