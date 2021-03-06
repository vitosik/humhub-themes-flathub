<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>


<?php if ($mode == \humhub\modules\comment\widgets\CommentLink::MODE_POPUP): ?>
    <a href="<?php echo Url::to(['/comment/comment/show', 'contentModel' => $objectModel, 'contentId' => $objectId, 'mode' => 'popup']); ?>"
       class=""
       title="" data-target="#globalModal"
       data-original-title="Comments">Comments - <?php echo $this->context->getCommentsCount(); ?></a>
<?php else: ?>
	<div class="pull-right">
    <?php
    if (Yii::$app->user->isGuest) {
        echo Html::a(Yii::t('CommentModule.widgets_views_link', "<i class='fa fa-comments-o'></i>"), Yii::$app->user->loginUrl, array('data-target' => '#globalModal'));
    } else {
        echo Html::a(Yii::t('CommentModule.widgets_views_link', "<i class='fa fa-comments-o'></i>"), "#", array('onClick' => "$('#comment_" . $id . "').show();$('#newCommentForm_" . $id . "_contenteditable').focus();return false;"));
    }
    ?>
	</div>
<?php endif; ?>