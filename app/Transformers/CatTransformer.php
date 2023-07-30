<?php


namespace App\Transformers;


use App\Models\Category;
use League\Fractal\TransformerAbstract;

class CatTransformer extends TransformerAbstract
{

    public function transform(Category $category)
    {
        if(is_null($category)) return null;

        return [
            "name" => $category->name,
            "slug" =>$category->slug,
            "server_id" => $category->server_id,
        ];
    }
}
