<?php

class LoginController extends Controller
{
	public $defaultAction = 'login';

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
	 $service = Yii::app()->request->getQuery('service');
    if (isset($service)) {
        $authIdentity = Yii::app()->eauth->getIdentity($service);
        $authIdentity->redirectUrl = Yii::app()->user->returnUrl;
        $authIdentity->cancelUrl = $this->createAbsoluteUrl('site/login');
        
        if ($authIdentity->authenticate()) {
            $identity = new ServiceUserIdentity($authIdentity);
            
            // Успешный вход
            if ($identity->authenticate()) {
			//!!!
                Yii::app()->user->login($identity);
                
                // Специальный редирект с закрытием popup окна
                $authIdentity->redirect();
            }
            else {
                // Закрываем popup окно и перенаправляем на cancelUrl
                $authIdentity->cancel();
            }
        }
        
        // Что-то пошло не так, перенаправляем на страницу входа
        $this->redirect(array('site/login'));
    }
	
		if (Yii::app()->user->isGuest) {
			$model=new UserLogin;
			// collect user input data
			if(isset($_POST['UserLogin']))
			{
				$model->attributes=$_POST['UserLogin'];
				// validate user input and redirect to previous page if valid
				if($model->validate()) {
					$this->lastViset();
					if (strpos(Yii::app()->user->returnUrl,'/index.php')!==false)
						$this->redirect(Yii::app()->controller->module->returnUrl);
					else
						$this->redirect(Yii::app()->user->returnUrl);
				}
			}
			// display the login form
			$this->render('/user/login',array('model'=>$model));
		} else
			$this->redirect(Yii::app()->controller->module->returnUrl);
	}
	
	private function lastViset() {
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit = time();
		$lastVisit->save();
	}

}