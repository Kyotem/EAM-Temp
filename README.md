// TODO: Logo vernieuwen
![Logo](https://i.imgur.com/Qqnbxtm.png)


## Gebruikt door
Dit project wordt op dit moment gebruikt door de volgende bedrijven:
n.v.t

---
// TODO: Vereisten verbeteren

# HAN GreenOfficeCRM
![Docker](https://img.shields.io/badge/Docker-27.1.1-pink)
![Java](https://img.shields.io/badge/Java-21-orange)


![React](https://img.shields.io/badge/React-17-blue)
![Storybook](https://img.shields.io/badge/Storybook-8.4.6-blue)
![Node.js](https://img.shields.io/badge/Node.js-v18-orange)


// TODO: CI PIPELINE TOEVOEGEN

[![CI - Java (Maven)](https://github.com/AIM-CNP-sep24/project-cnp-dravende-dikdiks/actions/workflows/ci-java.yaml/badge.svg?branch=develop)](https://github.com/AIM-CNP-sep24/project-cnp-dravende-dikdiks/actions/workflows/ci-java.yaml)
[![CI - Storybook Tests](https://github.com/AIM-CNP-sep24/project-cnp-dravende-dikdiks/actions/workflows/ci-react.yaml/badge.svg?branch=develop)](https://github.com/AIM-CNP-sep24/project-cnp-dravende-dikdiks/actions/workflows/ci-react.yaml)

// TODO: [HIER BESCHRIJVING VAN HET PRODUCT]

## Belangrijkste Functionaliteiten
- TODO
- TODO
- TODO

---

## Inhoudsopgave
- TODO

---
## Ingebruikneming

### Development Deployment

Dit onderdeel beschrijft de stappen en configuraties die nodig zijn om de applicatie lokaal op te zetten in een development-omgeving.
Het biedt ontwikkelaars een volledig functionele omgeving waarin ze kunnen testen en ontwikkelen.

Op dit moment is de applicatie enkel voorbereid voor deployment in een development-omgeving.
Er zijn nog geen configuraties of procedures beschikbaar voor productie-deployment.

#### Vereisten

Zorg ervoor dat de volgende software is geïnstalleerd en up-to-date:

- [Node.JS: v18+](https://nodejs.org/en/download)
- [Docker: 27.1.1+](https://www.docker.com/get-started/)


#### Environment opzetten

Clone de repository naar je lokale machine via git bash met:

```bash
git clone [$LINK]
```

**Let op:** Controleer of de Shell Scripts in de repository LF-line endings gebruiken. Inconsistenties in line endings kunnen voorkomen dat Docker de scripts uitvoert. Controleer en corrigeer bestanden in:

- `./docker-dependencies/wait-for-it.sh`
- `./frontend/GreenOfficeCRM/entrypoint.sh`
- `./database/entrypoint.sh`

Navigeer naar de root van de projectmap en voer het volgende uit:

```bash
docker-compose -f docker-compose.dev.yaml up --build
```

Dit commando bouwt en start de containers volgens de configuratie in `docker-compose.dev.yaml`.

#### Wat gebeurt er?

Docker maakt en start containers voor:

- **MSSQL Database**
- **Backend**: Spring Boot
- **Frontend**: React met Vite en Storybook

Na het initialiseren worden de volgende services beschikbaar:

| **Service**     | **URL**                                          |
|-----------------|--------------------------------------------------|
| Backend         | [http://localhost:8080](http://localhost:8080/)  |
| Frontend (Vite) | [http://localhost:5173](http://localhost:5173/)  |
| Storybook       | [http://localhost:6006](http://localhost:6006/ ) |
| MSSQL Database  | localhost:1434                                   |

#### Belangrijke Opmerkingen

1. **Hot-reload ondersteuning:**
    - **Frontend**: Codewijzigingen worden automatisch geladen dankzij hot-reloading.
    - **Backend**: Hot-reloading wordt niet ondersteund. Voor wijzigingen moet je de backend-container opnieuw starten.
2. **Persistente database:**
    - De MSSQL container heeft een volume ingesteld, zodat gegevens behouden blijven na het herstarten van de container.
3. **Frontend-container:**
    - Vermijd het afsluiten van de frontend-container tijdens de opstartfase. Dit kan de Docker Daemon laten vastlopen, wat mogelijk WSL of je systeem onstabiel maakt.
4. **Dependencies & Plugins**
    - Alle benodigdge dependencies/plugins voor de backend zijn terug te vinden in de pom.xml

### Verbinden met SQL Server

Om in te loggen op de SQL Server kun je gebruikmaken van SQL Server Management Studio (SSMS, aanbevolen) of een ander Database Management Systeem (DBMS).

Gebruik de volgende inloggegevens:

- **Server Type:** Database Engine
- **Server Name:** `localhost,1434`
- **Authentication:** SQL Server Authentication
- **Login:** `SA`
- **Wachtwoord:** `YourPassword!123`
- **Connectieverificatie:** Trust server certificate

De standaard SQL Server gebruikersnamen & wachtwoorden staan in het `Dev.env`-bestand (In de root directory). Voor veiligheid kun je deze aanpassen zodat deze direct gelinkt is via GitHub of via .env management software.

### Frontend Tests Runnen

Navigeer naar de frontend folder:
```bash
cd ./frontend/GreenOfficeCRM
```

Start de Storybook server lokaal op:
```bash
npm run sb
```

Er zijn nu twee manieren om de tests uit te voeren:

1. Handmatig controleren via de browser
2. Automatisch testrapport genereren via Storybook Testrunner



# Auteurs

- [@Kyotem](https://github.com/Kyotem) - Full Stack Developer
- TODO
