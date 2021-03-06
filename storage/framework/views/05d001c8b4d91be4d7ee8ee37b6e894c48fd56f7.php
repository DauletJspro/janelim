<div class="box-body">
    <table id="packet_datatable" class="table table-bordered table-striped">
        <thead>
        <tr style="border: 1px">
            <th style="width: 30px">№</th>
            <th></th>
            <th>Название</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Удалить</th>
        </tr>
        </thead>

        <tbody>

        <?php $sum = 0; ?>

        <?php $__currentLoopData = $row->basket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

            <tr>
                <td> <?php echo e($key + 1); ?></td>
                <td>
                    <div class="object-image">
                        <a class="fancybox" href="<?php echo e($val->product_image); ?>">
                            <img src="<?php echo e($val->product_image); ?>">
                        </a>
                    </div>
                    <div class="clear-float"></div>
                </td>
                <td>
                    <?php echo e($val['product_name_ru']); ?>

                </td>
                <td>
                    <?php echo e($val['product_price']); ?>$ (<?php echo e(round($val->product_price * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)); ?>тг)
                </td>
                <td>
                    <input class="basket_product_id" type="hidden" value="<?php echo e($val->product_id); ?>"/>
                    <input onchange="setBasketUnit(this,'<?php echo e($val->product_id); ?>')" placeholder="Количество" style="padding: 3px 10px" class="basket_product_unit" type="number" value="<?php echo e($val->unit); ?>"/>
                </td>
                <td style="text-align: center">
                    <a href="javascript:void(0)" onclick="delProductFromBasket(this,'<?php echo e($val->product_id); ?>')">
                        <li class="fa fa-trash-o" style="font-size: 20px; color: red;"></li>
                    </a>
                </td>
            </tr>

            <?php $sum += $val->product_price; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        <tr>
            <td colspan="5" style="text-align: right"><b>Общая сумма:</b> </td>
            <td colspan="1"><b id="sum"><?php echo e($sum); ?>$ (<?php echo e(round($sum * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)); ?>тг)</b></td>
        </tr>

        <tr>
            <td colspan="6" style="text-align: right">
                <a href="javascript:void(0)" onclick="showBasketModal()" class="btn btn-primary btn-block" style="background-color: rgb(253, 58, 53) !important; width: 200px"><b>Подтвердить заказ</b></a>
            </td>
        </tr>

        </tbody>

    </table>



</div>