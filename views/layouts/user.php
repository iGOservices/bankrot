<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\Message;
use app\models\User;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);

$user = User::findOne(Yii::$app->user->id);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="gray">
<?php $this->beginBody() ?>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fullwidth dashboard-header not-sticky">

	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="#"><img src="/images/logo_bankrot.jpeg" alt=""></a>
				</div>

				<!-- Main Navigation -->
<!--				<nav id="navigation">-->
<!--					<ul id="responsive">-->
<!---->
<!--						<li><a href="#">Home</a>-->
<!--							<ul class="dropdown-nav">-->
<!--								<li><a href="index.html">Home 1</a></li>-->
<!--								<li><a href="index-2.html">Home 2</a></li>-->
<!--								<li><a href="index-3.html">Home 3</a></li>-->
<!--							</ul>-->
<!--						</li>-->
<!---->
<!--						<li><a href="#">Find Work</a>-->
<!--							<ul class="dropdown-nav">-->
<!--								<li><a href="#">Browse Jobs</a>-->
<!--									<ul class="dropdown-nav">-->
<!--										<li><a href="jobs-list-layout-full-page-map.html">Full Page List + Map</a></li>-->
<!--										<li><a href="jobs-grid-layout-full-page-map.html">Full Page Grid + Map</a></li>-->
<!--										<li><a href="jobs-grid-layout-full-page.html">Full Page Grid</a></li>-->
<!--										<li><a href="jobs-list-layout-1.html">List Layout 1</a></li>-->
<!--										<li><a href="jobs-list-layout-2.html">List Layout 2</a></li>-->
<!--										<li><a href="jobs-grid-layout.html">Grid Layout</a></li>-->
<!--									</ul>-->
<!--								</li>-->
<!--								<li><a href="#">Browse Tasks</a>-->
<!--									<ul class="dropdown-nav">-->
<!--										<li><a href="tasks-list-layout-1.html">List Layout 1</a></li>-->
<!--										<li><a href="tasks-list-layout-2.html">List Layout 2</a></li>-->
<!--										<li><a href="tasks-grid-layout.html">Grid Layout</a></li>-->
<!--										<li><a href="tasks-grid-layout-full-page.html">Full Page Grid</a></li>-->
<!--									</ul>-->
<!--								</li>-->
<!--								<li><a href="browse-companies.html">Browse Companies</a></li>-->
<!--								<li><a href="single-job-page.html">Job Page</a></li>-->
<!--								<li><a href="single-task-page.html">Task Page</a></li>-->
<!--								<li><a href="single-company-profile.html">Company Profile</a></li>-->
<!--							</ul>-->
<!--						</li>-->
<!---->
<!--						<li><a href="#">For Employers</a>-->
<!--							<ul class="dropdown-nav">-->
<!--								<li><a href="#">Find a Freelancer</a>-->
<!--									<ul class="dropdown-nav">-->
<!--										<li><a href="freelancers-grid-layout-full-page.html">Full Page Grid</a></li>-->
<!--										<li><a href="freelancers-grid-layout.html">Grid Layout</a></li>-->
<!--										<li><a href="freelancers-list-layout-1.html">List Layout 1</a></li>-->
<!--										<li><a href="freelancers-list-layout-2.html">List Layout 2</a></li>-->
<!--									</ul>-->
<!--								</li>-->
<!--								<li><a href="single-freelancer-profile.html">Freelancer Profile</a></li>-->
<!--								<li><a href="dashboard-post-a-job.html">Post a Job</a></li>-->
<!--								<li><a href="dashboard-post-a-task.html">Post a Task</a></li>-->
<!--							</ul>-->
<!--						</li>-->
<!---->
<!--						<li><a href="#" class="current">Dashboard</a>-->
<!--							<ul class="dropdown-nav">-->
<!--								<li><a href="dashboard.html">Dashboard</a></li>-->
<!--								<li><a href="dashboard-messages.html">Messages</a></li>-->
<!--								<li><a href="dashboard-bookmarks.html">Bookmarks</a></li>-->
<!--								<li><a href="dashboard-reviews.html">Reviews</a></li>-->
<!--								<li><a href="dashboard-manage-jobs.html">Jobs</a>-->
<!--									<ul class="dropdown-nav">-->
<!--										<li><a href="dashboard-manage-jobs.html">Manage Jobs</a></li>-->
<!--										<li><a href="dashboard-manage-candidates.html">Manage Candidates</a></li>-->
<!--										<li><a href="dashboard-post-a-job.html">Post a Job</a></li>-->
<!--									</ul>-->
<!--								</li>-->
<!--								<li><a href="dashboard-manage-tasks.html">Tasks</a>-->
<!--									<ul class="dropdown-nav">-->
<!--										<li><a href="dashboard-manage-tasks.html">Manage Tasks</a></li>-->
<!--										<li><a href="dashboard-manage-bidders.html">Manage Bidders</a></li>-->
<!--										<li><a href="dashboard-my-active-bids.html">My Active Bids</a></li>-->
<!--										<li><a href="dashboard-post-a-task.html">Post a Task</a></li>-->
<!--									</ul>-->
<!--								</li>-->
<!--								<li><a href="--><?//= Url::toRoute(['user/update', 'id' => Yii::$app->user->id])?><!--">Settings</a></li>-->
<!--							</ul>-->
<!--						</li>-->
<!---->
<!--						<li><a href="#">Pages</a>-->
<!--							<ul class="dropdown-nav">-->
<!--								<li><a href="pages-blog.html">Blog</a></li>-->
<!--								<li><a href="pages-pricing-plans.html">Pricing Plans</a></li>-->
<!--								<li><a href="pages-checkout-page.html">Checkout Page</a></li>-->
<!--								<li><a href="pages-invoice-template.html">Invoice Template</a></li>-->
<!--								<li><a href="pages-user-interface-elements.html">User Interface Elements</a></li>-->
<!--								<li><a href="pages-icons-cheatsheet.html">Icons Cheatsheet</a></li>-->
<!--								<li><a href="pages-login.html">Login & Register</a></li>-->
<!--								<li><a href="pages-404.html">404 Page</a></li>-->
<!--								<li><a href="pages-contact.html">Contact</a></li>-->
<!--							</ul>-->
<!--						</li>-->
<!---->
<!--					</ul>-->
<!--				</nav>-->
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">


