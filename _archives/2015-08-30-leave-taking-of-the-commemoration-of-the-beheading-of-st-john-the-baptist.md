---
####
# Below is a template for creating a new variable sheet. The language is YAML.
#
# Simple settings are a name, then a colon, then a value. Example: "tone: 6"
# 
# Lists are a name, then a colon, then each item on its own line preceded by 4 spaces and a dash. Example:
# apolytikion:
#     - Resurrectional Apolytikion - Tone 2
#     - Glory/Resurrectional Apolytikion - Tone 2
#     - Both Now/Theotokion - Tone 2
####

# The tone of the week
tone: 4

# The Eothinon of the week
eothinon: 2 

# The Primary Saint or Feast being celebrated
title: Leave-taking of the commemoration of the Beheading of St. John the Baptist

# List of Saints commemorated
saints:
    - Alexander, Paul the New, and John, Patriarchs of Constantinople

# List of Apolytikions for Orthros
apolytikion:
    - Resurrectional Apolytikion - Tone 4
    - Glory/Apolytikion of the Baptist's beheading - Tone 2
    - Both Now/Resurrectional Theotokion - Tone 2

# Canon for Orthros
canon: Holy Cross - Tone 8

# 3rd Little Littany for Orthros. Use 1 for the normal version, and 2 for the version without "Exalt ye the Lord Our God..."
little_ektenia_3: 1

# Whether to sing the normal Eothinon Exaposteilarion
normal_exaposteilarion: true

# List of Exaposteilaria for Orthros
exaposteilaria:
    - Exaposteilarion for St. John the Baptist - Tone 2
    - Theotokion for St. John the Baptist - Tone 2

# Custom value for the Great Doxology (different than tone of the week)
great_doxology: null

# Other overrides, mostly only used for feasts. Replace "null" with the appropriate value.
overrides:
    # Set a custom Kathismata (Plain Reading)
    kathismata: null

    # Set a custom Evlogetaria.
    evlogetaria: null

    # Set a custom Doxastikon.
    doxastikon: null

# 1st & 2nd Antiphon for Divine Liturgy
antiphon_12: Normal Sunday

# 3rd Antiphon for Divine Liturgy
antiphon_3: Resurrectional Apolytikon - Tone 4

# List of after-entrance Troparia for Divine Liturgy
post_entrance:
    - Resurrectional Apolytikon - Tone 4
    - Apolytikion of St. John's Beheading - Tone 2
# The Kontakion of the day.
kontakion: Nativity of the Theotokos - Tone 4

# When the Troparion of Ascension should NOT be sung, uncomment this line:
#ascension: false

# The Megalynarion of the day.
megalynarion: false

# The Koinonikon (Communion Hymn) of the day
koinonikon: false

---

