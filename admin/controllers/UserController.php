<?php
/**
 * Description of UserController
 *
 * @author theoliu
 */
require_once 'Zend/Controller/Action.php';
require_once APPLICATION_PATH .  '/controllers/BaseController.php';

class UserController extends BaseController
{
    private $cmd;
    private $uid;
    private $db;
    private $exam;
    private $page;
    private $perpage = 20;
    private $permissions = array(
        'ask_compar' => '问答对比',
        'mtt_query' => '立知答案分类',
        'mtt_12k' => '训练集筛词',
        'ask_match' => '问答比赛query',
        'lizhi' => '立知短答案',
        'easy_translation' => '翻译评测(简单)',
        'complex_translation' => '翻译评测(复杂)',
        'admin' => '管理员',
        'taskadmin' => '任务管理员',
        'tester' => '评测员',
        'epiboly' => '外包标注人员',
        'student' => '学员',
        'flagadmin' => '标记位管理员',
        'flagpattern' => '标记位运营',
        'flaglabel' => '标记位标注',
        'mttlabel' => '综合标注人员',
        'contlabel' => '通用域标注',
        'effectFB' => '效果运营标注',
        'feedbackadmin' => '反馈标注管理员',
        'FeedBack' => '反馈标注人员',
        'webmaster' => 'Zhanzhang',
        'sbs_epiboly' => 'SBS前三标注',
        'sbs_vr' => 'SBS VR标注',
        'sbs_student' => 'SBS学员',
        'waplabel' => '无线质量标注',
        'wap_student' => '无线质量学员',
        'page_content' => '页面内容提取',
        'ask_label' => '问答评测',
        'ask_text' => '非事实类问答-text',
        'ask_url' => '非事实类问答-url',
        'operations' => '成都运营'
    );

    public function init() {
        //note 指定左侧菜单
        $this->view->assign("current", 'user');
        $this->view->assign("permissions", $this->permissions);
        $this->page = $this->page ? $this->page : intval($this->_request->getQuery("page"));
        Zend_Loader::loadClass('DB');
        $this->db = DB::init();
    }
    public function indexAction()
    {
        $this->cmd = $this->_request->getQuery("cmd");
        $this->uid = $this->_request->getQuery("uid") ? intval($this->_request->getQuery("uid")) : intval($this->_request->getpost('uid'));
        $this->view->assign("uid", $this->uid);
        $this->view->assign("cmd", $this->cmd);
        if(!$this->checkperm('admin') && $this->cmd != 'pw' && !in_array($this->user['username'], $this->specificadmin) && $this->_request->getpost('add') != 1) {
            $this->showmessage('权限不足，请联系管理员。', -1);
        }
        //判断用户解封功能权限
        if(in_array($this->user['username'], $this->superadmin)){
            $this->view->assign('showbutton', 1);
        }else{
            $this->view->assign('showbutton', 0);
        }
        if($this->cmd == '' || $this->cmd == 'list') {
            $this->member_list();
        } elseif($this->cmd == 'edit') {
            $this->member_edit();
        } elseif($this->cmd == 'del') {
            $this->member_del();
        } elseif($this->cmd == 'pw') {
            $this->member_pw();
        } elseif($this->cmd == 'editinfo') {
            $this->member_editinfo();
        } elseif($this->cmd == 'output'){
            $this->epiboly_output();
        } elseif($this->cmd == 'removeforbidden'){
            $this->removeforbidden();
        } elseif($this->cmd == 'ajax'){
            $this->ajaxphone();
        }
    }

