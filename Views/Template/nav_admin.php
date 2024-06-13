<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media(); ?>/images/avatar.png"
            alt="User Image">
        <div>
            <p class="app-sidebar__user-name">
                <?= $_SESSION['userData']['nombres']; ?>
            </p>
            <p class="app-sidebar__user-designation">
                <?= $_SESSION['userData']['nombrerol']; ?>
            </p>
        </div>
    </div>
    <ul class="app-menu">
        <!-- <li>
            <a class="app-menu__item" href="<?= base_url(); ?>" target="_blank">
                <i class="app-menu__icon fa fas fa-globe" aria-hidden="true"></i>
                <span class="app-menu__label">Ver sitio web</span>
            </a>
        </li> -->
        <?php if (!empty($_SESSION['permisos'][1]['r'])) { ?>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
                    <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">Dashboard</span>
                </a>
            </li>
        <?php } ?>
        <?php if (!empty($_SESSION['permisos'][2]['r'])) { ?>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                    <span class="app-menu__label">Usuarios</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= base_url(); ?>/usuarios">
                            <i class="fas fa-user-circle"></i>
                            <span style="margin-left: 10px;">Usuarios</span></a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/roles">
                            <i class="fas fa-tasks"></i>
                            <span style="margin-left: 10px;">Roles</span></a></li>

                </ul>
            </li>
        <?php } ?>
        <!-- <?php if (!empty($_SESSION['permisos'][3]['r'])) { ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/clientes">
                <i class="app-menu__icon fa fa-user" aria-hidden="true"></i>
                <span class="app-menu__label">Clientes</span>
            </a>
        </li>
        <?php } ?> -->
        <!-- <?php if (!empty($_SESSION['permisos'][4]['r']) || !empty($_SESSION['permisos'][6]['r'])) { ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-archive" aria-hidden="true"></i>
                <span class="app-menu__label">Corredor</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <?php if (!empty($_SESSION['permisos'][4]['r'])) { ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/productos"><i class="icon fa fa-circle-o"></i> Productos</a></li>
                <?php } ?>
                <?php if (!empty($_SESSION['permisos'][6]['r'])) { ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/Actividades"><i class="icon fa fa-circle-o"></i> Categorías</a></li>
                <?php } ?>
            </ul>
        </li>
        <?php } ?> -->
        <!-- <?php if (!empty($_SESSION['permisos'][5]['r'])) { ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/pedidos">
                <i class="app-menu__icon fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="app-menu__label">Pedidos</span>
            </a>
        </li>
         <?php } ?> -->

        <?php if (!empty($_SESSION['permisos'][MDVoluntarios]['r'])) { ?>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fas fa-people-carry" aria-hidden="true"></i>
                    <span class="app-menu__label">Voluntarios</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= base_url(); ?>/voluntarios"><i class="fas fa-male"></i> <span
                                style="margin-left: 10px;">Solicitudes</span></a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/voluntarioschk"><i class="fas fa-child"></i> <span
                                style="margin-left: 10px;">Anotados</span></a></li>
                </ul>

            </li>
        <?php } ?>

        <?php if(!empty($_SESSION['permisos'][MActividades]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fas fa-hands-helping" aria-hidden="true"></i>
                <span class="app-menu__label">Actividades</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
            <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/actividades"><i class="fas fa-book-open" aria-hidden="true"></i>
                <span  style="margin-left: 10px;">Talleres</span>
            </a>

        </li>
      
            </ul>

            <ul class="treeview-menu">
            <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/charlas"><i class="fas fa-chalkboard-teacher" aria-hidden="true"></i>
                <span  style="margin-left: 10px;">Charlas</span>
            </a>

        </li>
      
            </ul>


            <ul class="treeview-menu">
            <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/voluntariados"><i class="fas fa-seedling" aria-hidden="true"></i>
                <span  style="margin-left: 10px;">Voluntariados</span>
            </a>

        </li>
      
            </ul>
        </li>
        <?php } ?>


        <?php if (!empty($_SESSION['permisos'][MDOCUMENTOS]['r'])) { ?>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fas fa-folder fa-lg" aria-hidden="true"></i>
                    <span class="app-menu__label">Documentación</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= base_url(); ?>/documentos"><i class="fas fa-solid fa-file-import"></i> <span
                                style="margin-left: 10px;">Documentos Internos</span></a></li>

                </ul>

                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= base_url(); ?>/documentosP"><i class="fas fa-file-export""></i> <span
                                style="margin-left: 10px;">Documentos Públicos</span></a></li>
                </ul>


            </li>
        <?php } ?>
        
        <?php if(!empty($_SESSION['permisos'][MDCONTACTOS]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/contactos">
                <i class="app-menu__icon fas fa-envelope" aria-hidden="true"></i>
                <span class="app-menu__label">Mensajes</span>
            </a>
        </li>
         <?php } ?>

        <?php if (!empty($_SESSION['permisos'][MREPORTE]['r'])) { ?>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fas fa-scroll" aria-hidden="true"></i>
                    <span class="app-menu__label">Reportes</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= base_url(); ?>/reporteVoluntario"><i class="fas fa-scroll"></i> <span
                                style="margin-left: 10px;">Voluntarios</span></a></li>

                </ul>


            </li>
        <?php } ?>

       

        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                <span class="app-menu__label">Cerrar Sesión</span>
            </a>
        </li>
    </ul>
</aside>