<?php
/**
 * @version     $id: item_body.php
 * @package     Molajo
 * @subpackage  Latest News Layout
 * @copyright   Copyright (C) 2011 Amy Stephen. All rights reserved.
 * @license     GNU General Public License Version 2, or later http://www.gnu.org/licenses/gpl.html
 */
defined('MOLAJO') or die; ?>
<pre>
Babs comment: This is a list layout, it iterates over a rowset.
</pre>

{% block heading %}
<h1>Pagetitle from menu object</h1>
{% endblock heading %}

{# If there's no list file, then this will be ignored #}
{% block list %}
{% for item in rowset %}
<li>{% block item %}{% endblock item %}</li>
{% endfor %}
{% endblock list %}