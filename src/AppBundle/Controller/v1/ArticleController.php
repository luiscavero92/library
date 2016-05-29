<?php
namespace AppBundle\Controller\v1;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Article;

class ArticleController extends RESTParentController
{

    public function __construct()
    {
        parent::__construct('ArticleController', 'Article', 'ArticleType');
    }

	public function getArticlesAction()
	{
		return parent::getAll();
	}

	public function getArticleAction(Article $article = null)
	{
		return parent::getOne($article);
	}

	public function postArticlesAction(Request $request)
	{
        return parent::post($request);   
	}

    public function patchArticlesAction(Request $request, Article $article = null)
    {
        return parent::patch($request, $article);  
    }

    public function deleteArticlesAction(Article $article = null)
    {
        return parent::delete($article);
    }

}