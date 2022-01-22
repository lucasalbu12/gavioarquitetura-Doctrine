<?php require __DIR__ . '/../inicio-html.php'; ?>

    <form action="/realiza-login" method="post">
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="senha" id="senha" name="senha" class="form-control">
        </div>
        <button class="btn btn-primary">Login</button>
    </form>

<?php require __DIR__ . '/../final-html.php'; ?>