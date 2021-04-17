{% extends "base.twig.php" %}

{% block title %}Home{% endblock %}


{% block content %}
<h1 class="title">Hello {{ name }}</h1>
<p>
    Bienvenu sur cette page fantastique, tu cherches à en savoir plus sur un animal ? Cherche ton animal dans la barre de recherche, je suis sûr que tu seras surpis(e) !
</p>
{% endblock %}

{% block script %}
{{ parent() }}
{% endblock %}