    public function member_list() {
        if($this->_request->getpost('usersubmit')) {
            $username = trim($this->_request->getpost('newusername'));
            $password = $this->_request->getpost('newpassword');
            $permission = array_keys((array)$this->_request->getpost('permission'));
            $add_exam = intval($this->_request->getpost('add_exam'));
            $add_mttexam = intval($this->_request->getpost('add_mttexam'));
            $SogouID = trim($this->_request->getpost('SogouID'));
            $uid = $this->member->addMember($username, $password, $permission, $add_exam, $add_mttexam, $SogouID);
            if($uid === 'SogouID Error') {
                $this->showmessage('SogouID Existed!', '/user?cmd=list');
            }elseif($uid) {
                $this->showmessage('添加成功');
            } else {
                $this->showmessage('添加失败');
            }
        }
        $search_name = $this->_request->getpost('search_name') ? addslashes($this->_request->getpost('search_name')) : addslashes($this->_request->getQuery("search_name"));
        $search_perm = $this->_request->getpost('search_perm') ? addslashes($this->_request->getpost('search_perm')) : addslashes($this->_request->getQuery("search_perm"));
        $this->view->assign("search_name", $search_name);
        $this->view->assign("search_perm", $search_perm);
        $search_sql = $searchurl = '';
        if($search_perm) {
            $search_sql .= " and permission like '%$search_perm%'";
            $searchurl .= '&search_perm='.$search_perm;
        }
        if($search_name) {
            $search_sql .= ' and username LIKE \'%'.$search_name.'%\'';
            $searchurl .= '&search_name='.$search_name;
        }
        $start = $this->page > 1 ? ($this->page-1)*$this->perpage : 0;
        $memberlist = $this->member->dumpMember($this->perpage, $start, $search_sql);
        $sql = "SELECT COUNT(*) AS cnt FROM tb_member where 1 $search_sql;";
        $results = $this->db->query($sql);
        $rows = $results->fetchAll();
        $membernum = $rows[0]['cnt'];
        //$membernum = count($memberlist);
        $multipage = $this->multi($membernum, $this->perpage, $this->page, '/user?cmd='.$this->cmd.$searchurl);
        $this->view->assign("multipage", $multipage);
        $this->view->assign("memberlist", $memberlist);
        if($search_name && $membernum) {//取得最近三次考试记录
            Zend_Loader::loadClass('Exercise');
            $this->exam = new Exercise();
            $examlist = $this->exam->getExamList($search_name);
            $this->view->assign("examlist", $examlist);
        }
        //判断权限
        if(!in_array($this->user['username'], $this->specificadmin)){
            $this->view->assign('prem', 'noprem');
        }
        //用户列表
        $this->view->display('user/list.phtml');
    }

    public function member_edit() {
        //编辑用户
        $memberinfo = array();
        if($this->uid) {
            $memberinfo = $this->member->getMember($this->uid);
        }
        if(empty($memberinfo)) {
            $this->showmessage('用户没有找到。', '/user?cmd=list');
        }
        if($this->_request->getpost('usersubmit')) {
            $username = trim($this->_request->getpost('newusername'));
            $password = $this->_request->getpost('newpassword');
            $add_exam = intval($this->_request->getpost('add_exam'));
            $add_mttexam = intval($this->_request->getpost('add_mttexam'));
            $permission = array_keys($this->_request->getpost('permission'));
            $SogouID = trim($this->_request->getpost('SogouID'));
            $result = $this->member->editMember($this->uid, $username, $password, $permission, $add_exam, $add_mttexam, $SogouID);
            if($result === 'SogouID Error') {
                $this->showmessage('SogouID Existed!', '/user?cmd=list');
            }elseif($result === true) {
                $this->showmessage('编辑成功', '/user?cmd=list');
            } else {
                $this->showmessage('编辑失败', '/user?cmd=list');
            }
        }
        //取得最近三次考试记录
        Zend_Loader::loadClass('Exercise');
        $this->exam = new Exercise();
        $examlist = $this->exam->getExamList($memberinfo['username'], 3);
        $this->view->assign("examlist", $examlist);
        //获取用户真实信息
        if(!in_array($this->user['username'], $this->specificadmin)){
            $this->view->assign('noinfo', 2);
        } else {
            $userinfo = $this->member->getUserinfo($this->uid);
            if(!$userinfo){
                $this->view->assign('noinfo', 1);
            }else{
                $userinfo['graduation_date'] = date('Y-m', $userinfo['graduation_date']);
                $this->view->assign("info", $userinfo);
            }
            //省份
            $province = $this->db->fetchAll("select * from tb_city where p_id=0");
            $this->view->assign("province", $province);
        }

        $memberinfo['permission'] = explode("\t", $memberinfo['permission']);
        $this->view->assign("memberinfo", $memberinfo);
        $this->member_list();
    }

