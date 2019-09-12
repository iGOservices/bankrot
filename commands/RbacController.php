<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use app\rbac\UserGroupRule;

class RbacController extends Controller
{
    public function actionInit()
    {
        $authManager = \Yii::$app->authManager;
        $authManager->removeAll(); //удаляем старые данные
        //return false;

        //Список наших ролей
        $user  = $authManager->createRole('user');
        $admin  = $authManager->createRole('admin');

        //Создаем разрешения для каждого экшена
        $userAccess = $authManager->createPermission('userAccess');
        $userAccess->description = 'User permissions';
        $authManager->add($userAccess);
        $adminAccess = $authManager->createPermission('adminAccess');
        $adminAccess->description = 'All admins permissions';
        $authManager->add($adminAccess);

        //Добавляем правила к пользователям (Например возможность редактирования только своих записей)
        $userGroupRule = new UserGroupRule();
        $authManager->add($userGroupRule);

        // Add rule "UserGroupRule" in roles
        $user->ruleName  = $userGroupRule->name;
        $admin->ruleName  = $userGroupRule->name;

        // Добавляем роли в Yii::$app->authManager
        $authManager->add($user);
        $authManager->add($admin);

        // Добавляем разрешения по ролям в Yii::$app->authManager

        // User
//        $authManager->addChild($user, $task_create);
        $authManager->addChild($user, $userAccess);

        $authManager->addChild($admin, $adminAccess);
        $authManager->addChild($admin, $user);
    }
}