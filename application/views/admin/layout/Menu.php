<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
        <li class="header">PRINCIPAL</li>
        <li class="treeview">
            <a href="#">
            <i class="fa fa-user"></i> <span>Técnicos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="<?=base_url();?>AdminC/agregarTecnico"><i class="fa fa-circle-o"></i> Añadir</a></li>
            <li><a href="<?=base_url();?>AdminC/gestionarTecnicos"><i class="fa fa-circle-o"></i> Gestionar</a></li>
            <li><a href="<?=base_url();?>AdminC/abonosTecnicos"><i class="fa fa-circle-o"></i> Abonos</a></a></li>
            <li><a href="<?=base_url();?>AdminC/gestionarComision"><i class="fa fa-circle-o"></i> Comisión</a></a></li>
            </ul>
        </li>
        
        <li class="treeview">
            <a href="#">
            <i class="fa fa-money"></i> <span>Servicio base</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="<?=base_url();?>AdminC/gestionarServicioBase"><i class="fa fa-circle-o"></i> Gestionar</a></li>
            </ul>
        </li>
        </ul>
        
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">