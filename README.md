# Kassa System Dokumentation

## Projektöversikt

Kassa Systemet är en webbaserad kassapplikation designad för att hantera transaktioner, hantera lager och erbjuda administrativa funktioner. Detta dokument ger en översikt över huvudfunktionerna, använda teknologier och en guide för att komma igång.

## Funktioner

1. **Användarautentisering:**
   - Användare kan logga in på sina konton för att komma åt personliga funktioner.

2. **Produkthantering:**
   - Lägg till nya produkter med hjälp av en streckkodsskanner.
   - Redigera produktinformation, inklusive namn, streckkod och bild.

3. **Varukorgshantering:**
   - Lägg till varor i varukorgen.
   - Visa och redigera varukorgens innehåll.
   - Ta bort varor från varukorgen.

4. **Betalningsalternativ:**
   - Stöd för Swish-betalningar.
   - Kontantbetalningar med detaljer om svenska valörer som används.

5. **Lagerövervakning:**
   - Visa antalet varor kvar i databasen.
   - Lägg till nya varor i lagret.

6. **Adminpanel:**
   - Administrativ webbplats för att hantera produkter, användare och systeminställningar.

7. **Rapportering:**
   - Månadsrapporter om användartransaktioner, inklusive totalt spenderat och köpta varor.

## Använda Teknologier

- **Frontend:**
  - HTML
  - CSS
  - JavaScript

- **Backend:**
  - PHP
  - MySQL


## Komma Igång

1. **Klona Repositoriet:**
   ```bash
   git clone https://github.com/ditt-användarnamn/kassa-system.git
   cd kassa-system
