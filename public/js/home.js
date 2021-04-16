document.addEventListener('DOMContentLoaded',()=>{
    document.querySelector('#searchInput').addEventListener('input',function(){
        $keyword = escape(this.value)
        fetch('search/' + $keyword)
            .then(response => response.json())
            .then(autocompletion)
    })
    document.querySelector('#searchBtn').addEventListener('click',(e)=>{
        e.preventDefault();
        let form = new FormData(document.querySelector('form'))
    })
})

function autocompletion(results){
    let list = ''
    results.forEach(result => {
        list += `<option value="${result.nom}">`;
    });
    document.querySelector('#autocompletion').innerHTML = list;
}