<form action="/admin/profile/money/edit" method="POST">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

    <input type="hidden" value="<?php if($row->user_id > 0): ?><?php echo e($row->user_id); ?><?php else: ?><?php echo e(Auth::user()->user_id); ?><?php endif; ?>" name="user_id"/>
    <div class="form-group">
        <label>Текущий баланс</label>
        <input readonly value="<?php echo e($row->user_money); ?>" type="text" class="form-control" name="user_money" placeholder="Неизвестно">
    </div>
    <div class="form-group">
        <label>Снять баланс</label>
        <input min="0" max="<?php echo e($row->user_money); ?>" required value="<?php echo e($row->minus_money); ?>" type="text" class="form-control" name="minus_money" placeholder="Введите">
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
</form>