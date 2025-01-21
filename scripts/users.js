function edit(id, name, email, password) {

    user = document.getElementById('user_'+id);
    user.innerHTML = '';
    user.innerHTML = `<td colspan="4">
                        <form id="form" action="../backend/user_controller.php?action=update" method="post" class="form_edit">
                        <input type="name" name="name" placeholder="Nome" value="${name}" />
                        <input type="email" name="email" placeholder="E-mail" value="${email}" />
                        <input type="password" name="password" placeholder="Senha" value="${password}" />
                        <input type="hidden" name="id" value="${id}" />
                        <button type="submit">Atualizar</button> 
                        </form>
                      </td>`;
}

function del(id) {

    window.location.href = '../backend/user_controller.php?action=del&id='+id;
}

function back() {

    window.location.href = '../index.php';
}