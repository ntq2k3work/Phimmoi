<?php

namespace App\Repositories;

use App\Models\User;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $__model;

    public function __construct($model)
    {
        $this->__model = $model;
    }

    /**
     * Lấy tất cả danh sách người dùng.
     *
     * @param array $columns Danh sách cột cần lấy.
     * @return \Illuminate\Database\Eloquent\Collection Danh sách người dùng.
     */
    public function getAll(array $columns = ['*'])
    {
        return $this->__model->get($columns);
    }

    /**
     * Lấy người dùng theo ID.
     *
     * @param int $id ID của người dùng.
     * @param array $columns Danh sách cột cần lấy.
     */
    public function findById($id, $columns = ['*'])
    {
        return $this->__model->findOrFail($id, $columns);
    }

    /**
     * Thêm mới người dùng.
     *
     * @param array $attributes Danh sách thuộc tính của người dùng.
     * @return \Illuminate\Database\Eloquent\Model Mới đã thêm.
     */
    public function create(array $attributes)
    {
        return $this->__model->create($attributes);
    }

    /**
     * Cập nhật người dùng.
     *
     * @param \Illuminate\Database\Eloquent\Model $model Người dùng cần cập nhật.
     * @param array $attributes Danh sách thuộc tính mới của người dùng.
     * @return bool Thành công cập nhật hay không.
     */
    public function update($id, array $attributes)
    {
        $model = $this->findById($id);
        return $model->update($attributes);
    }

    /**
     * Xóa người dùng.
     *
     * @param \Illuminate\Database\Eloquent\Model $model Người dùng cần xóa.
     * @return bool Thành công xóa hay không.
     */
    public function delete($id)
    {
        $model = $this->findById($id);
        return $model->delete();
    }

}
