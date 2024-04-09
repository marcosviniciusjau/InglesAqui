
document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('comment-form');
  const userInput = document.getElementById('message-text');
  const commentList = document.getElementById('comment-list');

  form.addEventListener('submit', function (event) {
    event.preventDefault();

    const userText = userInput.value.trim();
    const comments = userText.split('\n');

    for (const comment of comments) {
      if (comment.trim() !== '') {
        const p = document.createElement('p');

        const icon = document.createElement('ion-icon');
        icon.setAttribute('name', 'person-circle-outline');
        icon.style.fontSize = '20px';


        p.appendChild(icon);
        p.innerHTML += ' ' + comment + ' (' + new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) + ')';
        commentList.appendChild(p);
      }
    }

    userInput.value = '';
  });

  const optionButtons = document.querySelectorAll('.options');
  optionButtons.forEach(button => {
    button.addEventListener('click', function () {
      const selectedOption = this.getAttribute('data-option');

      // Verifica se o comentário já existe antes de adicionar
      const existingComments = commentList.querySelectorAll('p');
      for (const comment of existingComments) {
        if (comment.textContent.includes(selectedOption)) {
          return; // Sai da função se o comentário já existir
        }
      }

      // Adiciona o texto do botão à lista de comentários
      const p = document.createElement('p');
      const icon = document.createElement('ion-icon');
      icon.setAttribute('name', 'person-circle-outline');
      icon.style.fontSize = '20px';

      p.appendChild(icon);
      p.innerHTML += ' ' + selectedOption + ' (' + new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) + ')';
      commentList.appendChild(p);

      // Exibe a resposta correspondente ao botão
      displayQuestion(selectedOption);
      displayAnswer(selectedOption);
    });
  });

  const conversationHistory = [];

  function displayQuestion(selectedOption) {
    const conversationItem = document.createElement('div');
    conversationItem.classList.add('conversation-item', '#comment-list');


    const icon = document.createElement('ion-icon');
    icon.setAttribute('name', 'person-circle-outline');
    icon.style.fontSize = '20px';

    const questionP = document.createElement('p');
    questionP.textContent = selectedOption + ' (' + new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) + ')';

    conversationItem.appendChild(icon);
    conversationItem.appendChild(questionP);

    conversationHistory.push(conversationItem);

    updateConversationDisplay();
  }

  function displayAnswer(selectedOption) {
    const url = 'https://api.openai.com/v1/threads'
    const data = {
      "thread": {
        "messages": [
          { "role": "user", "content": document.getElementById("message-text").value }
        ]
      }
    };
    const headers = new Headers({
      'Authorization': `Bearer ${OPENAI_API_KEY}`,
      'Content-Type': 'application/json',
      'OpenAI-Beta': 'assistants=v1'
    });

    fetch(url, {
      method: 'POST',
      headers: headers,
      body: JSON.stringify(data)
    })
      .then(response => response.json())
      .then(result => console.log(result))
      .catch(error => console.error('Erro:', error));

    const answers = {
      "Como solicitar um reembolso?": "Por favor, forneça mais detalhes sobre sua compra e nós o ajudaremos com o processo de reembolso.",
      "Me fale sobre a política de devolução.": "Nossa política de devolução permite devoluções em até 30 dias após a compra. Certifique-se de que o item esteja em sua condição original.",
      "Posso cancelar meu pedido?": "Sim, você pode cancelar seu pedido em até 24 horas após a compra. Após esse período, entre em contato com nosso serviço de atendimento ao cliente para obter ajuda."
    };

    const formattedAnswer = response + ' (' + new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) + ')';
    const conversationItem = document.createElement('div');
    conversationItem.classList.add('conversation-item'); // Adiciona a classe 'answer' à div

    const img = document.createElement('img');
    img.setAttribute('src', '/View/Imagens/icon.png');
    img.style.width = '20px';
    img.style.height = '20px';
    const questionP = document.createElement('p');
    questionP.textContent = selectedOption;

    const answerP = document.createElement('p');
    answerP.textContent = formattedAnswer;

    conversationItem.appendChild(img);
    conversationItem.appendChild(answerP);

    conversationHistory.push(conversationItem);

    updateConversationDisplay();
  }

  function updateConversationDisplay() {
    commentList.innerHTML = ''; // Limpa o conteúdo existente

    for (const entry of conversationHistory) {
      commentList.appendChild(entry);
    }
  }

});
