function mudarParaCadastro() {
    document.getElementById("formulario").innerHTML = `
        <h2>Cadastro</h2>
        <input type="text" name="usuario" placeholder="Usuário"/>
        <input type="password" name="senha" placeholder="Senha"/>
        <input type="password" name="confirmar_senha" placeholder="Confirmar senha"/>
        <input type="submit" value="Cadastrar" />
        <a href="#" title="Login" onclick="mudarParaLogin()">Já tem uma conta? Faça login</a>
    `;
}

function mudarParaLogin() {
    document.getElementById("formulario").innerHTML = `
        <h2>Login</h2>
        <input type="text" name="usuario" placeholder="Usuário"/>
        <input type="password" name="senha" placeholder="Senha"/>
        <input type="submit" value="Entrar" />
        <a href="#" title="Cadastro" onclick="mudarParaCadastro()">Cadastro</a>
    `;
}
