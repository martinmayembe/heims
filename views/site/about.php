<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-shadow">
    
    <div class="card body">
        <ul>
            <li><a href="<?= Url::toRoute(['programme-expert/index']) ?>">Add Programme Experts</a></li>
            <li><a href="<?= Url::toRoute(['university/index']) ?>" >Add Universities</a></li>
            <li><a href="<?= Url::toRoute(['user/index']) ?>" >Add Users</a></li>
            <li><a href="<?= Url::toRoute(['role/index']) ?>" >Add Roles</a></li>
            <li><a href="<?= Url::toRoute(['status/index']) ?>" >Add Status</a></li>
             <li><a href="<?= Url::toRoute(['title/index']) ?>" >Add Title</a></li>
        </ul>
    </div>

  
</div>
