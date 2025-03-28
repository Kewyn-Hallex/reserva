function mudarParaCadastro() {
    document.getElementById("formulario").innerHTML = `
        <h2>Cadastro</h2>
        <input type="text" name="nome" placeholder="Nome completo" required />
        <input type="text" name="usuario" placeholder="Usuário" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="date" name="data_nascimento" required />
        <input type="password" name="senha" placeholder="Senha" required />
        <input type="password" name="confirmar_senha" placeholder="Confirmar senha" required />
        <input type="submit" value="Cadastrar" />
        <a href="#" title="Login" onclick="mudarParaLogin()">Já tem uma conta? Faça login</a>
    `;
}

function mudarParaLogin() {
    document.getElementById("formulario").innerHTML = `
        <h2>Login</h2>
        <input type="text" name="usuario" placeholder="Usuário" required />
        <input type="password" name="senha" placeholder="Senha" required />
        <div class="lembrar-container">
            <input type="checkbox" name="lembrar" id="lembrar" class="lembrar">
            <label for="lembrar" class="textLembrar">Lembrar de mim</label>
        </div>
        <input type="submit" value="Entrar" />
        <a href="#" title="Cadastro" onclick="mudarParaCadastro()">Cadastro</a>
    `;
}
