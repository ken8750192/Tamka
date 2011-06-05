<pre>
Babs comment: This is a list layout, it iterates over a rowset.
</pre>

{{ m.text("LAYOUTS") }}
{{ jtext._("LAYOUTS") }}


  <div id="content">{% block content %}{% endblock %}</div>
  <div id="footer">
    {% block footer %}
      &copy; Copyright 2009 by <a href="http://domain.invalid/">you</a>.
    {% endblock %}
  </div>
