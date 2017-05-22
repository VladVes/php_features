<?php

namespace app\controllers;
use app\models\ProductModel;

class ProductController extends Controller
{
	const DEFAULT_TEMPLATE = 'productDefault';
	const SAMPLE_TEMPLATE = 'productSample';
	const SHOW_ALL_TEMPLATE = 'productShowAll';

	

	public function actionIndex()
	{
		$this->render(self::DEFAULT_TEMPLATE, ['welcome' => 'Welcome to the products page.']);
	}

	public function actionShowOne()
	{	
		$id = $this->params[0];
		$product = $this->getOne($id);
		$this->render(self::SAMPLE_TEMPLATE, ['welcome' => 'Welcome dear customer!', 'sample' => $product]);
	}

	public function actionShowAll()
	{
		
		\app\services\D::vd($this->getAll());
		$products = $this->getAll();
		
		$this->render(self::SHOW_ALL_TEMPLATE, ['welcome' => 'Welcome dear customer!', 'sample' => $product]);

	}


	protected function getOne($id)
	{
		$model = \app\base\Application::call()->factory->call('ProductModel');
		return $model->fetchOneById($id);
	}

	protected function getAll()
	{
		$model = \app\base\Application::call()->factory->call('ProductModel');
		return $model->fetchAll();
	}
}


?>