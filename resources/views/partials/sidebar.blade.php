@if (Auth::check())
    <aside class="main-sidebar">
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->

             <!-- admin menu buka -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU UTAMA</li>

                    <li class=""><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>
                            <span>{{ trans('menu.dashboard') }}</span></a></li>

                    @if (auth()->user()->checkSpPermission('pelaporan.index'))
                        <li
                            class="{{ Request::is('lomba') || Request::is('nonlomba') || Request::is('sertifikat') || Request::is('pelatihan') || Request::is('magang') ? 'active' : '' }} treeview">
                            <a href="#"><i class="fa fa-calendar"></i> <span>{{ __('Pelaporan Aktivitas Mahasiswa') }}</span><span
                                    class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                            <ul class="treeview-menu">
                                @if (auth()->user()->checkSpPermission('lomba.index'))
                                    <li class="{{ Request::is('lomba') ? 'active' : '' }} ">
                                        <a href="{{ url('/lomba') }}"><i class="fa fa-circle-o"></i>
                                            <span>{{ __('Kegiatan Lomba') }}</span></a>
                                    </li>
                                @endif
                                @if (auth()->user()->checkSpPermission('nonlomba.index'))
                                    <li class="{{ Request::is('nonlomba') ? 'active' : '' }} ">
                                        <a href="{{ url('/nonlomba') }}"><i class="fa fa-circle-o"></i>
                                            <span>{{ __('Kegiatan Non Lomba') }}</span></a>
                                    </li>
                                @endif

                                @if (auth()->user()->checkSpPermission('sertifikat.index'))
                                    <li class="{{ Request::is('sertifikat') ? 'active' : '' }} ">
                                        <a href="{{ url('/sertifikat') }}"><i class="fa fa-circle-o"></i>
                                            <span>{{ __('Sertifikat Kompetensi') }}</span></a>
                                    </li>
                                @endif

                                @if (auth()->user()->checkSpPermission('pelatihan.index'))
                                    <li class="{{ Request::is('pelatihan') ? 'active' : '' }} ">
                                        <a href="{{ url('/pelatihan') }}"><i class="fa fa-circle-o"></i>
                                            <span>{{ __('Keikutsertaan Pelatihan') }}</span></a>
                                    </li>
                                @endif

                                @if (auth()->user()->checkSpPermission('magang.index'))
                                    <li class="{{ Request::is('magang') ? 'active' : '' }} ">
                                        <a href="{{ url('/magang') }}"><i class="fa fa-circle-o"></i>
                                            <span>{{ __('Aktivitas Lain-lain') }}</span></a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if (auth()->user()->checkSpPermission('beasiswa.index'))
                        <li
                            class="{{ Request::is('pendaftaran') || Request::is('statuspemrosesan') || Request::is('ekspor') ? 'active' : '' }} treeview">
                            <a href="#"><i class="fa fa-sitemap"></i> <span>{{ __('Beasiswa') }}</span><span
                                    class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                            <ul class="treeview-menu">

                                @if (auth()->user()->checkSpPermission('pendaftaran.index'))
                                    <li class="{{ Request::is('pendaftaran') ? 'active' : '' }} ">
                                        <a href="{{ url('/pendaftaran') }}"><i class="fa fa-circle-o"></i>
                                            <span>{{ __('Pendaftaran Beasiswa') }}</span></a>
                                    </li>
                                @endif
                                @if (auth()->user()->checkSpPermission('statuspemrosesan.index'))
                                    <li class="{{ Request::is('statuspemrosesan') ? 'active' : '' }} ">
                                        <a href="{{ url('/statuspemrosesan') }}"><i class="fa fa-circle-o"></i>
                                            <span>{{ __('Status Pemrosesannn') }}</span></a>
                                    </li>
                                @endif
                                {{-- @if (auth()->user()->checkSpPermission('ekspor.index'))
                                    <li class="{{ Request::is('ekspor') ? 'active' : '' }} ">
                                        <a href="{{ url('/ekspor') }}"><i class="fa fa-circle-o"></i>
                                            <span>{{ __('Ekspor Data beasiswa') }}</span></a>
                                    </li>
                                @endif --}}
                            </ul>
                        </li>
                    @endif


                    {{-- @if (auth()->user()->checkSpPermission('audit.index'))
                        <li
                            class="{{ Request::is('checklists') || Request::is('findings') || Request::is('reports') || Request::is('uploaddocuments') ? 'active' : '' }} treeview">
                            <a href="#"><i class="fa fa-sitemap"></i> <span>{{ __('Penutupan Audit') }}</span><span
                                    class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                            <ul class="treeview-menu">
                                @if (auth()->user()->checkSpPermission('reports.index'))
                                    <li class="{{ Request::is('reports') ? 'active' : '' }} ">
                                        <a href="{{ url('/reports') }}"><i class="fa fa-circle-o"></i>
                                            <span>{{ __('Laporan Audit') }}</span></a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif --}}

                    @if (auth()->user()->checkSpPermission('skpi.index'))
                        <li class="{{ Request::is('skpi') ? 'active' : '' }} "><a
                                href="{{ url('/skpi') }}"><i class="fa fa-file"></i>
                                <span>{{ __('SKPI') }}</span></a>
                    @endif

                    {{-- @if (auth()->user()->checkSpPermission('rtm.index'))
                        <li
                            class="{{ Request::is('agenda') || Request::is('verification') ? 'active' : '' }} treeview">
                            <a href="#"><i class="fa fa-sitemap"></i> <span>{{ __('Rapat Tinjauan Manajemen') }}</span><span
                                    class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                            <ul class="treeview-menu">
                                @if (auth()->user()->checkSpPermission('agenda.index'))
                                    <li class="{{ Request::is('agenda') ? 'active' : '' }} ">
                                        <a href="{{ url('/agenda') }}"><i class="fa fa-circle-o"></i>
                                            <span>{{ __('Berita Acara') }}</span></a>
                                    </li>
                                @endif
                                 @if (auth()->user()->checkSpPermission('verification.index'))
                                    <li class="{{ Request::is('verification') ? 'active' : '' }} ">
                                        <a href="{{ url('/verification') }}"><i class="fa fa-circle-o"></i>
                                            <span>{{ __('Verifikasi Tindak Lanjut') }}</span></a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
 --}}


                    @if (auth()->user()->checkSpPermission('settingweb.index'))
                        <li
                            class="{{ Request::is('articles') || Request::is('sliders') || Request::is('pages') ? 'active' : '' }} treeview">
                            <a href="#"><i class="fa fa-cog"></i> <span>{{ __('Website') }}</span><span
                                    class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                            <ul class="treeview-menu">

                                @if (auth()->user()->checkSpPermission('articles.index'))
                                    <li class="{{ Request::is('articles') ? 'active' : '' }} "><a
                                            href="{{ url('/articles') }}"><i class="fa fa-newspaper-o"></i>
                                            <span>{{ trans('menu.articles') }}</span></a></li>
                                @endif

                                @if (auth()->user()->checkSpPermission('sliders.index'))
                                    <li class="{{ Request::is('sliders') ? 'active' : '' }} "><a
                                            href="{{ url('/sliders') }}"><i class="fa fa-picture-o"></i>
                                            <span>{{ trans('menu.sliders') }}</span></a></li>
                                @endif


                                @if (auth()->user()->checkSpPermission('pages.index'))
                                    <li class="{{ Request::is('pages') ? 'active' : '' }} "><a
                                            href="{{ url('/pages') }}"><i class="fa fa-university"
                                                aria-hidden="true"></i>
                                            <span>{{ trans('menu.pages') }}</span></a></li>
                                @endif

                                @if (auth()->user()->checkSpPermission('identity.index'))
                                    <li class="{{ Request::is('identity') ? 'active' : '' }} "><a
                                            href="{{ url('/identity') }}"><i class="fa fa-cog"></i>
                                            <span>{{ trans('menu.identity') }}</span></a></li>
                                @endif


                            </ul>
                        </li>
                    @endif

                    @if (auth()->user()->checkSpPermission('datamaster.index'))
                        <li
                            class="{{ Request::is('mahasiswa') || Request::is('standarddetails') || Request::is('semesterperiods') || Request::is('academicyears') ? 'active' : '' }} treeview">
                            <a href="#"><i class="fa fa-sitemap"></i> <span>{{ __('Data Master') }}</span><span
                                    class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                            <ul class="treeview-menu">
                                @if (auth()->user()->checkSpPermission('mahasiswa.index'))
                                    <li class="{{ Request::is('mahasiswa') ? 'active' : '' }} ">
                                        <a href="{{ url('/mahasiswa') }}"><i class="fa fa-circle-o"></i>
                                            <span>{{ __('Data Mahasiswa') }}</span></a>
                                    </li>
                                @endif
                                {{-- @if (auth()->user()->checkSpPermission('standarddetails.index'))
                                    <li class="{{ Request::is('standarddetails') ? 'active' : '' }} ">
                                        <a href="{{ url('/standarddetails') }}"><i class="fa fa-circle-o"></i>
                                            <span>{{ __('Standar Detail') }}</span></a>
                                    </li>
                                @endif

                                @if (auth()->user()->checkSpPermission('division.index'))
                                    <li class="{{ Request::is('division') ? 'active' : '' }} "><a
                                            href="{{ url('/division') }}"><i class="fa fa-cog"></i>
                                            <span>{{ trans('menu.division') }}</span></a></li>
                                @endif

                                @if (auth()->user()->checkSpPermission('period.index'))
                                    <li class="{{ Request::is('period') ? 'active' : '' }} "><a
                                            href="{{ url('/period') }}"><i class="fa fa-calendar"></i>
                                            <span>{{ trans('menu.period') }}</span></a></li>
                                @endif --}}


                            </ul>
                        </li>
                    @endif

                    @if (auth()->user()->checkSpPermission('employees.index'))
                        <li class="{{ Request::is('employees') ? 'active' : '' }}"><a
                                href="{{ url('/employees') }}"><i class="fa fa-user"></i>
                                <span>{{ trans('menu.employees') }}</span></a></li>
                    @endif

                    @if (Auth::user()->checkSpPermission('flexiblepossetting.create'))
                        <li class="{{ Request::is('flexiblepossetting/create') ? 'active' : '' }}"><a
                                href="{{ route('flexiblepossetting.create') }}"><i class="fa fa-gear"></i>
                                <span>{{ __('Settings') }}</span></a></li>
                    @endif
                </ul>

                <!-- admin menu tutup -->



           
        </section>
    </aside>
@endif
