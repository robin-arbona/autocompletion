{% extends template %}

{% block content %}
<h1 class="title">Résultat(s) for {{keyword}}</h1>
<ul>
    {% for result in results %}
    <li> <a target="ajax" href="{{ BASE_PATH }}/show/{{result.id}}">{{result.nom}}</a></li>
    {% endfor %}
</ul>
{% endblock %}