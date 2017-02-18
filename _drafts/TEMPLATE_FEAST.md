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

# The Primary Saint or Feast being celebrated
title: 

# The day the feast is celebrated
when: 

# Tone for God is the Lord (only the number is needed). Example: 4
god_is_the_lord:

# Use this instead of the Apolytikion below when the same thing is chanted thrice.
festal_apolytikion: 

# List of Apolytikions for Orthros
#apolytikion:
#    - 
#    - Glory/
#    - Both Now/

# Set a custom Kathismata (Plain Reading)
kathismata: 

# Set a custom Evlogetaria
evlogetaria: 

# Set a custom PROKEIMENON
prokeimenon: 

# Canon for Orthros
canon: 

# 3rd Little Littany for Orthros. Use 1 for the normal version, and 2 for the version without "Exalt ye the Lord Our God..."
little_ektenia_3: 1

# Whether to sing the normal Eothinon Exaposteilarion
normal_exaposteilarion: true

# List of Exaposteilaria for Orthros
exaposteilaria:
    - 

# Custom tone for Praises (ANOI)
praises: 

# Set a custom Doxastikon.
doxastikon: 

# Custom value for the Great Doxology (Should be the same as the Doxastikon)
great_doxology: 

# Custom Troparion after Great Doxology
troparion: 

# 1st & 2nd Antiphon for Divine Liturgy
antiphon_12: 

# 3rd Antiphon for Divine Liturgy
antiphon_3: 

# The entrance Hymn, if different than a normal Sunday
entrance: false

# List of after-entrance Troparia for Divine Liturgy. DO NOT include Troparion of Ascension
post_entrance:
    - 

# When the Troparion of Ascension SHOULD be sung, change "false" to "true"
ascension: false

# The Kontakion of the day.
kontakion: false

# Trisagion Hymn
trisagion: false

# The Megalynarion of the day.
megalynarion: false

# The Koinonikon (Communion Hymn) of the day
koinonikon: false

# Post-communion instructions
post_communion: false

# Set to "true" to use Markdown inside the post_communion section above (advanced usage)
post_communion_markdown: false

---

