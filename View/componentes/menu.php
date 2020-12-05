<!-- MENU PRINCIPAL -->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav container">
        <li class="nav-item active">
            <a class="nav-link font" href="#">Logotipo</a>
        </li>
        <div class="nav-item quebrarFlex">
            <li class="nav-item right-my">
                <a class="nav-link font " data-toggle="modal" data-target="#exampleModal" href="#">
                    <?php
                        require '../src/svg/notifications-outline.php';
                    ?>
                </a>
            </li>
            <li class="nav-item right-my dropdown">
                <a class="nav-link font" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                        require '../src/svg/people-outline.php';
                    ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Alterar Conta</a>
                    <a class="dropdown-item" href="#">Receita/Ganhos</a>
                    <a class="dropdown-item" href="../Controller/LoginController.php?acao=logoff">Sair</a>
                </div>
            </li>
        </div>
    </ul>


</nav>
<!-- Modal Notification-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title title-modal" id="exampleModalLabel">Notificação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="notification">
            <h1 class='cards'> Novo</h1>
            <p class='cards'>Foi adicionado em despesas</p>
            <p class='cards'>ontem 17:30</p>
        </div>
        <div class="notification">
            <h1 class='cards'> Novo</h1>
            <p class='cards'>Foi adicionado em despesas</p>
            <p class='cards'>ontem 17:30</p>
        </div><div class="notification">
            <h1 class='cards'> Novo</h1>
            <p class='cards'>Foi adicionado em despesas</p>
            <p class='cards'>ontem 17:30</p>
        </div><div class="notification">
            <h1 class='cards'> Novo</h1>
            <p class='cards'>Foi adicionado em despesas</p>
            <p class='cards'>ontem 17:30</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Visualizei todos</button>
      </div>
    </div>
  </div>
</div>

