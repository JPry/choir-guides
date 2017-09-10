{% if page.god_is_the_lord %}
GOD IS THE LORD - Tone {{ page.god_is_the_lord }}
{% else %}
GOD IS THE LORD - Tone {{ page.tone }}
{% endif %}

{% if page.festal_apolytikion %}
1. {{ page.festal_apolytikion }}
2. Glory/{{ page.festal_apolytikion }}
3. Both Now/{{ page.festal_apolytikion }}
{% else %}
{% for hymn in page.apolytikion %}
1. {{ hymn }}
{% endfor %}
{% endif %}

LITTLE LITANY **p. 32**{: class="right" }

{% if page.kathismata %}
KATHISMATA - {{ page.kathismata }}
{% else %}
KATHISMATA - Tone {{ page.tone }} **p. {{ site.data.vars.kathismata[page.tone] }}**{: class="right" }
{% endif %}

{% if page.evlogetaria != null %}
{{ page.evlogetaria }} *(Replaces the Evlogetaria)*
{% else %}
EVLOGETARIA - Tone 5 **p. 41**{: class="right" }
{% endif %}

LITTLE LITANY **p. 45**{: class="right" }

{% if page.prokeimenon %}
FESTAL ANABATHMOI & PROKEIMENON - {{ page.prokeimenon }}
{% else %}
HYPAKOE & PROKEIMENON - Tone {{ page.tone }} **p. {{ site.data.vars.hypakoe[page.tone] }}**{: class="right" }
{% endif %}

ORTHROS GOSPEL, etc. **p. 65**{: class="right" }

CANON: {{ page.canon }}

Litany & 'Holy is the Lord' **p. {{ site.data.vars.little_ektenia_3[page.little_ektenia_3] }}**{: class="right" }

EXAPOSTEILARIA

{% if page.normal_exaposteilarion %}
1. Exaposteilarion {{ page.eothinon }} **p. {{ site.data.vars.exaposteilarion[page.eothinon] }}**{: class="right" }
{% endif %}
{% for exa in page.exaposteilaria %}
1. {{ exa }}
{% endfor %}

{% if page.praises %}
PRAISES - Tone {{ page.praises }}
{% else %}
PRAISES - Tone {{ page.tone }} **p. {{ site.data.vars.praises[page.tone] }}**{: class="right" }
{% endif %}

{% if page.doxastikon != null %}
DOXASTIKON - {{ page.doxastikon }}
{% else %}
DOXASTIKON - Tone {{ site.data.vars.doxasticon[page.eothinon]['tone'] }} **p. {{ site.data.vars.doxasticon[page.eothinon]['page'] }}**{: class="right" }
{% endif %}

GREAT DOXOLOGY - Tone {% if page.great_doxology %}{{ page.great_doxology }}{% else %}{{ site.data.vars.doxasticon[page.eothinon]['tone'] }}{% endif %}

{% if page.troparion %}
* Troparion - {{ page.troparion }}
{% else %}
    {% if page.tone <= 4 %}
* Troparion - Tone 4
    {% else %}
* Troparion - Tone 8
    {% endif %}
{% endif %}
