# Changelog

## 1.0.0-RC1 (unveröffentlicht)

Erste Vorabversion des TORNADO Themes für Contao 5.7 LTS.

### Inhaltselemente und Insert-Tags

- Inhaltselement „Zitat“ (`quote`) für Kundenstimmen: Zitat, Name, Zusatzangabe, Bewertung von 1 bis 5 Sternen (Standard 5) und optionales Porträt.
- Insert-Tag `{{mark::…}}` für farbig hervorgehobene Wörter in Überschriften. Gibt `<span class="mark">` aus, kein `<mark>`, weil die Hervorhebung nur gestalterisch ist.

### Templates

- Referenzen: Kachel der Liste im Markup einer Galerie-Kachel, Detailansicht mit Kunde, Leistung und Jahr. Dasselbe Markup dient für die Detailseite und den Dialog.
- Aktuelles: Datum ohne Autor in Liste und Detailansicht. Die Templates erben vom Core und überschreiben nur diesen Block.
- TinyMCE: Formate für Buttons und Einleitungstext, Vorschau im Editor mit den Theme-Styles.
- Skript-Templates für die mobile Navigation mit Untermenüs, Ajax-Formulare und Referenzen im Dialog.

### Abhängigkeiten

- Lädt über Composer das Nutshell Framework 2, die Theme Toolbox ab 4.5 (Schriftschnitte aus der `tokens.json` des Themes), das Portfolio-Bundle ab 5.0.13, Swiper Pro, die Onepage-Navigation ab 2.3 (ARIA-Label, Fokus auf das Sprungziel, „Navigation überspringen“), das Grid-Bundle und die Nutshell-Elemente Hero, Card und Kontakt.
- Das Bundle lädt nach dem Portfolio- und dem News-Bundle, damit seine Twig-Templates Vorrang haben.