<!--				<div class="header-widget hide-on-mobile">-->
<!--					-->
<!--				-->
<!--					<div class="header-notifications">-->
<!---->
<!--					-->
<!--						<div class="header-notifications-trigger">-->
<!--							<a href="#"><i class="icon-feather-bell"></i><span>4</span></a>-->
<!--						</div>-->
<!---->
<!--						-->
<!--						<div class="header-notifications-dropdown">-->
<!---->
<!--							<div class="header-notifications-headline">-->
<!--								<h5>Notifications</h5>-->
<!--								<button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">-->
<!--									<i class="icon-feather-check-square"></i>-->
<!--								</button>-->
<!--							</div>-->
<!---->
<!--							<div class="header-notifications-content">-->
<!--								<div class="header-notifications-scroll" data-simplebar>-->
<!--									<ul>-->
<!--										 Notification -->
<!--										<li class="notifications-not-read">-->
<!--											<a href="dashboard-manage-candidates.html">-->
<!--												<span class="notification-icon"><i class="icon-material-outline-group"></i></span>-->
<!--												<span class="notification-text">-->
<!--													<strong>Michael Shannah</strong> applied for a job <span class="color">Full Stack Software Engineer</span>-->
<!--												</span>-->
<!--											</a>-->
<!--										</li>-->
<!---->
<!--										<li>-->
<!--											<a href="dashboard-manage-bidders.html">-->
<!--												<span class="notification-icon"><i class=" icon-material-outline-gavel"></i></span>-->
<!--												<span class="notification-text">-->
<!--													<strong>Gilbert Allanis</strong> placed a bid on your <span class="color">iOS App Development</span> project-->
<!--												</span>-->
<!--											</a>-->
<!--										</li>-->
<!---->
<!--										<li>-->
<!--											<a href="dashboard-manage-jobs.html">-->
<!--												<span class="notification-icon"><i class="icon-material-outline-autorenew"></i></span>-->
<!--												<span class="notification-text">-->
<!--													Your job listing <span class="color">Full Stack PHP Developer</span> is expiring.-->
<!--												</span>-->
<!--											</a>-->
<!--										</li>-->
<!---->
<!--									-->
<!--										<li>-->
<!--											<a href="dashboard-manage-candidates.html">-->
<!--												<span class="notification-icon"><i class="icon-material-outline-group"></i></span>-->
<!--												<span class="notification-text">-->
<!--													<strong>Sindy Forrest</strong> applied for a job <span class="color">Full Stack Software Engineer</span>-->
<!--												</span>-->
<!--											</a>-->
<!--										</li>-->
<!--									</ul>-->
<!--								</div>-->
<!--							</div>-->
<!---->
<!--						</div>-->
<!---->
<!--					</div>-->
<!--					-->
<!--					-->
<!--					<div class="header-notifications">-->
<!--						<div class="header-notifications-trigger">-->
<!--							<a href="#"><i class="icon-feather-mail"></i><span>3</span></a>-->
<!--						</div>-->
<!---->
<!--					-->
<!--						<div class="header-notifications-dropdown">-->
<!---->
<!--							<div class="header-notifications-headline">-->
<!--								<h5>Messages</h5>-->
<!--								<button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">-->
<!--									<i class="icon-feather-check-square"></i>-->
<!--								</button>-->
<!--							</div>-->
<!---->
<!--							<div class="header-notifications-content">-->
<!--								<div class="header-notifications-scroll" data-simplebar>-->
<!--									<ul>-->
<!--										-->
<!--										<li class="notifications-not-read">-->
<!--											<a href="dashboard-messages.html">-->
<!--												<span class="notification-avatar status-online"><img src="--><?//=Yii::getAlias('@web')?><!--/img/main_profile.jpg" alt="profile"></span>-->
<!--												<div class="notification-text">-->
<!--													<strong>David Peterson</strong>-->
<!--													<p class="notification-msg-text">Thanks for reaching out. I'm quite busy right now on many...</p>-->
<!--													<span class="color">4 hours ago</span>-->
<!--												</div>-->
<!--											</a>-->
<!--										</li>-->
<!---->
<!--										<li class="notifications-not-read">-->
<!--											<a href="dashboard-messages.html">-->
<!--												<span class="notification-avatar status-offline"><img src="--><?//=Yii::getAlias('@web')?><!--img/main_profile.jpg" alt=""></span>-->
<!--												<div class="notification-text">-->
<!--													<strong>Sindy Forest</strong>-->
<!--													<p class="notification-msg-text">Hi Tom! Hate to break it to you, but I'm actually on vacation until...</p>-->
<!--													<span class="color">Yesterday</span>-->
<!--												</div>-->
<!--											</a>-->
<!--										</li>-->
<!---->
<!--										-->
<!--										<li class="notifications-not-read">-->
<!--											<a href="dashboard-messages.html">-->
<!--												<span class="notification-avatar status-online"><img src="img/user-avatar-placeholder.png" alt=""></span>-->
<!--												<div class="notification-text">-->
<!--													<strong>Marcin Kowalski</strong>-->
<!--													<p class="notification-msg-text">I received payment. Thanks for cooperation!</p>-->
<!--													<span class="color">Yesterday</span>-->
<!--												</div>-->
<!--											</a>-->
<!--										</li>-->
<!--									</ul>-->
<!--								</div>-->
<!--							</div>-->
<!---->
<!--							<a href="dashboard-messages.html" class="header-notifications-button ripple-effect button-sliding-icon">View All Messages<i class="icon-material-outline-arrow-right-alt"></i></a>-->
<!--						</div>-->
<!--					</div>-->
<!---->
<!--				</div>-->
				<!--  User Notifications / End -->

				<!-- User Menu -->
				<div class="header-widget">

					<!-- Messages -->
					<div class="header-notifications user-menu">
						<div class="header-notifications-trigger">
							<a href="#"><div class="user-avatar status-online"><img src="/images/user_img.png" alt=""></div></a>
						</div>

						<!-- Dropdown -->
						<div class="header-notifications-dropdown">

							<!-- User Status -->
							<div class="user-status">

								<!-- User Name / Avatar -->
								<div class="user-details">
									<div class="user-avatar status-online"><img src="/images/user_img.png" alt=""></div>
									<div class="user-name">
                                        <?=$user->username?>
