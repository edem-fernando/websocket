# websocket
Contém um exemplo de conexão via Socket entre o servidor e o cliente.

No arquivo index.html localizado no diretório client possui uma conexão via WebSocket Javascript para o arquivo index.php do servidor localizado no diretório server.
O trecho de código presente no arquivo index.html tem a função de capturar a mensagem deixada pelo usuário no input da página e caso o usuário digitar enter
realizar o envio da mensagem via socket ao servidor. E quando uma mensagem nova chegar, o script irá capturá-la através do event socket.onmessage 
e exibí-la na tela como mostra o exemplo abaixo:
```javascript
        const socket = new WebSocket('ws://localhost:8080');
        const output = document.querySelector('#output');
        const input = document.querySelector('#input');

        input.addEventListener('keyup', (e) => {
            if (e.code === 'Enter') {
                transmitMessage();
            }
        });

        var transmitMessage = () => {
            socket.send(input.value);
            output.append('Eu: ' + input.value + document.createElement('br'));
        };

        socket.onopen = function (e) {
            transmitMessage();
        };

        socket.onmessage = function (e) {
            output.append('Outro: ' + e.data + document.createElement('br'));
        };
```

O arquivo index.php inicia a conexão via socket e define duas rotas:
  * /chat para o envio das mensagens
  * /echo para a leitura das mensagens
  
Após isso o arquivo faz o uso da Classe Socket, presente no mesmo diretório. Essa classe tem a responsabilidade de realizar a abertura da conexão e o envio da mensagem
para o cliente de destino através dos métodos respectivamente:
  * onOpen
  * onMessage
Os métodos: onClose e onError tratam, respectivamente, do encerramento na conexão e do tratamento de erros.