    public function member_del() {
        //删除用户
        $uid = $this->_request->getQuery('uid');
        if($uid == $this->user['uid']) {
            $this->showmessage('不能删除自己。', '/user?cmd=list');
        }
        $this->member->dropMember($uid);
        $this->showmessage('删除成功', '/user?cmd=list');
    }
    public function member_pw() {
        $this->view->assign("noleft", 1);
        $needchange = intval($this->_request->getQuery('needchange'));
        $this->view->assign("needchange", $needchange);
        $allowChangSogouID = 0;

        if('http://'.$_SERVER['HTTP_HOST'] == $this->localdomain) {
            $allowChangSogouID = 1;
            $this->view->assign("allowChangSogouID", $allowChangSogouID);
        }
        if($this->_request->getpost('usersubmit')) {
            $oldpw = $this->_request->getpost('oldpw');
            $newpw = $this->_request->getpost('newpw');
            $newpw2 = $this->_request->getpost('newpw2');
            $sogouid = $this->_request->getpost('sogouid');
            if($newpw) {
                if(strpos($newpw, $this->user['username']) !== false) {
                    $this->showmessage('密码中不能包含用户名。');
                }
                if(md5($oldpw) != $this->user['password']) {
                    $this->showmessage('原密码错误。');
                }
                if($newpw != $newpw2) {
                    $this->showmessage('两次密码不一致。');
                }
                if(strlen($newpw) < 6 || !preg_match("/\d+/", $newpw) || !preg_match("/[a-z|A-Z]+/", $newpw)) {
                    $this->showmessage('密码过于简单，请重新设置。');
                }
                $this->member->changepw($this->user['uid'], $newpw);
                $this->member->logout();
                $this->showmessage('密码修改成功，请重新登录。', '/');
            }
            if($allowChangSogouID && $sogouid && $sogouid != $this->user['SogouID']) {
                if($this->member->changeSogouID($this->user['uid'], $sogouid)) {
                    $this->showmessage('搜狗帐号变更成功。', '/');
                } else {
                    $this->showmessage('变更失败，帐号已绑定。', '/');
                }
            }
        }
        if($this->checkperm('student')){
            $this->view->assign("show", "no");
        }
        //显示用户真实信息
        $userinfo = $this->member->getUserinfo($this->user['uid']);
        if($userinfo['username']){
            $this->view->assign('info', $userinfo);
        }else{
            $this->view->assign('noinfo', 1);
            //省份
            $province = $this->db->fetchAll("select * from tb_city where p_id=0");
            $this->view->assign("province", $province);
        }
        $this->view->display('user/pw.phtml');
    }
    public function epiboly_output(){
        $search_perm = addslashes($this->_request->getQuery('where'));
        $where = 1;
        if($search_perm){
            $where .=" and permission like '%$search_perm%'";
        }
        $sql = "SELECT * FROM tb_member LEFT JOIN
        (select uid as uid2,username as true_name,graduation_date,email,id_card,bank_number,bank_address,phone_number from tb_member_info)
        as info on tb_member.uid=info.uid2 where $where";
        $result = $this->db->fetchAll($sql);
        $cvs = '';
        header('Content-Encoding: None');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=epiboly_'.date('ymdHi').'.csv');
        header('Pragma: no-cache');
        header('Expires: 0');
        echo mb_convert_encoding("id,用户名,权限,真实姓名,邮箱,毕业时间,身份证号,银行卡号,开户地,电话号码\n", "GBK");
        foreach($result as $k => $v) {
            $cvs .= $v['uid'].",";
            $cvs .= iconv("UTF-8","GBK",$v['username']).",";
            $cvs .= $v['permission'].",";
            $cvs .= iconv("UTF-8","GBK",$v['true_name']).",";
            $cvs .= $v['email'].",";
            $cvs .= date('Y-m', $v['graduation_date']).",";
            $cvs .= $v['id_card'].",";
            $cvs .= $v['bank_number'].",";
            $cvs .= iconv("UTF-8","GBK",$v['bank_address']).",";
            $cvs .= $v['phone_number']."\n";
        }
        echo $cvs;
        exit;
    }
    public function member_editinfo(){
        //修改用戶真实信息
        if($this->_request->getpost('infosubmit')) {

            $true_name = $this->_request->getpost('true_name');
            $phone_number = $this->_request->getpost('phone_number');
            $id_card = $this->_request->getpost('id_card');
            $bank_number = $this->_request->getpost('bank_number');
            $email = $this->_request->getpost('email');
            $graduation_date = strtotime($this->_request->getpost('graduation_date'));
            $address_id = $this->_request->getpost("bank_address");
            $address_city_id = $this->_request->getpost("bank_address_city") ? $this->_request->getpost("bank_address_city") : "";
            //var_dump($_REQUEST);die();
            $where = $bank_address = "";
            if(in_array(intval($address_id), array(1,2,3,4)) && !empty($address_id)) {
                $where = " where id=$address_id";
            }
            if(!in_array(intval($address_id), array(1,2,3,4)) && !empty($address_id)) {
                if(!empty($address_city_id)) {
                    $address_id = $address_id . "," . $address_city_id;
                    $where = " where id in($address_id)";
                } else {
                    $address_id = "";
                }
            }
            if($where) {
                $address = $this->db->fetchAll("select name from tb_city$where");
                foreach($address as $k => $v) {
                    $bank_address .= $v['name'];
                }
            }
            if ($this->_request->getpost('add') == 1) {
                $mas = '添加';
                $url = '/user?cmd=pw';
            } else {
                $mas = '修改';
                //$url = '/user?cmd=edit&uid='.$this->uid;
                $url = '/user';
                if($this->_request->getPost("address") && !$address_id) {
                    $address_id = 1;
                    $bank_address = addslashes($this->_request->getPost("address"));
                }
            }
            if(empty($true_name) || empty($phone_number) || empty($id_card) || empty($bank_number) || empty($graduation_date) || empty($address_id)){
                $this->showmessage($mas.'用户信息失败,姓名 毕业时间 身份证号 银行卡号 开户地 电话号不能为空', $url);
            }
            $result = $this->member->editinfo($this->uid, $true_name, $phone_number, $id_card, $bank_number, $graduation_date, $bank_address, $email);
            if($result){
                $this->showmessage($mas.'用户信息成功', $url);
            }
        }
    }

