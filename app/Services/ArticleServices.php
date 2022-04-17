<?php


namespace App\Services;


use App\Models\Article;
use App\Models\ImageArticle;

class ArticleServices
{
    public function handle($request)
    {
        $article = $this->createArticle($request);

        if ($article) {
            $newImage = $request->image;

            if ($newImage) {
               $this->addImage($article, $request);
            }
        }

        return true;
    }

    private function createArticle($request)
    {
        $article = new Article();

        $article->user_id = \Auth::user()->id;
        $article->title = $request->title;
        $article->little_description = $request->little_description;
        $article->description = $request->description;
        $article->category_id = $request->category_id;

        $article->save();

        if (isset($article->id))
            return $article;

        return null;
    }

    private function addImage($article, $request)
    {
        $downloadImage = new DownloadImageServices();
        $image = new ImageArticle();

        $image->article_id = $article->id;
        $image->image = $downloadImage->handle($request->image);

        return $image->save();
    }
}
