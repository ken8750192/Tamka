{% extends "twig/layouts/base.twig.php" %}{% block item %}
<h3>
<a href="{{ item.url }}">{{ item.title }}</a>
</h3>
<div>
    {{ item.snippet }}
</div>
<p class="small">
    {{ m.text("MOLAJO_WRITTEN_BY") }} {{ item.display_author_name }}
</p>
<p class="small">
    {{ item.published_pretty_date }}
</p>
{% endblock item %}
