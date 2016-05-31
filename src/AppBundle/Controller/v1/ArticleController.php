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

	public function getArticleAction($id)
	{
		return parent::getOne($id);
	}

	public function postArticlesAction(Request $request)
	{
        return parent::post($request);   
	}

    public function patchArticlesAction(Request $request, $id)
    {
        return parent::patch($request, $id);  
    }

    public function deleteArticlesAction($id)
    {
        return parent::delete($id);
    }

}