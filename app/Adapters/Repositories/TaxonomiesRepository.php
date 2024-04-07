<?php

namespace App\Adapters\Repositories;

use App\Domain\Adapters\Repositories\ITaxonomiesRepository;
use App\Domain\ValueObjects\CategoriesCollection;
use App\Domain\ValueObjects\Category;
use App\Domain\ValueObjects\CategoryId;
use App\Domain\ValueObjects\PostId;
use App\Domain\ValueObjects\PostItemTag;
use App\Domain\ValueObjects\SingleCategory;
use App\Domain\ValueObjects\SingleTag;
use App\Domain\ValueObjects\Tag;
use App\Domain\ValueObjects\TagId;
use App\Domain\ValueObjects\TagsCollection;
use Illuminate\Support\Facades\DB;

class TaxonomiesRepository implements ITaxonomiesRepository
{
    public function getCategories(): CategoriesCollection
    {
        $categories = DB::table('categories as c')
            ->select('c.id', 'c.title', 'c.slug', DB::raw('count(p.id) as count'))
            ->leftJoin('posts as p', 'c.id', '=', 'p.category_id')
            ->orderBy('c.title')
            ->groupBy('c.id')
            ->limit(500)
            ->get()
            ->map(fn($category) => Category::from(CategoryId::from($category->id), $category->title, $category->slug, $category->count));

        return new CategoriesCollection($categories);
    }

    public function getTags(): TagsCollection
    {
        $tags = DB::table('tags as t')
            ->select('t.id', 't.title', 't.slug', DB::raw('count(pt.post_id) as count'))
            ->leftJoin('post_tag as pt', 't.id', '=', 'pt.tag_id')
            ->orderBy('t.title')
            ->groupBy('t.id')
            ->limit(500)
            ->get()
            ->map(fn($tag) => Tag::from(TagId::from($tag->id), $tag->title, $tag->slug, $tag->count));

        return new TagsCollection($tags);
    }

    public function getPostTags(PostId $postId): TagsCollection
    {
        $tags = DB::table('post_tag as pt')
            ->select('t.id', 't.title', 't.slug')
            ->leftJoin('tags as t', 'pt.tag_id', '=', 't.id')
            ->where('pt.post_id', $postId->value)
            ->get()
            ->map(fn($tag) => PostItemTag::from(TagId::from($tag->id), $tag->title, $tag->slug));

        return new TagsCollection($tags);
    }

    public function getSingleCategory(string $slug): SingleCategory
    {
        $category = DB::table('categories as c')
            ->select('c.id', 'c.title', 'c.slug')
            ->where('c.slug', $slug)
            ->first();

        return SingleCategory::from(CategoryId::from($category->id), $category->title, $category->slug);
    }

    public function getSingleTag(string $slug): SingleTag
    {
        $tag = DB::table('tags as t')
            ->select('t.id', 't.title', 't.slug')
            ->where('t.slug', $slug)
            ->first();

        return SingleTag::from(TagId::from($tag->id), $tag->title, $tag->slug);
    }
}
