document.getElementById('search').addEventListener('input', function() {
    var input = this.value.toLowerCase();
    var searchResults = document.getElementById('searchResults');
    searchResults.innerHTML = '';

    if (input.length === 0) {
        searchResults.style.display = 'none';
        return;
    }

    // Simulação de sugestões de pesquisa
    var suggestions = ['My English Guide', 'My Business Conversation Guide', 'My Au Pair Guide', 'My Conversation Guide I', 'My Conversation Guide II','Irregular Verbs Guide'];
    
    var matches = suggestions.filter(function(suggestion) {
        return suggestion.toLowerCase().includes(input);
    });

    if (matches.length > 0) {
        matches.forEach(function(match) {
            var li = document.createElement('li');
            li.textContent = match;
            li.classList.add('list-group-item')
            searchResults.appendChild(li);
        });
        searchResults.style.display = 'block';
    } else {
        var li = document.createElement('li');
        li.textContent = 'Nenhum resultado encontrado';
        searchResults.appendChild(li);
        searchResults.style.display = 'block';
    }
});

document.addEventListener('click', function(e) {
    if (!document.getElementById('searchResults').contains(e.target)) {
        document.getElementById('searchResults').style.display = 'none';
    }else{
        const selectedSuggestion = e.target.textContent;
        window.location.href = 'apostilas/pesquisar?search=' + selectedSuggestion;
  
    }
});
