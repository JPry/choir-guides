GOD IS THE LORD - Tone {{ page.tone }} **p. {{ site.data.vars.god_is_the_lord[page.tone] }}**{: class="right" }

{% for hymn in page.apolytikion %}
1. {{ hymn }}
{% endfor %}

LITTLE LITTANY **p. 32**{: class="right" }

{% if page.overrides.kathismata != null %}
KATHISMATA - {{ page.overrides.kathismata }}
{% else %}
KATHISMATA - Tone {{ page.tone }} **p. {{ site.data.vars.kathismata[page.tone] }}**{: class="right" }
{% endif %}

EVLOGETARIA - Tone 5 **p. 41**{: class="right" }

LITTLE LITTANY **p. 45**{: class="right" }

HYPAKOE & PROKEIMENON - Tone {{ page.tone }} **p. {{ site.data.vars.hypakoe[page.tone] }}**{: class="right" }

ORTHROS GOSPEL, etc. **p. 65**{: class="right" }

CANON: {{ page.canon }}

Littany & 'Holy is the Lord' **p. {{ site.data.vars.little_ektenia_3[page.little_ektenia_3] }}**{: class="right" }

EXAPOSTEILARIA

{% if page.normal_exaposteilarion %}
1. Exaposteilarion {{ page.eothinon }} **p. {{ site.data.vars.exaposteilarion[page.eothinon] }}**{: class="right" }
{% endif %}
{% for exa in page.exaposteilaria %}
1. {{ exa }}
{% endfor %}

PRAISES - Tone {{ page.tone }} **p. {{ site.data.vars.praises[page.tone] }}**{: class="right" }

{% if page.overrides.doxastikon != null %}
DOXASTIKON - {{ page.overrides.doxastikon }}
{% else %}
DOXASTIKON - Tone {{ site.data.vars.doxasticon[page.eothinon]['tone'] }} **p. {{ site.data.vars.doxasticon[page.eothinon]['page'] }}**{: class="right" }
{% endif %}

GREAT DOXOLOGY - Tone {% if page.great_doxology %}{{ page.great_doxology }}{% else %}{{ site.data.vars.doxasticon[page.eothinon]['tone'] }}{% endif %}

{% if page.tone <= 4 %}
* Troparion - Tone 4
{% else %}
* Troparion - Tone 8
{% endif %}
