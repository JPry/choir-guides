1st & 2nd Antiphon - *{{ page.antiphon_12 }}*

3rd Antiphon - {{ page.antiphon_3 }}

After Entrance Troparia:

{% for song in page.post_entrance %}
1. {{ song }}
{% endfor %}
{% if page.ascension %}
1. Troparion of Ascension
{% else %}
1. **DO NOT SING** Troparion of Ascension
{% endif %}

{% if page.kontakion %}
KONTAKION: {{ page.kontakion }}
{% endif %}

{% if page.trisagion %}
TRISAGION: {{ page.trisagion }}
{% endif %}

{% if page.megalynarion %}
MEGALYNARION: {{ page.megalynarion }}
{% endif %}

{% if page.koinonikon %}
KOINONIKON: {{ page.koinonikon }}
{% endif %}

{% if page.post_communion %}
{% if page.post_communion_markdown %}
POST-COMMUNION: {{ page.post_communion | markdownify }}
{% else %}
POST-COMMUNION: {{ page.post_communion }}
{% endif %}
{% endif %}
