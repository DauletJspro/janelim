<form action="/admin/profile/status/edit" method="POST">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

    <input type="hidden" value="<?php if($row->user_id > 0): ?><?php echo e($row->user_id); ?><?php else: ?><?php echo e(Auth::user()->user_id); ?><?php endif; ?>" name="user_id"/>

    <div class="form-group">
        <label>Статус</label>
        <select name="status_id" class="form-control" data-live-search="true">
            <option value="0" selected="selected"></option>
            <?php $__currentLoopData = $row->statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <option <?php if($row->status_id == $item->user_status_id): ?> <?php echo e('selected'); ?> <?php endif; ?> value="<?php echo e($item->user_status_id); ?>"><?php echo e($item['user_status_name']); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        </select>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
</form>