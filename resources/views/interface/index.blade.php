<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio Fibonacci</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        async function testar(url) {
            const response = await fetch(url);
            const data = await response.json();
            document.getElementById("resultado").textContent = JSON.stringify(data, null, 2);
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
    </script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full text-center">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Desafio Fibonacci</h1>

        <div class="grid grid-cols-1 gap-3">
            <button onclick="testar('/desafio1')" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Desafio 1</button>
            <button onclick="testar('/desafio2/13')" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Desafio 2 (Número 13)</button>
            
            <!-- Input + Botão na mesma linha para Desafio 3 -->
            <div class="flex items-center gap-2">
                <input id="inputFaturamento" type="text" placeholder="Faturamento" class="p-2 border rounded flex-1">
                <button onclick="enviarDesafio3()" class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 transition">Desafio 3</button>
            </div>

            <button onclick="testar('/desafio4')" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Desafio 4</button>
            
            <!-- Input + Botão na mesma linha para Desafio 5 -->
            <div class="flex items-center gap-2">
                <input id="inputTexto" type="text" placeholder="Digite um texto" class="p-2 border rounded flex-1">
                <button onclick="enviarDesafio5()" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Desafio 5</button>
            </div>
        </div>

        <div class="mt-4 p-4 bg-gray-200 rounded text-left text-sm overflow-auto max-h-40">
            <pre id="resultado" class="text-gray-700"></pre>
        </div>
    </div>
</body>
</html>
