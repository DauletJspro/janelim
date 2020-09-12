<?php $packet_list = \App\Models\UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
    ->where('user_id', $user->user_id)
    ->where('is_active', 1)
    ->orderBy('packet.packet_id', 'asc')
    ->get() ?>

<?php $__currentLoopData = $packet_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <?php if($item->packet_id > 0): ?>
        <span title="<?php echo e($item['packet_name_ru']); ?>"
              style="float:none; background-color: #<?php echo e($item['packet_css_color']); ?>"><?php echo e($item['packet_name_ru']); ?></span>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>