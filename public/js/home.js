const initObject = { headers: {'X-Requested-With': 'XMLHttpRequest'}};
const init = async ()=>{
    var BASE_PATH = await fetch('base_path').then(response=>response.json()).then(json=>json.base_path) + '/';
    document.querySelector('#searchInput').addEventListener('input',function(){
        keyword = escape(this.value)
        if(keyword != '')
            fetch(BASE_PATH + 'search/' + keyword,initObject)
                .then(response => response.json())
                .then(autocompletion)
    })
    document.querySelector('#searchBtn').addEventListener('click',(e)=>{
        e.preventDefault();
        keyword = escape(document.querySelector('#searchInput').value)
        fetch(BASE_PATH + 'search/' + keyword +'/render',initObject)
            .then(response=>response.text())
            .then(loadContent)
    })
}

init()

function autocompletion(results){
    let list = ''
    results.forEach(result => {
        list += `<option value="${result.nom}">`
    });
    document.querySelector('#autocompletion').innerHTML = list
}

function loadContent(content){
    document.querySelector('#content').innerHTML = content
    transformAjaxLink()
}

async function transformAjaxLink(){
    document.querySelectorAll('a[target=ajax]').forEach(link=>{
        link.addEventListener('click',function(e){
            e.preventDefault()
            fetch(link.getAttribute('href'),initObject)
                .then(reponse=>reponse.text())
                .then(loadContent)
        })
    })
}