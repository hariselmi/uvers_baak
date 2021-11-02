<div class="modal-content" id="addArticle">
    <?php echo e(Form::open(['url' => 'articles', 'files' => true])); ?>

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">
        <?php echo e(__('Tambah Artikel')); ?>

        </h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group row">
                    <?php echo e(Form::label('category', trans('article.category') . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::select('category', array('1' => 'Halaman Utama', '2' => 'Informasi Kemahasiswaan', '3' => 'Kegiatan Kemahasiswaan', '4' => 'Informasi Beasiswa'), null, ['class' => 'form-control', 'required'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('date', trans('article.date') . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::date('date', null, ['class' => 'form-control', 'required'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('title', trans('article.title') . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::text('title', null, ['class' => 'form-control', 'required'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('content', trans('article.content') . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::textarea('content', null, ['class' => 'form-control', 'required'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('thumbnail', trans('article.thumbnail') . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::file('thumbnail', null, ['class' => 'form-control', 'required'])); ?>

                    </div>
                    
                </div>
                <div class="form-group row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">Ukuran Gambar (555px x 390px)</div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <?php if(!empty($page)): ?>
        <input type="hidden" name="page" value="<?php echo e($page); ?>" />
        <?php endif; ?>
        <?php echo e(Form::submit(trans('submit'), ['class' => 'btn btn-success'])); ?>

        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Tutup')); ?></button>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<script type="text/javascript" src="<?php echo e(asset('js/article.js')); ?>"></script><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/article/formadd.blade.php ENDPATH**/ ?>