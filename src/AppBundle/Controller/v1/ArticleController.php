<?php
namespace AppBundle\Controller\v1;

use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Patch;
use FOS\RestBundle\Controller\Annotations\Get;

class ArticleController extends RESTParentController
{

    public function __construct()
    {
        parent::__construct('ArticleController', 'Article', 'ArticleType');
    }

    /**
     * @Get("/articles")
     */
	public function getArticlesAction()
	{
		return parent::getAll();
	}

	public function getArticleAction($id)
	{
		return parent::getOne($id);
	}

    /**
     * @Post("/admin/articles")
     */
	public function postArticlesAction(Request $request)
	{
        return parent::post($request);   
	}

    /**
     * @Patch("/admin/articles/{id}")
     */
    public function patchArticlesAction(Request $request, $id)
    {
        return parent::patch($request, $id);  
    }

    /**
     * @Delete("/admin/articles/{id}")
     */
    public function deleteArticlesAction($id)
    {
        return parent::delete($id);
    }

}