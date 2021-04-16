<!DOCTYPE html>
<html>

<head>
    {% block head %}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <title>{% block title %}{% endblock %}</title>
    {% endblock %}
</head>

<body>
    <header>
        {% block header %}
        <section class="hero is-medium is-link">
            <div class="hero-body">
                <p class="title">
                    ES+SLA
                </p>
                <p class="subtitle">
                    (En Savoir + Sur Les Animaux :/)
                <p class="control">
                <form method="GET" action="search">
                    <input id="searchInput" list="autocompletion" type="search" name="search" placeholder="Nom de l'animal" value="">
                    <datalist id="autocompletion">
                        <option value="Edge">
                        <option value="Firefox">
                        <option value="Chrome">
                        <option value="Opera">
                        <option value="Safari">
                    </datalist>
                    <input id="searchBtn" type="submit" name="submit" value="Search">
                </form>
                </p>
                </p>
            </div>
        </section>
        {% endblock %}
    </header>
    <main class="section" id="content">
        {% block content %}
        {% endblock %}
    </main>
    <footer class="footer" id="footer">
        {% block footer %}
        &copy; Copyright 2021 by Robin.
        {% endblock %}
    </footer>
    {% block script %}
    {% endblock %}
</body>

</html>