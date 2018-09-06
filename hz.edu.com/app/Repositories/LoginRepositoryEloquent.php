<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LoginRepository;
use App\Models\Hz_Login;

/**
 * Class AdminUserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class LoginRepositoryEloquent extends BaseRepository implements LoginRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Hz_Login::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Store user
     * @param array $payload
     * @return bool
     */
    public function store($payload = [])
    {
        $id = $this->model->insertGetId([
            'name' => $payload['name'],
            'email' => $payload['email'],
            'hosp_id' => $payload['hosp_id'],
            'login_id' => $payload['login_id'],
            'password' => bcrypt($payload['password']),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'status' => 1
        ]);

        if (!$id) {
            return false;
        }

        if(!isset($payload['roles'])){
            $payload['roles'][]=env('RoleID',15);
        }
        if ($id && ($roles = array_get($payload, 'roles'))) {
            $this->attachRoles($id, $roles);
        }
        return true;
    }

    /**
     * update admin user
     * @param array $attributes
     * @param $id
     * @return array
     */
    public function update_userinfo(array $attributes, $id)
    {
        $isAble = $this->model->where('id', '<>', $id)->where('login_id', $attributes['login_id'])->count();
        if ($isAble) {
            return [
                'status' => false,
                'msg' => 'loginid已被使用'
            ];
        }

        $data = [];
        if ($attributes['password']) {
            $data['password'] = bcrypt($attributes['password']);
        }
        $data['hosp_id'] = $attributes['hosp_id'];
        $data['name'] = $attributes['name'];
        $data['email'] = $attributes['email'];
        $data['login_id'] = $attributes['login_id'];
        $data['status'] = $attributes['status'];
        $result = parent::update($data, $id);

        if (!$result) {
            return [
                'status' => false,
                'msg' => '用户更新失败'
            ];
        }
       //$this->model->find($id)->roles()->detach();


//        if (isset($attributes['roles'])) {
//            $this->attachRoles($id, $attributes['roles']);
//        }
        return ['status' => true];
    }

    /**
     * delete admin user
     * @param $id
     * @return bool|int
     */
    public function delete($id)
    {
        $user = $this->model->find($id);
        if (!$user) {
            return false;
        }
        $user->roles()->detach();
        return parent::delete($id);
    }

    /**
     * Attach user roles by user id
     * @param $userId
     * @param $roles
     */
    public function attachRoles($userId, $roles)
    {
        $user = $this->model->find($userId);
        $user->attachRoles($roles);
    }
}