    public function changecityAction(){
        $str = "<option value=''>--城市--</option>";
        $p_id = $this->_request->getPOST('p_id');
        $city = $this->db->fetchAll("select * from tb_city where p_id=$p_id and municipal=0");
        if($city) {
            foreach($city as $k => $v) {
                $str .= "<option value='".$v['id']."'>".$v['name']."</option>";
            }
            exit($str);
        } else {
            exit("no result");
        }
    }

    public function removeforbidden(){
        $userid = intval($this->_request->get('uid'));
        if($userid){
            $now = time();
            $sql = "update tb_member_session set logintime=$now where uid='$userid'";
            $row = $this->db->query($sql);
            $this->showmessage('用户解封成功！', '/user');
        }else{
            $this->showmessage('用户ID未指定！', '/user');
        }
        //用户列表
        $this->view->display('user/list.phtml');
    }

    public function ajaxphone(){
        $sign = trim($this->_request->get('sign'));
        $phone_number = trim($this->_request->get('phone_number'));
        $id_card = trim($this->_request->get('id_card'));
        if(empty($this->uid)) {
            exit('false');
        }
        if($sign == 'phone_number' && $phone_number){
            $phone = $this->db->fetchRow("SELECT * FROM tb_member_info WHERE phone_number='".addslashes($phone_number)."' and uid !=".$this->uid);
            if($phone){
                echo 'true';
            }else{
                echo 'false';
            }

        }elseif($sign == 'id_card' && $id_card){
            $card = $this->db->fetchRow("SELECT * FROM tb_member_info WHERE id_card='".addslashes($id_card)."' and uid !=". $this->uid);
            if($card){
                echo 'true';
            }else{
                echo 'false';
            }
        } else {
            echo 'false';
        }
        exit();
    }
    public function delblackuserAction()
    {
        $name = addslashes($_POST['name']);
        $rs = $this->db->query("delete from tb_member_black where username = '". $name. "' limit 1")->rowCount();
        exit($rs ? $name. '已移除黑名单, 请重置密码' : '移除失败');
    }
}

