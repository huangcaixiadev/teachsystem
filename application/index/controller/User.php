<?php
namespace app\index\controller;
use think\Request;
use app\index\model\User as UserModel;
use app\index\controller\Base;
use think\Session;
class User extends Base
{
    public function login()
    {
        $this->alreadyLogin();//防止用户重复登录
        return $this->view->fetch();
    }

    //验证登录,使用validate(),参数为验证数据和验证规则,验证错误信息
    public function checkLogin(Request $request)
    {
        //初始化数据
        $status = 0; //当前状态
        $result = '';//提示信息
        $data = $request->param();//返回数据，打包成JSON格式返回前端


        //创建验证规则
        $rule = [
            'name|用户名' => 'require',//用户名必填
            'password|密码' => 'require',//密码必填
            'verify|验证码' => 'require|captcha',//验证码
        ];

        //自定义验证失败的提示信息
        $mag = [
            'name' => ['require' => '用户名不能为空，请检查'],
            'password' => ['require' => '密码不能为空，请检查'],
            'verify' => [
                'require' => '验证码不能为空，请检查',
                'captcha' => '验证码错误'
            ],
        ];
        //进行验证
        $result = $this->validate($data, $rule, $mag);

        //如果验证成功则执行
        if ($result === true) {
            //构建查询条件
            $map = [
                'name' => $data['name'],
                'password' => $data['password']
            ];

            //创建用户信息
            $user = UserModel::get($map);
            if ($user == null) {
                $result = '没有找到该用户';

            } else {
                $status = 1;
                $result = '验证通过，点击[确定]进入';
                //设置用户登陆信息用：session
                Session::set('user_id', $user->id);//用户ID
                Session::set('user_info', $user->getData());//获取用户所有信息
            }
        }

        return ['status' => $status, 'message' => $result];

    }

    public function logout()
    {
        //注销Session
        session::delete('user_id');
        session::delete('user_info');
        $this->success('注销登陆，正在返回', 'user/login');
    }

    //管理员列表
    public function adminList()
    {
        $this->view->assign('title', '管理员列表');
        $this->view->assign('keywords', 'PHP中文网教学系统');
        $this->view->assign('desc', '教学案例');

        $this->view->count = UserModel::count();

        //判断当前是不是admin用户
        //先通过session获取到用户登录名
        $userName = Session::get('user_info.name');
        if ($userName == 'admin') {
            $list = UserModel::all();//admin用户可以查看所有记录，数据要经过模型获取其处理
        } else {
            $list = UserModel::all(['name' => $userName]);
        }

        $this->view->assign('list', $list);
        //渲染管理员模板输出
        return $this->view->fetch('admin_list');
    }

    //管理员状态变更
    public function setStatus(Request $request)
    {
        $user_id = $request->param('id');
        $result = UserModel::get($user_id);
        if ($result->getData('status') == 1) {
            UserModel::update(['status' => 0], ['id' => $user_id]);
        } else {
            UserModel::update(['status' => 1], ['id' => $user_id]);
        }

    }

    //渲染编辑管理员界面
    public function adminEdit(Request $request)
    {
        $user_id = $request->param('id');
        $result = UserModel::get($user_id);//从前端获取到id值，获取的为对象
        $this->view->assign('title', '编辑管理员信息');
        $this->view->assign('keywords', 'php.cn');
        $this->view->assign('desc', 'PHP中文网开发实战');
        $this->view->assign('user_info',$result->getData());
        return $this->view->fetch('admin_edit');

    }

    //更新数据操作
    public function editUser(Request $request)
    {
        //获取表单返回的数据
       //$data = $request -> param();
        $param = $request -> param();


        //dump($param);die;
        //去掉表单中为空的数据,即没有修改的内容
        foreach ($param as $key => $value ){
            if (!empty($value)) {
                $data[$key] = $value;
            }
        }

        //dump($data);die;
        $condition = ['id'=>$data['id']] ;
        $result = UserModel::update($data, $condition);

        //如果是admin用户,更新当前session中用户信息user_info中的角色role,供页面调用
        if (Session::get('user_info.name') == 'admin') {
                Session::set('user_info.role', $data['role']);
        }


        if ($result==true) {
            return ['status'=>1, 'message'=>'更新成功'];
        } else {
            return ['status'=>0, 'message'=>'更新失败,请检查'];
        }
    }

    //删除操作
    public function deleteUser(Request $request)
    {
        $user_id = $request->param('id');
        UserModel::update(['is_delete' => 1], ['id' => $user_id]);
        UserModel::destroy($user_id);
    }

    //恢复删除操作
    public function unDelete()
    {
        UserModel::update(['delete_time'=>NULL], ['is_delete' => 1]);
    }

    //添加操作的界面
    public function adminAdd()
    {
        $this->view->assign('title', '添加管理员');
        $this->view->assign('keywords', 'php.cn');
        $this->view->assign('desc', 'PHP中文网开发实战');
        return $this->view->fetch('admin_add');
    }

    //检测用户名是否可用
    public function checkUserName(Request $request)
    {
        $userName=trim($request->param('name'));
        $status = 1;
        $message='用户名可用';
        if(UserModel::get(['name'=>$userName])){
            $status = 0;
            $message='用户名重复，请重新输入~~';
        }
        return ['status'=>$status,'message'=>$message];
    }
    //检测用户邮箱是否可用
    public function checkUserEmail(Request $request)
    {
        $userEmail=trim($request->param('email'));
        $status = 1;
        $message='邮箱可用';
        if(UserModel::get(['email'=>$userEmail])){
            //查询表中找到了该邮箱，修改返回值
            $status = 0;
            $message='邮箱重复，请重新输入~~';
        }
        return ['status'=>$status,'message'=>$message];
    }

    //添加操作
    public function addUser(Request $request)
    {
        $data =$request->param();
        $status=1;
        $message='添加成功';

        $rule=[
            'name|用户名'=>"require|min:3|max:10",
            'password|密码'=>"require|min:3|max:10",
            'email|邮箱'=>'require|email'
        ];

        $result=$this->validate($data,$rule);

        if($result===true){
            $user=UserModel::create($request->param());
            if($user===null){
                $status=0;
                $message='添加失败~~';
            }
        }
        return ['status'=>$status,'message'=>$message];
    }
}