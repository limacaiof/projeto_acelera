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
                    <ul id="notifi" class='notication dropdown-menu dropdown-menu-right'>
                        <!-- Modal de notificacao -->
                        <div class="main-modal navbar-nav">
                            <h1>Notificação</h1>
                            <a href="#" onclick="closeNotication()">fechar</a>
                        </div>
                        <div class="content-modal">
                            <p class='cards'>Quando</p>
                            <p class='cards'>Sua addicao na depesas</p>
                            <p class='cards'> horario</p>
                        </div>
                        

                    </ul>
                </div>
            </li>
        </div>
    </ul>
</nav>


