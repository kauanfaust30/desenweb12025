document.getElementById("btnLogin").addEventListener("click", async () => {
    const usuario = document.getElementById("usuario").value.trim();
    const senha = document.getElementById("senha").value.trim();

    if (!usuario || !senha) {
        alert("Preencha todos os campos.");
        return;
    }

    try {
        const req = await fetch("../src/verificar_login.php", {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify({usuario, senha})
        });

        const res = await req.json();

        if (res.success) {
            window.location.href = "admin_dashboard.php";
        } else {
            alert("⚠ Erro no login: " + res.message);
        }

    } catch (err) {
        console.error(err);
        alert("Falha ao conectar ao servidor.");
    }
});
