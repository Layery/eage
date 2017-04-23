<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/26
 * Time: 17:56
 */

use yii\helpers\Html;
use yii\base\Widget;
use yii\helpers\Url;
use yii\grid\GridView;
use common\widgets\Alert;
use common\models\User;

$this->title = 'AuthManage';
$this->params['breadcrumbs'][] = $this->title;
$Bright = yii::$app->right;
$user = User::model();

?>

<div class="page-content">
    <div class="page-header">
       <div class="search">
           <table>
               <tr>
                   <td>角色名称</td>
                   <td>
                       <input type="text" class="col-xs-12">
                   </td>
                   <td>角色名称</td>
                   <td>
                       <input type="text" class="col-xs-12">
                   </td>
               </tr>
           </table>
       </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th class="center">
                        <label>
                            <input type="checkbox" class="ace" />
                            <span class="lbl"></span>
                        </label>
                    </th>
                    <th>Domain</th>
                    <th>Price</th>
                    <th class="hidden-480">Clicks</th>

                    <th>
                        <i class="icon-time bigger-110 hidden-480"></i>
                        Update
                    </th>
                    <th class="hidden-480">Status</th>

                    <th>
                        操作项
                    </th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td class="center">
                        <label>
                            <input type="checkbox" class="ace" />
                            <span class="lbl"></span>
                        </label>
                    </td>

                    <td>
                        <a href="#">ace.com</a>
                    </td>
                    <td>$45</td>
                    <td class="hidden-480">3,330</td>
                    <td>Feb 12</td>

                    <td class="hidden-480">
                        <span class="label label-sm label-warning">Expiring</span>
                    </td>

                    <td>
                        <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                            <button class="btn btn-xs btn-success">
                                <i class="icon-ok bigger-120"></i>
                            </button>

                            <button class="btn btn-xs btn-info">
                                <i class="icon-edit bigger-120"></i>
                            </button>

                            <button class="btn btn-xs btn-danger">
                                <i class="icon-trash bigger-120"></i>
                            </button>

                            <button class="btn btn-xs btn-warning">
                                <i class="icon-flag bigger-120"></i>
                            </button>
                        </div>

                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                            <div class="inline position-relative">
                                <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog icon-only bigger-110"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                    <li>
                                        <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>