<?php
namespace app\index\model;

use think\Model;
use traits\model\SoftDelete;

class Grade extends Model
{
    //引用软删除方法集
    use SoftDelete;

    //设置当前默认日期时间显示格式
    protected $dateFormat='Y/m/d';

    protected $deleteTime='delete_time';

    protected $autoWriteTimestamp = true;

    protected $createTime='create_time';

    protected $updateTime='update_time';

    protected $insert=['status'=>1];

    public function teacher()
    {
        return $this->hasOne('Teacher');
    }

    public function student()
    {
        return $this->hasMany('student');
    }

}

