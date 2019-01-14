<?php
use app\components\widgets\NavLeft;

// echo '
//     <li class="px-nav-box p-a-3 b-b-1" id="demo-px-nav-box">
//         <button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
//         <img src="assets/demo/avatars/1.jpg" alt="" class="pull-xs-left m-r-2 border-round" style="width: 54px; height: 54px;">
//         <div class="font-size-16"><span class="font-weight-light">Welcome, </span><strong>John</strong></div>
//         <div class="btn-group" style="margin-top: 4px;">
//           <a href="#" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-envelope"></i></a>
//           <a href="#" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-user"></i></a>
//           <a href="#" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-cog"></i></a>
//           <a href="#" class="btn btn-xs btn-danger btn-outline"><i class="fa fa-power-off"></i></a>
//         </div>
//       </li>
// ';
echo NavLeft::widget([
    'options' => ['class' => 'px-nav-content ps-theme-default'],
    'encodeLabels' => false,
    'items' => [
        [
            'label' => '<i class="px-nav-icon ion-home"></i><span class="px-nav-label">' . 'Dashboard' . '</span>',
            'url' => ['/site/index'],
        ],
        [
            'label' => '<i class="px-nav-icon ion-erlenmeyer-flask"></i><span class="px-nav-label">Menus</span>',
            'dropDownOptions' => ['class' => 'px-nav-dropdown-menu'],
            'items' => [
                ['label' => 'Level 1 - Dropdown A', 'url' => '#', 'options' => ['class' => 'px-nav-item']],
                '<div class="dropdown-divider"></div>',
                '<div class="dropdown-header">Dropdown Header</div>',
                ['label' => 'Level 1 - Dropdown B', 'url' => '#', 'options' => ['class' => 'px-nav-item']],
            ],
        ],
    ],
]);