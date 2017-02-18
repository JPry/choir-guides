**{{ page.date | date: "%B %-d, %Y" }}**

**{{ page.title }}**

{% if page.all_saints %}
{{ page.all_saints }}
{% elsif page.saints %}
{{ page.saints | join: "; " }}
{% endif %}
