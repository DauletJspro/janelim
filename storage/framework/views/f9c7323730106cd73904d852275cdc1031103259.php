<?php

use Illuminate\Support\Facades\DB;

$categories = \App\Models\Category::all();
$array = [];
foreach ($categories as $category) {
    $array[$category->id] = $category->name;
}
$categories = $array;
$items = \App\Models\Product::ITEM;
?>


<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            <?php echo e($title); ?>

        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8" style="padding-left: 0px">
                    <div class="box box-primary">
                        <?php if(isset($error)): ?>
                            <div class="alert alert-danger">
                                <?php echo e($error); ?>

                            </div>
                        <?php endif; ?>

                        <?php if($row->product_id > 0): ?>
                            <form action="/admin/product/<?php echo e($row->product_id); ?>" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <?php else: ?>
                                    <form action="/admin/product" method="POST">
                                        <?php endif; ?>
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <input type="hidden" name="product_id" value="<?php echo e($row->product_id); ?>">
                                        <input type="hidden" value="<?php echo e($row->product_image); ?>" name="product_image"
                                               class="image-name">

                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>Название (Рус)</label>
                                                <input value="<?php echo e($row->product_name_ru); ?>" type="text"
                                                       class="form-control" name="product_name_ru"
                                                       placeholder="Введите">
                                            </div>
                                            <div class="form-group">
                                                <label>Цена</label>
                                                <input value="<?php echo e($row->product_price); ?>" type="text"
                                                       class="form-control" name="product_price" placeholder="Введите">
                                            </div>
                                            <div class="form-group">
                                                <label>Балл проукта</label>
                                                <input type="number" value="<?php echo e($row->ball); ?>"
                                                       class="form-control" name="ball"
                                                       placeholder="Введите балл продукта">
                                            </div>
                                            <div class="form-group">
                                                <label>Cach Back (%)</label>
                                                <input min="0" max="100" value="<?php echo e($row->product_cash); ?>" type="number"
                                                       class="form-control" name="product_cash" placeholder="Введите">
                                            </div>
                                            <div class="form-group">
                                                <label>Краткое описание</label>
                                                <textarea class="form-control"
                                                          name="product_desc_ru"><?php echo e($row->product_desc_ru); ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Полное описание</label>
                                                <textarea rows="10" class="form-control tinyeditor"
                                                          name="full_description_ru"><?php echo e($row->full_description_ru); ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Информация</label>
                                                <textarea rows="5" class="form-control tinyeditor"
                                                          name="information"><?php echo e($row->information); ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Состав</label>
                                                <textarea rows="5" class="form-control tinyeditor"
                                                          name="composition"><?php echo e($row->composition); ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Порядковый номер сортировки</label>
                                                <input value="<?php echo e($row->sort_num); ?>" type="text" class="form-control"
                                                       name="sort_num" placeholder="Введите">
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <?php echo Form::checkbox('is_popular', 1, (isset($row->is_popular) ? $row->is_popular : false));; ?>

                                                    <label>Входит в категорию "Поулярные"</label>
                                                </div>
                                                <div>
                                                    <?php echo Form::checkbox('is_new', 1, isset($row->is_new) ? $row->is_new : false);; ?>

                                                    <label>Входит в категорию "NEW"</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Выберите категорию</label>
                                                <?php echo Form::select('category',$categories,(isset($row->category_id) ? $row->category_id : null),['class' => 'form-control', 'placeholder' => 'Выберите категорию']);; ?>

                                            </div>
                                            <div class="form-group">
                                                <label>Выберите назначение</label>
                                                <?php echo Form::select('item_id',$items,$row->item_id ? $row->item_id : null,['class' => 'form-control', 'placeholder' => 'Выберите назначение']);; ?>

                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                        </div>
                                    </form>
                            </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-primary" style="padding: 30px; text-align: center">
                        <div style="padding: 20px; border: 1px solid #c2e2f0">
                            <img class="image-src" src="<?php echo e($row->product_image); ?>" style="width: 100%; "/>
                        </div>
                        <div style="background-color: #c2e2f0;height: 40px;margin: 0 auto;width: 2px;"></div>
                        <form id="image_form" enctype="multipart/form-data" method="post" class="image-form">
                            <i class="fa fa-plus"></i>
                            <input id="avatar-file" type="file" onchange="uploadImage()" name="image"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    tinymce.init({
        selector: '.tinyeditor'
    });
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>