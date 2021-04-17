{% extends template %}

{% block content %}
<h1 class="title">{{result.nom}}</h1>
<p>
    {{result.definition}}
</p>
{% endblock %}