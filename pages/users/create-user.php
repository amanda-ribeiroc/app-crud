<h1>Criar uma conta</h1>
<form action="?page=salve-user" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="form-group row">
        <label for="inputNome3" class="col-sm-1 col-form-label">Nome</label>
        <div class="col-sm-5">
            <input type="text" name="name" class="form-control" id="inputName3" placeholder="Nome" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-1 col-form-label">Email</label>
        <div class="col-sm-5">
            <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputNome3" class="col-sm-1 col-form-label">Username</label>
        <div class="col-sm-4">
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" name="username" class="form-control" id="inputName3" placeholder="Criei um nome de usuário" required>
            </div>
            <div class="mt-2 ml-2">
                <small id="passwordHelpInline" class="text-muted">
                    Até 10 caracteres.
                </small>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-1 col-form-label">Senha</label>
        <div class="col-sm-3">
            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Senha" aria-describedby="passwordHelpInline" required minlength="3">
            <small id="passwordHelpInline" class="text-muted">
                Deve ter entre 3 e 8 caracteres.
            </small>
        </div>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Criar Conta</button>
    </div>
</form>