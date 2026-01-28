# ClubSuite Newsletter

[![Nextcloud Version](https://img.shields.io/badge/Nextcloud-28--32-blue.svg)](https://nextcloud.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.1--8.3-purple.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-AGPL%20v3-green.svg)](LICENSE)

> ✉️ Newsletter und Mitgliederkommunikation für Vereine.

## 📋 Übersicht

ClubSuite Newsletter vereinfacht Ihre Mitgliederkommunikation:

- **Vorlagen**: HTML und Plaintext-Newsletter-Vorlagen
- **Empfängergruppen**: Flexible Zielgruppenauswahl
- **Personalisierung**: Platzhalter für Namen, Anrede etc.
- **Versandplanung**: Sofort oder zeitgesteuert
- **Statistik**: Öffnungs- und Klickraten (optional)

## 🚀 Installation

### Über den Nextcloud App Store
1. **ClubSuite Core** muss installiert sein
2. Apps → Organisation → "ClubSuite Newsletter" suchen
3. Installieren und aktivieren

### Manuelle Installation
```bash
cd /path/to/nextcloud/apps
git clone https://github.com/clubsuite/clubsuite-newsletter.git
php occ app:enable clubsuite-newsletter
```

## 📦 Anforderungen

| Komponente | Version |
|------------|--------|
| Nextcloud | 28 - 32 |
| PHP | 8.1 - 8.3 |
| **clubsuite-core** | erforderlich |
| E-Mail-Server | konfiguriert in Nextcloud |

## 🔒 DSGVO / Datenschutz

- Opt-in/Opt-out für Newsletter
- Abmeldelink in jeder E-Mail
- Datenexport über Nextcloud Privacy API

## 📄 Lizenz

AGPL v3 – Siehe [LICENSE](LICENSE)

## 🐛 Bugs & Feature Requests

[GitHub Issues](https://github.com/clubsuite/clubsuite-newsletter/issues)

---

© 2026 Stefan Schulz
