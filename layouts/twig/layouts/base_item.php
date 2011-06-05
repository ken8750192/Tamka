
{% block content %}
  <h1><a href="{{ data[0].url }}">{{ data[0].title }}</a></h1>
  <p class="important">{{ data[0].snippet }}</p>
  <p class="small">
      {{ data[0].display_author_name }}
  </p>
<p class="small">
    {{ data[0].published_pretty_date }}
</p>
{% endblock %}
{% block toc %}
Replace me
{% endblock %}