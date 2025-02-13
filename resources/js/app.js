import './bootstrap';

async function testar(url) {
    try {
        const response = await fetch(url);
        const data = await response.json();
        document.getElementById("resultado").textContent = JSON.stringify(data, null, 2);
    } catch (error) {
        console.error("Erro ao buscar dados:", error);
        alert("Erro ao processar a solicitação.");
    }
}

function enviarDesafio3() {
    const faturamento = document.getElementById("inputFaturamento").value;
    if (!faturamento) {
        alert("Por favor, insira um valor para o faturamento.");
        return;
    }
    testar(`/desafio3/${faturamento}`);
}

function enviarDesafio5() {
    const texto = document.getElementById("inputTexto").value;
    if (!texto) {
        alert("Por favor, insira um texto.");
        return;
    }
    testar(`/desafio5/${encodeURIComponent(texto)}`);
}
