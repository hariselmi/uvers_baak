<?php if(Auth::check()): ?>
    <aside class="main-sidebar">
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->

             <!-- admin menu buka -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU UTAMA</li>

                    <li class=""><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-dashboard"></i>
                            <span><?php echo e(trans('menu.dashboard')); ?></span></a></li>

                    <?php if(auth()->user()->checkSpPermission('pelaporan.index')): ?>
                        <li
                            class="<?php echo e(Request::is('lomba') || Request::is('nonlomba') || Request::is('sertifikat') || Request::is('pelatihan') || Request::is('magang') ? 'active' : ''); ?> treeview">
                            <a href="#"><i class="fa fa-calendar"></i> <span><?php echo e(__('Pelaporan Aktivitas Mahasiswa')); ?></span><span
                                    class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                            <ul class="treeview-menu">
                                <?php if(auth()->user()->checkSpPermission('lomba.index')): ?>
                                    <li class="<?php echo e(Request::is('lomba') ? 'active' : ''); ?> ">
                                        <a href="<?php echo e(url('/lomba')); ?>"><i class="fa fa-circle-o"></i>
                                            <span><?php echo e(__('Kegiatan Lomba')); ?></span></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->checkSpPermission('nonlomba.index')): ?>
                                    <li class="<?php echo e(Request::is('nonlomba') ? 'active' : ''); ?> ">
                                        <a href="<?php echo e(url('/nonlomba')); ?>"><i class="fa fa-circle-o"></i>
                                            <span><?php echo e(__('Kegiatan Non Lomba')); ?></span></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(auth()->user()->checkSpPermission('sertifikat.index')): ?>
                                    <li class="<?php echo e(Request::is('sertifikat') ? 'active' : ''); ?> ">
                                        <a href="<?php echo e(url('/sertifikat')); ?>"><i class="fa fa-circle-o"></i>
                                            <span><?php echo e(__('Sertifikat Kompetensi')); ?></span></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(auth()->user()->checkSpPermission('pelatihan.index')): ?>
                                    <li class="<?php echo e(Request::is('pelatihan') ? 'active' : ''); ?> ">
                                        <a href="<?php echo e(url('/pelatihan')); ?>"><i class="fa fa-circle-o"></i>
                                            <span><?php echo e(__('Keikutsertaan Pelatihan')); ?></span></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(auth()->user()->checkSpPermission('magang.index')): ?>
                                    <li class="<?php echo e(Request::is('magang') ? 'active' : ''); ?> ">
                                        <a href="<?php echo e(url('/magang')); ?>"><i class="fa fa-circle-o"></i>
                                            <span><?php echo e(__('Aktivitas Lain-lain')); ?></span></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if(auth()->user()->checkSpPermission('beasiswa.index')): ?>
                        <li
                            class="<?php echo e(Request::is('pendaftaran') || Request::is('statuspemrosesan') || Request::is('ekspor') ? 'active' : ''); ?> treeview">
                            <a href="#"><i class="fa fa-sitemap"></i> <span><?php echo e(__('Beasiswa')); ?></span><span
                                    class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                            <ul class="treeview-menu">

                                <?php if(auth()->user()->checkSpPermission('pendaftaran.index')): ?>
                                    <li class="<?php echo e(Request::is('pendaftaran') ? 'active' : ''); ?> ">
                                        <a href="<?php echo e(url('/pendaftaran')); ?>"><i class="fa fa-circle-o"></i>
                                            <span><?php echo e(__('Pendaftaran Beasiswa')); ?></span></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->checkSpPermission('statuspemrosesan.index')): ?>
                                    <li class="<?php echo e(Request::is('statuspemrosesan') ? 'active' : ''); ?> ">
                                        <a href="<?php echo e(url('/statuspemrosesan')); ?>"><i class="fa fa-circle-o"></i>
                                            <span><?php echo e(__('Status Pemrosesan')); ?></span></a>
                                    </li>
                                <?php endif; ?>
                                
                            </ul>
                        </li>
                    <?php endif; ?>


                    

                    <?php if(auth()->user()->checkSpPermission('skpi.index')): ?>
                        <li class="<?php echo e(Request::is('skpi') ? 'active' : ''); ?> "><a
                                href="<?php echo e(url('/skpi')); ?>"><i class="fa fa-file"></i>
                                <span><?php echo e(__('SKPI')); ?></span></a>
                    <?php endif; ?>

                    


                    <?php if(auth()->user()->checkSpPermission('settingweb.index')): ?>
                        <li
                            class="<?php echo e(Request::is('articles') || Request::is('sliders') || Request::is('pages') ? 'active' : ''); ?> treeview">
                            <a href="#"><i class="fa fa-cog"></i> <span><?php echo e(__('Website')); ?></span><span
                                    class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                            <ul class="treeview-menu">

                                <?php if(auth()->user()->checkSpPermission('articles.index')): ?>
                                    <li class="<?php echo e(Request::is('articles') ? 'active' : ''); ?> "><a
                                            href="<?php echo e(url('/articles')); ?>"><i class="fa fa-newspaper-o"></i>
                                            <span><?php echo e(trans('menu.articles')); ?></span></a></li>
                                <?php endif; ?>

                                <?php if(auth()->user()->checkSpPermission('sliders.index')): ?>
                                    <li class="<?php echo e(Request::is('sliders') ? 'active' : ''); ?> "><a
                                            href="<?php echo e(url('/sliders')); ?>"><i class="fa fa-picture-o"></i>
                                            <span><?php echo e(trans('menu.sliders')); ?></span></a></li>
                                <?php endif; ?>


                                <?php if(auth()->user()->checkSpPermission('pages.index')): ?>
                                    <li class="<?php echo e(Request::is('pages') ? 'active' : ''); ?> "><a
                                            href="<?php echo e(url('/pages')); ?>"><i class="fa fa-university"
                                                aria-hidden="true"></i>
                                            <span><?php echo e(trans('menu.pages')); ?></span></a></li>
                                <?php endif; ?>

                                <?php if(auth()->user()->checkSpPermission('identity.index')): ?>
                                    <li class="<?php echo e(Request::is('identity') ? 'active' : ''); ?> "><a
                                            href="<?php echo e(url('/identity')); ?>"><i class="fa fa-cog"></i>
                                            <span><?php echo e(trans('menu.identity')); ?></span></a></li>
                                <?php endif; ?>


                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if(auth()->user()->checkSpPermission('datamaster.index')): ?>
                        <li
                            class="<?php echo e(Request::is('mahasiswa') || Request::is('standarddetails') || Request::is('semesterperiods') || Request::is('academicyears') ? 'active' : ''); ?> treeview">
                            <a href="#"><i class="fa fa-sitemap"></i> <span><?php echo e(__('Data Master')); ?></span><span
                                    class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                            <ul class="treeview-menu">
                                <?php if(auth()->user()->checkSpPermission('mahasiswa.index')): ?>
                                    <li class="<?php echo e(Request::is('mahasiswa') ? 'active' : ''); ?> ">
                                        <a href="<?php echo e(url('/mahasiswa')); ?>"><i class="fa fa-circle-o"></i>
                                            <span><?php echo e(__('Data Mahasiswa')); ?></span></a>
                                    </li>
                                <?php endif; ?>
                                


                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if(auth()->user()->checkSpPermission('employees.index')): ?>
                        <li class="<?php echo e(Request::is('employees') ? 'active' : ''); ?>"><a
                                href="<?php echo e(url('/employees')); ?>"><i class="fa fa-user"></i>
                                <span><?php echo e(trans('menu.employees')); ?></span></a></li>
                    <?php endif; ?>

                    <?php if(Auth::user()->checkSpPermission('flexiblepossetting.create')): ?>
                        <li class="<?php echo e(Request::is('flexiblepossetting/create') ? 'active' : ''); ?>"><a
                                href="<?php echo e(route('flexiblepossetting.create')); ?>"><i class="fa fa-gear"></i>
                                <span><?php echo e(__('Settings')); ?></span></a></li>
                    <?php endif; ?>
                </ul>

                <!-- admin menu tutup -->



           
        </section>
    </aside>
<?php endif; ?>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/partials/sidebar.blade.php ENDPATH**/ ?>