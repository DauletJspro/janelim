<?php use App\Models\Packet;use App\Models\UserPacket;use Illuminate\Support\Facades\Auth;$user_list = \App\Models\Users::where('recommend_user_id', $user_id)->take(500)->get(); ?>

<?php $__currentLoopData = $user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

    <?php

    $user = \App\Models\Users::leftJoin('user_status', 'user_status.user_status_id', '=', 'users.status_id')
        ->where('user_id', $item->user_id)
        ->first();

    $child_user_list = \App\Models\Users::where('recommend_user_id', $item->user_id)->take(20)->get();
    ?>

    <li class="parent">

        <?php
        $LOProfitId = UserPacket::where('is_active', 1)
            ->where('user_id', $item->user_id)
            ->whereIn('packet_id', [23, 24, 25, 26, 27])
            ->max('packet_id');

        $LOProfit = Packet::where('packet_id', $LOProfitId)->first();
        $LOProfit = $LOProfit ? $LOProfit->packet_price : 0;

        $gaps = 0;
        ?>

        <?php if(count($child_user_list) > 0): ?>
            <span onclick="getChildAjaxSecond(this,'<?php echo e($item->user_id); ?>','<?php echo e($level); ?>')">+</span>
            <div class="dval act user-name">
                <div class="object-image client-image">
                    <a <?php if(Auth::user()->role_id == 1): ?> href="/admin/profile/<?php echo e($user->user_id); ?>" target="_blank" <?php endif; ?>>
                        <img src="<?php echo e($user->avatar); ?>">
                    </a>
                </div>
                <div class="left-float client-name">
                    <?php echo e($user->login); ?> <?php if(Auth::user()->user_id == 1): ?>  (<?php echo e($user->name); ?> <?php echo e($user->last_name); ?>

                    ). <?php endif; ?> <?php echo $__env->make('admin.structure.user_packet_list_loop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div style="padding-top: 5px; color: rgb(58, 58, 58);">
                        <p style="color: #009551; margin: 0px">Квалификация: <?php echo e($user->user_status_name ?: 'Нету'); ?></p>                        
                        <span class="badge">ЛО:</span> <?php echo e($user->pv_balance ?? 0); ?> pv<br>
                        <span class="badge">ГО:</span> <?php echo e($user->gv_balance ?? 0); ?> gv<br>
                        <?php if($user->cv_balance): ?>
                            <span class="badge">CV:</span> <?php echo e($user->cv_balance); ?> cv<br>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="clear-float"></div>
            </div>
            <ul class="level_<?php echo e($level); ?> child-list">

            </ul>
        <?php else: ?>
            <div class="dval act user-name">
                <div class="object-image client-image">
                    <a <?php if(Auth::user()->role_id == 1): ?> href="/admin/profile/<?php echo e($user->user_id); ?>" target="_blank" <?php endif; ?>>
                        <img src="<?php echo e($user->avatar); ?>">
                    </a>
                </div>
                <div class="left-float client-name">
                    <?php echo e($user->login); ?>   <?php if(Auth::user()->user_id == 1): ?> (<?php echo e($user->name); ?> <?php echo e($user->last_name); ?>

                    ) <?php endif; ?> <?php echo $__env->make('admin.structure.user_packet_list_loop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div style="padding-top: 5px; color: rgb(58, 58, 58);">
                        <p style="color: #009551; margin: 0px">
                            Квалификация: <?php echo e($user->user_status_name ?: 'Нету'); ?></p>
                        <span class="badge">ЛО:</span> <?php echo e($user->pv_balance ?? 0); ?> pv<br>
                        <span class="badge">ГО:</span> <?php echo e($user->gv_balance ?? 0); ?> gv<br>
                        <?php if($user->cv_balance): ?>
                            <span class="badge">CV:</span> <?php echo e($user->cv_balance); ?> cv<br>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="clear-float"></div>
            </div>
        <?php endif; ?>
    </li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


