<?php

declare(strict_types=1);

namespace App\GraphQL\Queries\Category;

use App\Models\Category;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class CategoriesType extends Query
{
    protected $attributes = [
        'name' => 'categories',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Category'));
    }

    public function args(): array
    {
        return [];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        /** @var SelectFields $fields */
        // $fields = $getSelectFields();
        // $select = $fields->getSelect();
        // $with = $fields->getRelations();

        // return [
        //     'The category/CategoriesType works',
        // ];
        return Category::all();
    }
}
