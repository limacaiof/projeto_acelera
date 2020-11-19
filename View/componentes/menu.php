<!-- MENU PRINCIPAL -->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav container">
        <li class="nav-item active">
            <a class="nav-link font" href="#">Logotipo</a>
        </li>
        <div class="nav-item quebrarFlex">
            <li class="nav-item right-my">
                <a class="nav-link font" href="#">Perfil</a>
            </li>
            <li class="nav-item right-my">
                <a class="nav-link font" href="#">Opcoes</a>
            </li>
            <li class="nav-item right-my">
                <a class="nav-link font" onclick="openNotication()" href="#">Notificação</a>
                <div id="notifi" class='notication dropdown-menu dropdown-menu-right show'>
                    <a href="#" onclick="closeNotication()">fechar</a>
                </div>
            </li>
        </div>
    </ul>
</nav>

    