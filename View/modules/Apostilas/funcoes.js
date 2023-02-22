var stars = document.querySelectorAll('.star-icon');

document.addEventListener('click', function(e) {
  var classStar = e.target.classList;
  if (!classStar.contains('ativo')) {
    stars.forEach(function(star) {
      star.classList.remove('ativo');
    });
    classStar.add('ativo');
    console.log(e.target.getAttribute('data-avaliacao'));
  }
});

    const myForm= document.getElementById("myForm");
    myForm.addEventListener('submit', gravar);

    function gravar(e){
        e.preventDefault();
        const formData= new FormData(this);
        const searchParams= new URLSearchParams();

        for(const par of formData){
            searchParams.append(par[0],par[1]);
        }
        fetch('/avaliacoes/form/save',{
            method:'POST',
            body:FormData
        }).then(function(response){
            document.getElementById('s1').value="";
            return alert("Dados gravados com sucesso");

        }).catch(function(error){
            console.log(error);
        });
    }