<!--										<span>Freelancer</span>-->
									</div>
								</div>
								
								<!-- User Status Switcher -->
<!--								<div class="status-switch" id="snackbar-user-status">-->
<!--									<label class="user-online current-status">Online</label>-->
<!--									<label class="user-invisible">Invisible</label>-->
<!--
									<span class="status-indicator" aria-hidden="true"></span>-->
<!--								</div>	-->
						</div>
						
						<ul class="user-menu-small-nav">
<!--							<li><a href="dashboard.html"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>-->
							<li><a href="<?= Url::toRoute(['user/update-user', 'id' => Yii::$app->user->id])?>"><i class="icon-material-outline-settings"></i> Настройки профиля</a></li>
							<?='<li><a>'
                            . Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                '<i class="icon-material-outline-power-settings-new"></i> Выйти',
                                ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</a></li>';?>
                        </ul>

						</div>
					</div>

				</div>
				<!-- User Menu / End -->

				<!-- Mobile Navigation Button -->
<!--				<span class="mmenu-trigger">-->
<!--					<button class="hamburger hamburger--collapse" type="button">-->
<!--						<span class="hamburger-box">-->
<!--							<span class="hamburger-inner"></span>-->
<!--						</span>-->
<!--					</button>-->
<!--				</span>-->

			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard Container -->
