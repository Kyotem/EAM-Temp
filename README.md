// TODO: Logo vernieuwen

[//]: # (![Logo]&#40;EMBEDLINK;)


## Gebruikt door
Dit project wordt op dit moment gebruikt door de volgende bedrijven:
- n.v.t

---

# HAN GreenOfficeCRM

![Docker](https://img.shields.io/badge/Docker-27.1.1-041e5b)
![Xdebug](https://img.shields.io/badge/Xdebug-3.4.2-bbde94)
![PHP](https://img.shields.io/badge/PHP-8.1.13-9999cc)

// TODO: Frontend Framework



// TODO: CI PIPELINE TOEVOEGEN VOOR PHP


// TODO: [HIER (KORTE) BESCHRIJVING VAN HET PRODUCT]

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

- [Docker: 27.1.1+](https://www.docker.com/get-started/)


#### Environment opzetten

Clone de repository naar je lokale machine via git bash met:
```bash
git clone [$LINK] // TODO: VASTLEGGEN
```

**Let op:** Controleer of de Shell Scripts in de repository LF-line endings gebruiken. Inconsistenties in line endings kunnen voorkomen dat Docker de scripts uitvoert. Controleer en corrigeer bestanden in:

- `./database/entrypoint.sh`

Navigeer naar de root van de projectmap en voer het volgende uit:

```bash
docker-compose -f docker-compose.dev.yaml up --build
```

Dit commando bouwt en start de containers volgens de configuratie in `docker-compose.dev.yaml`.

#### Wat gebeurt er?

Docker maakt en start containers voor:

- MSSQL Database
- PHP Webserver _(+ Xdebug)_

Na het initialiseren worden de volgende services beschikbaar:

| **Service**    | **URL**        |
|----------------|----------------|
| MSSQL Database | localhost:1434 |
| PHP Webserver  | localhost:8080 |
| Xdebug         | localhost:9003 |


### Verbinden met SQL Server

Om in te loggen op de SQL Server kun je gebruikmaken van SQL Server Management Studio (SSMS, aanbevolen) of een ander Database Management Systeem (DBMS).

Gebruik de volgende inloggegevens:

- **Server Type:** Database Engine
- **Server Name:** `localhost,1434`
- **Authentication:** SQL Server Authentication
- **Login:** `SA`
- **Wachtwoord:** `abc123!@#`
- **Connectieverificatie:** Trust server certificate

De standaard SQL Server gebruikersnamen & wachtwoorden staan in het `dev.env`-bestand (In de root directory). Deze kan aangepast worden om de inloggegevens aan te passen. Dit kan niet direct geïmplementeerd worden in een productiemomgeving.

### Xdebug gebruiken

Voor het debuggen van PHP wordt Xdebug gebruikt.
In dit onderdeel wordt uitgelegd hoe je hier gebruik kan maken in Visual Studio Code en PHPStorm

**Visual Studio Code**

NODIG:
- PHPDebug van XDebug
- Launch params

**PHPStorm**

// TODO: Vstleggen


# Auteurs

- [@Kyotem](https://github.com/Kyotem) - Full Stack Developer
- TODO
