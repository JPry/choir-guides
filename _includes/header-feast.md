{% if page.when %}
**{{ page.when }}**
{% endif %}

**Feast of {{ page.title }}**

{% if page.saints %}
{{ page.saints | join: "; " }}
{% endif %}