<div class="dashboard-container">

	<!-- Dashboard Sidebar
	================================================== -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title">Меню</span>
				</a>
				
				<!-- Navigation -->
				<div class="dashboard-nav">
					<div class="dashboard-nav-inner">

						<ul data-submenu-title="Основная информация">
							<li><a href="/main/index"><i class="icon-material-outline-dashboard"></i>Заполнение данных</a></li>
                            <li><a href="/main/tickets"><i class="icon-material-outline-star-border"></i>Список моих услуг</a></li>
                            <?$message = Message::find()->where(['chat_id' => Yii::$app->user->id])->andWhere(['<>','user_id',Yii::$app->user->id])->andWhere(['see' => 0])->count();?>
							<li><a href="/message/chat?type=user" ><i class="icon-material-outline-question-answer"></i> Чат поддержки <?=$message == 0 ? "" : "<span class=\"nav-tag\">".$message."</span>"?></a></li>
                            <li><a href="/main/send-mail" ><i class="icon-material-baseline-mail-outline"></i>Оставить заявку</a></li>

<!--							<li><a href="dashboard-reviews.html"><i class="icon-material-outline-rate-review"></i> Reviews</a></li>-->
						</ul>
						
<!--						<ul data-submenu-title="Organize and Manage">-->
<!--							<li><a href="#"><i class="icon-material-outline-business-center"></i> Jobs</a>-->
<!--								<ul>-->
<!--									<li><a href="dashboard-manage-jobs.html">Manage Jobs <span class="nav-tag">3</span></a></li>-->
<!--									<li><a href="dashboard-manage-candidates.html">Manage Candidates</a></li>-->
<!--									<li><a href="dashboard-post-a-job.html">Post a Job</a></li>-->
<!--								</ul>	-->
<!--							</li>-->
<!--							<li><a href="#"><i class="icon-material-outline-assignment"></i> Tasks</a>-->
<!--								<ul>-->
<!--									<li><a href="dashboard-manage-tasks.html">Manage Tasks <span class="nav-tag">2</span></a></li>-->
<!--									<li><a href="dashboard-manage-bidders.html">Manage Bidders</a></li>-->
<!--									<li><a href="dashboard-my-active-bids.html">My Active Bids <span class="nav-tag">4</span></a></li>-->
<!--									<li><a href="dashboard-post-a-task.html">Post a Task</a></li>-->
<!--								</ul>	-->
<!--							</li>-->
<!--						</ul>-->

<!--						<ul data-submenu-title="Настройки">-->
<!--							<li class="active"><a href="--><?//= Url::toRoute(['user/update', 'id' => Yii::$app->user->id])?><!--"><i class="icon-material-outline-settings"></i> Настройки</a></li>-->
<!--							<li><a href="index-logged-out.html"><i class="icon-material-outline-power-settings-new"></i> Выйти</a></li>-->
<!--						</ul>-->
						
					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        <!-- Footer -->
<!--        <div class="dashboard-footer-spacer"></div>-->
<!--        <div class="small-footer margin-top-15">-->
<!--            <div class="small-footer-copyrights" style="margin-left: 40px">-->
<!--                © 2021 <strong>Bankrot</strong>. Все права соблюдены.-->
<!--            </div>-->
<!---->
<!--            <div class="clearfix"></div>-->
<!--        </div>-->
        <!-- Footer / End -->
	</div>
	<!-- Dashboard Content / End -->


</div>
<!-- Dashboard Container / End -->

</div>



<!-- Edit Review Popup
================================================== -->
<div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab1">
				
				
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="change-review-form">Save Changes <i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

		</div>
	</div>
</div>
<!-- Edit Review Popup / End -->


<!-- Wrapper / End -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>