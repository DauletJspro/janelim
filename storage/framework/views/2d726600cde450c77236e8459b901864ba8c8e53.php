<form action="/admin/profile/password/edit" method="POST">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

        <input type="hidden" value="<?php echo e($row->user_id); ?>" name="user_id"/>
        <div class="form-group">
            <label>Старый пароль</label>
            <input readonly value="<?php echo e($row->password_original); ?>" type="text" class="form-control" name="password_original" placeholder="Неизвестно">
        </div>
        <div class="form-group">
            <label>Новый пароль</label>
            <input min="5" required value="<?php echo e($row->password_new); ?>" type="text" class="form-control" name="password_new" placeholder="Введите">
        </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
</form>