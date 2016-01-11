<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <head>
        <style>
            .timeline {
                list-style: none;
                padding: 20px 0 20px;
                position: relative;
            }
            .timeline:before {
                top: 0;
                bottom: 0;
                position: absolute;
                content:" ";
                width: 3px;
                background-color: #eeeeee;
                left: 50%;
                margin-left: -1.5px;
            }
            .timeline > li {
                margin-bottom: 20px;
                position: relative;
            }
            .timeline > li:before, .timeline > li:after {
                content:" ";
                display: table;
            }
            .timeline > li:after {
                clear: both;
            }
            .timeline > li:before, .timeline > li:after {
                content:" ";
                display: table;
            }
            .timeline > li:after {
                clear: both;
            }
            .timeline > li > .timeline-panel {
                width: 46%;
                float: left;
                border: 1px solid #d4d4d4;
                border-radius: 2px;
                padding: 20px;
                position: relative;
                -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
                box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            }
            .timeline > li > .timeline-panel:before {
                position: absolute;
                top: 26px;
                right: -15px;
                display: inline-block;
                border-top: 15px solid transparent;
                border-left: 15px solid #ccc;
                border-right: 0 solid #ccc;
                border-bottom: 15px solid transparent;
                content:" ";
            }
            .timeline > li > .timeline-panel:after {
                position: absolute;
                top: 27px;
                right: -14px;
                display: inline-block;
                border-top: 14px solid transparent;
                border-left: 14px solid #fff;
                border-right: 0 solid #fff;
                border-bottom: 14px solid transparent;
                content:" ";
            }
            .timeline > li > .timeline-badge {
                color: #fff;
                width: 50px;
                height: 50px;
                line-height: 50px;
                font-size: 1.4em;
                text-align: center;
                position: absolute;
                top: 16px;
                left: 50%;
                margin-left: -25px;
                background-color: #999999;
                z-index: 100;
                border-top-right-radius: 50%;
                border-top-left-radius: 50%;
                border-bottom-right-radius: 50%;
                border-bottom-left-radius: 50%;
            }
            .timeline > li.timeline-inverted > .timeline-panel {
                float: right;
            }
            .timeline > li.timeline-inverted > .timeline-panel:before {
                border-left-width: 0;
                border-right-width: 15px;
                left: -15px;
                right: auto;
            }
            .timeline > li.timeline-inverted > .timeline-panel:after {
                border-left-width: 0;
                border-right-width: 14px;
                left: -14px;
                right: auto;
            }
            .timeline-badge.primary {
                background-color: #2e6da4 !important;
            }
            .timeline-badge.success {
                background-color: #3f903f !important;
            }
            .timeline-badge.warning {
                background-color: #f0ad4e !important;
            }
            .timeline-badge.danger {
                background-color: #d9534f !important;
            }
            .timeline-badge.info {
                background-color: #5bc0de !important;
            }
            .timeline-title {
                margin-top: 0;
                color: inherit;
            }
            .timeline-body > p, .timeline-body > ul {
                margin-bottom: 0;
            }
            .timeline-body > p + p {
                margin-top: 5px;
            }
            @media (max-width: 767px) {
                ul.timeline:before {
                    left: 40px;
                }
                ul.timeline > li > .timeline-panel {
                    width: calc(100% - 90px);
                    width: -moz-calc(100% - 90px);
                    width: -webkit-calc(100% - 90px);
                }
                ul.timeline > li > .timeline-badge {
                    left: 15px;
                    margin-left: 0;
                    top: 16px;
                }
                ul.timeline > li > .timeline-panel {
                    float: right;
                }
                ul.timeline > li > .timeline-panel:before {
                    border-left-width: 0;
                    border-right-width: 15px;
                    left: -15px;
                    right: auto;
                }
                ul.timeline > li > .timeline-panel:after {
                    border-left-width: 0;
                    border-right-width: 14px;
                    left: -14px;
                    right: auto;
                }
            }
        </style>
        <div class="container">
            <div class="page-header">
                <h1 id="timeline">About</h1>
            </div>
            <div>
                <p><Strong>Sistem Informasi PT. Global Lestari Motorindo</Strong> merupakan sebuah sistem informasi untuk
                    melakukan integrasi data stok serta melakukan manajemen data sepeda motor Beijing.</p>
            </div>


            <div class="page-header">

                <h1 id="timeline">Timeline Project</h1>

            </div>
            <ul class="timeline">
                <li class="timeline-inverted">
                    <div class="timeline-badge success"><i class="glyphicon glyphicon-thumbs-up"></i>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">

                            <h4 class="timeline-title">Finish & Maintenance</h4>
                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> Coming Soon</small></p>

                        </div>
                        <div class="timeline-body">
                            <p>content</p>

                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge"><i class="glyphicon glyphicon-refresh"></i>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">

                            <h4 class="timeline-title">Database Migration</h4>

                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> January 2016 </small></p>
                        </div>
                        <div class="timeline-body">
                            <p>content</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-badge warning"><i class="glyphicon glyphicon-cloud-upload"></i>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">

                            <h4 class="timeline-title">Hosted</h4>

                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> January 2016 </small></p>

                        </div>
                        <div class="timeline-body">
                            <p>content</p>

                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge danger"><i class="glyphicon glyphicon-wrench"></i>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">

                            <h4 class="timeline-title">Build the System</h4>
                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> December 2015 </small></p>
                        </div>
                        <div class="timeline-body">
                            <p>content</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-badge primary"><i class="glyphicon glyphicon-pencil"></i>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">

                            <h4 class="timeline-title">System Design</h4>
                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> December 2015 </small></p>
                        </div>
                        <div class="timeline-body">
                            <p>content</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge info"><i class="glyphicon glyphicon-search"></i>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">

                            <h4 class="timeline-title">Analyze</h4>
                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> December 2015 </small></p>
                        </div>
                        <div class="timeline-body">
                            <p>content.</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-badge success"><i class="glyphicon glyphicon-send"></i>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">

                            <h4 class="timeline-title">KickStart Project!</h4>
                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> December 2015 </small></p>
                        </div>
                        <div class="timeline-body">
                            <p>content</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
</div>